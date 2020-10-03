<?php

namespace Database\Factories;

use App\Models\ScheduledEvents;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ScheduledEventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ScheduledEvents::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'title' => $this->faker->words(3, true),
            'comments' => $this->faker->realText(80, 1),
        ];
    }
}
