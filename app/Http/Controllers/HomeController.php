<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\ScheduledEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $events = ScheduledEvent::where('date', '>', Carbon::yesterday())
            ->orderBy('date')
            ->paginate(10);

        return view('home', compact('events'));
    }

    public function hotels(Request $request)
    {
        if ($request->has('event')) {
            session(['event' => ScheduledEvent::findOrFail($request->event)]);
        }

        $hotels = Hotel::all();

        return view('hotels', compact('hotels'));
    }

}
