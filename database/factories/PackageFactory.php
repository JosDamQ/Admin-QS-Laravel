<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'trackin' => fake()->unique()->randomNumber(),
            'weight' => fake()->text(),
            'description' => fake()->text(),
            'customer_id' => \App\Models\Customer::all()->random()->id,
            'status_id' => \App\Models\Status::all()->random()->id,
        ];
    }
}
