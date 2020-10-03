<?php

namespace App\Http\Controllers;

use App\Models\ScheduledEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $events = ScheduledEvent::where('date', '>', now())
            ->orderBy('date')
            ->paginate(10);

        return view('home', compact('events'));
    }
}
