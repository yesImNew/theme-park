<?php

namespace Database\Factories;

use App\Models\BookingRecord;
use App\Models\Customer;
use App\Models\Hotel;
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
            'start' => $this->faker->dateTimeBetween('now', '+5 days'),
            'end' => $this->faker->dateTimeBetween('+6 days', '+10 days'),
            'customer_id' => Customer::all()->random(),
            'hotel_id' => $hotel->id,
            'room_id' => $room->id,
            'room_type' => $room->type,
            'price' => $room->price,
        ];
    }
}
