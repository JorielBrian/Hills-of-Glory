<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->name(),
            'middle_name' => fake()->name(),
            'last_name' => fake()->name(),
            'age' => fake()->numberBetween(13, 95),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'birth_date' => fake()->date(),
            'address' => fake()->address(),
            'contact' => fake()->phoneNumber(),
            'status' => fake()->randomElement(['Student', 'Young Professional']),
            'parent' => fake()->randomElement(['Yes', 'No']),
            'network_leader' => fake()->name(),
        ];
    }
}
