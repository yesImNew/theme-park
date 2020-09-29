<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\RoomType;

use Illuminate\Database\Eloquent\Factories\Factory;

// use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    private $roomTypes = [
        'Deluxe',
        'Luxury',
        'Single',
        'Double',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->unique()->regexify('[G1-9]0[1-9]'),
            'room_type_id' => RoomType::all()->random(),
            'price' => $this->faker->randomFloat(2, 50, 1000),
            'hotel_id' => Hotel::factory(),
            'status' => 'available'
        ];
    }
}
