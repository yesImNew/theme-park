<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\ScheduledEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $events = ScheduledEvent::where('date', '>', now())
            ->orderBy('date')
            ->paginate(10);

        return view('home', compact('events'));
    }

    public function hotels(Request $request)
    {
        if ($request->has('event')) {
            $event = ScheduledEvent::findOrFail($request->event);

            session(['event' => $event]);

            $hotels = Hotel::all();
            return view('hotels', compact('hotels'));
        }

        return redirect()->back()
            ->with('warning', ['Warning', 'You forgot to choose an event']);
    }

}
