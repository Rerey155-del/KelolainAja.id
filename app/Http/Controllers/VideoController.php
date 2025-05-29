<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{


    public function index()
    {
        return view('admin.videos'); // pastikan Blade ada di folder /resources/views/admin
    }
    
    // ================= MENAMPILKAN VIDEO ====================
    public function video()
    {
        $videos = Video::all(); // Ambil semua data dari tabel videos
        return view('layout.homepage', compact('videos')); // Kirim ke Blade
    }

    // ======================  MENGUNGGAH FOTO ========================
    public function foto(Request $request)
    {
    }

    // ======================   MENGUNGGAH VIDEO  =======================
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|mimes:mp4,mov,avi,wmv|max:204800', // Maks 50MB
        ]);

        // Simpan video ke storage
        $videoPath = $request->file('video')->store('videos', 'public');

        // Simpan ke database
        Video::create([
            'title' => $request->title,
            'video_path' => $videoPath
        ]);

        return back()->with('success', 'Video berhasil diunggah!');
    }
    
    
    
}

