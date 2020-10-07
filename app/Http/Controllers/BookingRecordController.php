<?php

namespace App\Http\Controllers;

use App\Models\BookingRecord;
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
        //
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

            return redirect()->route('bookings.create');
        }

        if (! session()->has('event')) {
            return redirect()->back()
                ->with('warning', ['Warning', 'Did you forget to choose an event?']);
        }
        elseif (! session()->has('room')) {
            return redirect()->back()
                ->with('warning', ['Warning', 'Did you forget to choose a room?']);
        }

        return view('booking.create')->with([
            'room' => session('room'),
            'event' => session('event'),
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
        $request->validate([

        ]);
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
        //
    }

    private function makeReference() {
        $user = str_pad(Auth::id(), 2, rand(0, 9));
        $string = strtoupper(bin2hex(random_bytes(3)));
        return $user . $string;
    }
}
