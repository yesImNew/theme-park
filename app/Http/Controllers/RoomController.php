<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(10);

        return view('room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $selected = '';
        if ($request->has('hotel')) { $selected = $request->hotel; }

        $hotels = Hotel::all()->pluck('name', 'id');

        return view('room.create', compact('hotels', 'selected'));
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
            'type' => 'required',
            'price' => 'required|numeric|max:10000',
            'status' => 'required|max:10',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $room = Room::create($data);

        return redirect()->route('hotels.show', $room->hotel)
            ->with('success', ['Created', 'New room created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $hotels = Hotel::all()->pluck('name', 'id');

        return view('room.edit', compact('room', 'hotels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'type' => 'required',
            'price' => 'required|numeric|max:10000',
            'status' => 'required|max:10',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $room->update($data);

        return redirect()->route('hotels.show', $room->hotel)
            ->with('success', ['Updated', 'Room details successfuly updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->back()
            ->with('danger', ['Deleted' , 'Room deleted']);;
    }
}
