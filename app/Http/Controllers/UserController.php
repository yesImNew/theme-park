<?php

namespace App\Http\Controllers;

use App\Models\ScheduledEvent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user->isAdmin) {
            return view('user.show', compact('user'));
        }

        $customer = $user->customer;
        $customer_id = $customer->id;

        // Get booking customer's bookings and tickets grouped by event
        $callback = fn($query) => $query->where('customer_id', $customer_id);
        $bookedEvents = ScheduledEvent::whereHas('bookingRecords', $callback)
            ->with(['bookingRecords' => $callback, 'ticketRecords' => $callback])
            ->orderBy('date')
            ->get();

        // Rearrange collection
        $bookedEvents = $bookedEvents->where('date', '>', Carbon::yesterday())
            ->concat($bookedEvents->where('date', '<=', Carbon::yesterday())->sortByDesc('date'));

        return view('user.show', compact('user', 'customer', 'bookedEvents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
