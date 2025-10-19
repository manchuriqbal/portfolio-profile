<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
    {

        $hasImage = fake()->boolean(30);
        return [

            'profile_id' => Profile::inRandomOrder()->first()?->id ?? Profile::factory(),
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'comment_text' => fake()->sentence(fake()->numberBetween(5, 15)),
            'comment_image' => $hasImage
                ? fake()->imageUrl(400, 300, 'nature', true, 'Comment')
                : null,
        ];
    }
}
