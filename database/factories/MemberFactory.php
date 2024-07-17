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
            'email' => $this->faker->email,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'image' => $this->faker->imageUrl,
            'position' => $this->faker->jobTitle(),
            'salary' => $this->faker->randomDigit,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->randomDigit,
            'joined_at' => $this->faker->date()
        ];
    }
}