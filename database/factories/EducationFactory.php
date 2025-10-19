<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-10 years', '-2 years');
        $endDate = (clone $startDate)->modify('+' . fake()->numberBetween(1, 4) . ' years');
        $degree = [
                'BSc in Computer Science',
                'Bachelor of Business Administration',
                'BSc in Electrical Engineering',
                'BA in English Literature',
                'MBA in Marketing',
                'MSc in Data Science',
        ];
        return [
            'profile_id' => Profile::inRandomOrder()->first()?->id ?? Profile::factory(),
            'degree' => fake()->randomElement($degree),
            'institute' => fake()->company() . ' University',
            'grade' => fake()->randomElement(['A+', 'A', 'B+', '3.8 GPA', 'First Class']),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
