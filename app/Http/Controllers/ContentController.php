<?php

namespace App\Http\Controllers;

use App\Models\ContentPillar;
use App\Models\ContentCalendar;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    /**
     * Menampilkan daftar Content Pillar untuk pengguna yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = Auth::id(); // Ambil ID pengguna yang login
        $pillars = ContentPillar::where('user_id', $userId)->get(); // Filter berdasarkan user_id
        $users = User::all(); // Opsional, untuk keperluan tambahan
        return view('contentPillar', compact('pillars', 'users', 'userId'));
    }

    /**
     * Menampilkan daftar Content Calendar untuk pengguna yang sedang login.
     *
     * @return \Illuminate\View\View
     */
    public function calendar()
    {
        $userId = Auth::id(); // Ambil ID pengguna yang login
        $calendars = ContentCalendar::where('user_id', $userId)->get(); // Filter berdasarkan user_id
        $users = User::all(); // Opsional, untuk keperluan tambahan
        return view('contentCalendar', compact('calendars', 'users', 'userId'));
    }

    /**
     * Mengambil data Content Pillar dan Content Calendar untuk user tertentu via AJAX.
     *
     * @param int $userId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContent($userId)
    {
        $pillars = ContentPillar::where('user_id', $userId)->get();
        $calendars = ContentCalendar::where('user_id', $userId)->get();
        return response()->json([
            'pillars' => $pillars,
            'calendars' => $calendars,
        ]);
    }
}