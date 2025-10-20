<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hobbies =[
                'Reading, Traveling, Coding',
                'Gaming, Music, Drawing',
                'Cooking, Hiking, Photography'
        ];
        return [
            'user_id' => User::factory() ?? User::factory(),
            'avatar' => 'https://i.pravatar.cc/200?u=' . fake()->unique()->uuid(),
            'gender' => fake()->randomElement(['male', 'female']),
            'hobbies' => fake()->randomElement($hobbies),
            'age' => fake()->numberBetween(18, 60),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'city' => fake()->city(),
        ];
    }
}
