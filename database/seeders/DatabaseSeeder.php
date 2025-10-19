<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Education;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)
            ->has(
                Profile::factory()
                ->has(Education::factory()->count(rand(2, 3)), 'educations')
                ->has(Comment::factory()->count(rand(2, 5)), 'comments')
            )
            ->create();
    }
}
