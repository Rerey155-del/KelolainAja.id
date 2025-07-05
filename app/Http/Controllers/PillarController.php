<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentPillar;
use Illuminate\Support\Facades\Auth;

class PillarController extends Controller
{
    // Menampilkan semua data Content Pillar milik user tertentu
    public function index()
    {
        $userId = Auth::id();
        $allPillars = ContentPillar::where('user_id', $userId)->get();

        return view('admin.contentPillar', compact('allPillars', 'userId'));
    }

    // Menyimpan Content Pillar baru
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'percentage'  => 'required|integer|min:0|max:100',
            'color'       => 'required|string',
        ]);

        ContentPillar::create([
            'name'        => $request->name,
            'description' => $request->description,
            'percentage'  => $request->percentage,
            'color'       => $request->color,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Content Pillar berhasil ditambahkan.');
    }

    // Update Content Pillar
    public function update(Request $request, $id)
    {
        $pillar = ContentPillar::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'percentage'  => 'required|integer|min:0|max:100',
            'color'       => 'required|string',
        ]);

        $pillar->update($request->only(['name', 'description', 'percentage', 'color']));

        return redirect()->back()->with('success', 'Content Pillar berhasil diperbarui.');
    }

    // Hapus Content Pillar
    public function destroy($id)
    {
        $pillar = ContentPillar::where('id', $id)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        $pillar->delete();

        return redirect()->back()->with('success', 'Content Pillar berhasil dihapus.');
    }
}
