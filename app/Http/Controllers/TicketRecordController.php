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
        $tickets = TicketRecord::with('customer', 'activity', 'event')->paginate(10);

        return view('ticketing.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('event')) {
            $event = ScheduledEvent::findOrFail($request->event);
            $activities = $this->getActivities($event->id);

            if ($activities->isEmpty()) {
                return redirect()->back()
                    ->with('warning', ['', 'You have tickets for all activities']);
            }
            else {
                return view('ticketing.create', compact('event', 'activities'));
            }
        }

        return redirect()->back();
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

        // flag to check if all activity tickets are null
        $created = false;

        // Check if user has booking for the event
        if ($this->userHasBooking($data['scheduled_event_id'])) {

            // Create ticket records for each activity
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

                    $created = true;
                }
            }

            if ($created) {
                return redirect()->route('users.show', Auth::id())
                    ->with('success', ['Success', 'Tickets purchased']);
            }
            else {
                return redirect()->route('users.show', Auth::id());
            }
        }
        else {
            return redirect()->route('home')
                ->with('warning', ['Warning', 'You need to book a room first']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TicketRecord $ticketRecords
     * @return \Illuminate\Http\Response
     */
    public function show(TicketRecord $ticketRecord)
    {
        return redirect()->route('ticket-records.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TicketRecord $ticketRecords
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketRecord $ticketRecord)
    {
        return view('ticketing.edit', ['ticket' => $ticketRecord]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TicketRecord $ticketRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketRecord $ticketRecord)
    {
        $data = $request->validate([
            'tickets' => 'required|integer'
        ]);

        $ticketRecord->update($data);

        return redirect()->route('customers.show', $ticketRecord->customer_id)
            ->with('success', ['Updated', 'Ticket details updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketRecords  $ticketRecords
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketRecord $ticketRecord)
    {
        $ticketRecord->delete();

        return redirect()->back()
            ->with('danger', ['Deleted' , 'Ticket record removed']);
    }

    /**
    * Check if the customer has a booking for a given event
    * @return boolean
    */
    private function userHasBooking($event_id) {
        $bookings = Auth::user()->customer->bookings->where('scheduled_event_id', $event_id);

        return $bookings->isNotEmpty();
    }

    /**
     * Select only activities that the customer does not have tickets for the selected event
     * @return Collection
     */
    private function getActivities($event_id) {
        $customer_id = Auth::user()->customer->id;

        return Activity::whereDoesntHave('ticketRecords', function ($query) use($customer_id,$event_id) {
            $query->where('customer_id', $customer_id)
                ->where('scheduled_event_id', $event_id);
        })->select('id', 'name', 'price')->get();
    }
}
