<?php

namespace App\Http\Controllers;

use App\Models\ContentPillar;
use App\Models\ContentCalendar;
use Illuminate\Http\Request;
use App\Models\User;

class ContentController extends Controller
{
    public function index()
    {
        $pillars = ContentPillar::where('user_id', auth()->id())->get();
        $users = User::all(); // Ambil semua pengguna untuk looping (opsional)
        return view('contentPillar', compact('pillars', 'users'));
    }

    public function calendar()
    {
        $calendars = ContentCalendar::where('user_id', auth()->id())->get();
         $users = User::all(); 
        return view('contentCalendar', compact('calendars', 'users'));
    }
}