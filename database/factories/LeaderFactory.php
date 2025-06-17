<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leader>
 */
class LeaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->userName(),
            'email' => fake()->email(),
            'password' => fake()->password(10),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'birthdate' => fake()->date(),
            'is_active' => fake()->boolean()
        ];
    }
}
