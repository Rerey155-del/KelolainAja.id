<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function createSnap(Request $request)
    {
        $request->validate([
            'package_id'   => 'required|integer',
            'package_name' => 'required|string',
            'price'        => 'required|numeric|min:1000',
        ]);

        $user = Auth::user();

        $order = Order::create([
            'order_id'       => 'ORDER-' . strtoupper(Str::random(10)),
            'amount'         => $request->price,
            'customer_name'  => $user->name,
            'customer_email' => $user->email,
            'customer_phone' => $user->phone ?? '081234567890',
            'package_id'     => $request->package_id,
            'package_name'   => $request->package_name,
        ]);

        // Midtrans setup
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id'     => $order->order_id,
                'gross_amount' => $order->amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email'      => $user->email,
                'phone'      => $user->phone ?? '081234567890',
            ],
            'item_details' => [
                [
                    'id'       => $request->package_id,
                    'price'    => $request->price,
                    'quantity' => 1,
                    'name'     => $request->package_name,
                ]
            ]
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function callback(Request $request)
    {
        $notif = $request->all();
        $order = Order::where('order_id', $notif['order_id'])->firstOrFail();

        $order->update([
            'status'         => $notif['transaction_status'] ?? 'unknown',
            'payment_type'   => $notif['payment_type'] ?? 'unknown',
            'transaction_id' => $notif['transaction_id'] ?? null,
            'payment_data'   => $notif,
        ]);

        return response()->json(['success' => true]);
    }

    public function success($orderId)
    {
        $order = Order::where('order_id', $orderId)->firstOrFail();
        return view('payment.success', compact('order'));
    }

    public function history()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('payment.history', compact('orders'));
    }

    public function detail($orderId)
    {
        $order = Order::where('order_id', $orderId)->firstOrFail();
        return view('payment.detail', compact('order'));
    }
}
