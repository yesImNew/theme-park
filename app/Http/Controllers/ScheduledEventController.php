<?php

namespace App\Http\Controllers;

use App\Models\ScheduledEvent;
use Illuminate\Http\Request;

class ScheduledEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = ScheduledEvent::where('date', '>=', now())
            ->orderBy('date')->paginate(10);

        // TODO: allow user to load more
        $pastEvents = ScheduledEvent::where('date', '<', now())
            ->orderBy('date', 'desc')->get()->take(10);

        return view('event.index', compact('events', 'pastEvents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ScheduledEvent::create($this->getValidated($request));

        return redirect()->route('scheduled-events.index')
             ->with('success', ['Created', 'New event scheduled']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\ScheduledEvent $scheduledEvent
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduledEvent $scheduledEvent)
    {
        return view('event.show')->with('event', $scheduledEvent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\ScheduledEvent $scheduledEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduledEvent $scheduledEvent)
    {
        return view('event.edit')->with('event', $scheduledEvent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScheduledEvent  $ScheduledEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScheduledEvent $scheduledEvent)
    {
        $scheduledEvent->update($this->getValidated($request));

        return redirect()->route('scheduled-events.index')
            ->with('success', ['Updated', 'Event details updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduledEvents  $scheduledEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduledEvent $scheduledEvent)
    {
        $scheduledEvent->delete();

        return redirect()->back()
            ->with('danger', ['Deleted' , 'Scheduled event romoved']);
    }

    private function getValidated(Request $request) {
        return $request->validate([
            'title' => 'required',
            'date' => 'required',
            'comments' => 'required'
        ]);
    }
}
