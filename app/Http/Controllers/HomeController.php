<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Package;
use App\Models\Custompackage;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
{
    $videos = Video::all();

    $mediaSosialPackages = Package::where('category', 'Media Sosial')->get();
    $desainPackages = Package::where('category', 'Desain')->get();

    $customPackages = Custompackage::all(); // Ambil dari tabel custompackages
    
    return view('layout.homepage', compact(
        'videos', 
        'mediaSosialPackages', 
        'desainPackages', 
        'customPackages'
    ));
}
    
}