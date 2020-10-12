<?php

namespace Database\Factories;

use App\Models\BookingRecord;
use App\Models\Customer;
use App\Models\Hotel;
use App\Models\ScheduledEvent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookingRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookingRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hotel = Hotel::all()->random();
        $room = $hotel->rooms->random();

        return [
            'reference' => Str::random(7),
            'scheduled_event_id' => ScheduledEvent::all()->random(),
            'room_id' => $room->id,
            'price' => $room->price,
            'customer_id' => Customer::all()->random(),
            // 'room_type' => $room->type,
        ];
    }
}
