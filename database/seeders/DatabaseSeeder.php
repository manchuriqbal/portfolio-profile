<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comment;
use App\Models\Profile;
use App\Models\Education;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::query()->delete();
        Profile::query()->delete();
        Education::query()->delete();
        Comment::query()->delete();


        User::factory(15)
            ->has(
                Profile::factory()
                    ->has(Education::factory()->count(rand(2, 3)), 'educations')
                    ->has(Comment::factory()->count(rand(2, 5)), 'comments')
            )
            ->create();
    }

}
