<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName,
            'phone_no' => $this->faker->unique()->numberBetween(7000000, 7999999),
            // 'phone_no' => $this->faker->regexify('\+960 [79][0-9]{2}-[0-9]{4}'),
        ];
    }
}
