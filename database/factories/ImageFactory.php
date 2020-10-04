<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imageables = [
            \App\Models\Room::class,
            \App\Models\Activity::class,
            \App\Models\Hotel::class,
        ];

        $imageableType = $this->faker->randomElement($imageables);
        $imageable = $imageableType::factory()->create();

        return [
            'url' => $this->faker->image('storage/app/images', 1000, 500, null, false),
        ];
    }
}
