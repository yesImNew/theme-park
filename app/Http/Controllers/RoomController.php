<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with('type')->paginate(10);

        return view('room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Check if there is atleast one room type and one hotel
        if (!RoomType::first())  {
            return redirect()->back()
                ->with('warning', ['Warning', 'You need to create atleast one room type']);
        }
        elseif (!Hotel::first()) {
            return redirect()->back()
                ->with('warning', ['Warning', 'You need to create atleast one hotel']);
        }

        // Select hotel by default if redirected from hotel show
        $selected = '';
        if ($request->has('hotel')) { $selected = $request->hotel; }

        $hotels = Hotel::all()->pluck('name', 'id');
        $types = RoomType::all()->pluck('name', 'id');

        return view('room.create', compact('hotels', 'types', 'selected'));
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
            'number' => [
                'required',
                'max:5',
                // Check if room number exist in the given hotel id
                Rule::unique('rooms')->where(function ($query) use ($request) {
                    return $query->where('hotel_id', $request->hotel_id);
                }),
            ],
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric|max:10000',
            // 'status' => 'required|max:10',
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
        $types = RoomType::all()->pluck('name', 'id');

        return view('room.edit', compact('room', 'types', 'hotels'));
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
            'number' => [
                'required',
                'max:5',
                Rule::unique('rooms')->where(function ($query)  use ($request) {
                    return $query->where('hotel_id', $request->hotel_id);
                })->ignore($room->id),
            ],
            'room_type_id' => 'required|exists:room_types,id',
            'price' => 'required|numeric|max:10000',
            'hotel_id' => 'bail|required|exists:hotels,id',
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
            ->with('danger', ['Deleted' , 'Room deleted']);
    }
}
