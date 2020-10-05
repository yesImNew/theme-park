<?php

namespace Database\Factories;

use App\Models\ScheduledEvent;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ScheduledEventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScheduledEvent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('now', '+3 months')->format('Y-m-d'),
            'title' => $this->faker->words(3, true),
            'comments' => $this->faker->realText(80, 1),
        ];
    }
}
