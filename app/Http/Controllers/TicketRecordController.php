<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ScheduledEvent;
use App\Models\TicketRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (! $request->has('event')) {
            # code...
        }

        return view('ticketing.create', [
            'event' => ScheduledEvent::findOrFail($request->event),
            'activities' => Activity::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'scheduled_event_id' => 'required|exists:scheduled_events,id',
            'activities.*.tickets' => 'nullable|integer',
        ]);

        $activities = $data['activities'];

        foreach ($activities as $key => $activity) {
            if (isset($activity['tickets'])) {

                $model = Activity::findOrFail($key);

                TicketRecord::create([
                    'activity_id' => $model->id,
                    'customer_id' => Auth::user()->customer->id,
                    'scheduled_event_id' => $data['scheduled_event_id'],
                    'tickets' => $activity['tickets'],
                    'price' => $model->price
                ]);
            }
        }

        return redirect()->route('users.show', Auth::id())
            ->with('success', ['Updated', 'Tickets purchased']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TicketRecord $ticketRecords
     * @return \Illuminate\Http\Response
     */
    public function show(TicketRecord $ticketRecords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TicketRecord $ticketRecords
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketRecord $ticketRecords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketRecords  $ticketRecords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketRecord $ticketRecords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketRecords  $ticketRecords
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketRecord $ticketRecords)
    {
        //
    }
}
