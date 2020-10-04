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
            'nid' => $this->faker->regexify('A[0-9]{6}'),
            'name' => $this->faker->firstName,
            'phone_no' => $this->faker->unique()->numberBetween(7000000, 7999999),
        ];
    }
}
