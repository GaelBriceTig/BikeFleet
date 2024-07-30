<?php

namespace Database\Factories;

use App\Models\Bike;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bike>
 */
class BikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'serial_number' => fake()->randomNumber(6),
            'manufacture_date' => fake()->dateTimeBetween(),
            'bike_model_id' => fake()->numberBetween(1, 3),
            'disabled' => fake()->boolean(), // password
            'status_id' => fake()->numberBetween(1, 3),
        ];
    }
}
