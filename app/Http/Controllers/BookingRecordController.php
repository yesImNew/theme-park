<?php

namespace App\Http\Controllers;

use App\Models\BookingRecord;
use App\Models\Customer;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = BookingRecord::with(['event', 'customer', 'room'])
            ->latest()->paginate(10);

        return view('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('room')) {
            session(['room' => Room::findOrFail($request->room)]);

            return redirect()->route('booking-records.create');
        }

        if (! session()->has('event')) {
            return redirect()->route('home')
                ->with('warning', ['', 'Please choose an event!']);
        }
        elseif (! session()->has('room')) {
            return redirect()->back()
            ->with('warning', ['Warning', 'Did you forget to choose a room?']);
        }

        // Admin
        if (Auth::user()->isAdmin) {
            $room = session('room');
            $event = session('event');
            $customers = Customer::select('id', 'name', 'nid')->get();

            return view('booking.create', compact('event', 'room', 'customers'));
        }

        // Nornal users
        return view('booking.create')->with([
            'room' => session('room'),
            'event' => session('event'),
            'customer' => Auth::user()->customer,
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
        // Validation
        $data = $request->validate([
            'customer_id' => 'sometimes|exists:customers,id',
            'scheduled_event_id' => 'required',
            'room_id' => 'required',
            'price' => 'required',
            'name' => 'required_without:customer_id'
        ]);

        $data['reference'] = $this->getNewReference();

        // Create
        BookingRecord::create($data);

        // Redirect
        session()->forget(['room', 'event']);
        if (Auth::user()->isAdmin) {
            return redirect()->route('booking-records.index')
                ->with('success', ['Created', 'New booking created']);
        }
        else {
            return redirect()->route('users.show', Auth::id())
                ->with('success', ['Created', 'New booking created']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingRecord  $bookingRecord
     * @return \Illuminate\Http\Response
     */
    public function show(BookingRecord $bookingRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingRecord  $bookingRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingRecord $bookingRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingRecord  $bookingRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingRecord $bookingRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingRecord  $bookingRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingRecord $bookingRecord)
    {
        $bookingRecord->delete();

        return redirect()->back()
            ->with('danger', ['Cancelled' , 'Booking record removed']);
    }

    private function getNewReference() {
        $user = str_pad(Auth::id(), 2, rand(0, 9));
        $string = strtoupper(bin2hex(random_bytes(3)));
        return $user . $string;
    }
}
