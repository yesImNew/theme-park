<?php

namespace App\Http\Controllers;

use App\Models\BookingRecord;

class ReceptionController extends Controller
{
    public function index() {
        $bookings = BookingRecord::whereHas('event', function ($query) {
                $query->where('date', today());
            })
            ->with(['event', 'customer', 'room'])
            ->latest()->paginate(10);

        return view('reception', compact('bookings'));
    }
}
