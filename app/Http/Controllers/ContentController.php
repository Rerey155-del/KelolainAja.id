<?php

namespace App\Http\Controllers;

use App\Models\ContentPillar;
use App\Models\ContentCalendar;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $pillars = ContentPillar::all();
        return view('contentPillar', compact('pillars'));
    }

    public function calendar()
    {
        $calendars = ContentCalendar::all();
        return view('contentCalendar', compact('calendars'));
    }
}