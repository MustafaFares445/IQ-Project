<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Score;
use App\Models\Type;
use Database\Factories\ChoiceFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(10)->create();
//
//         \App\Models\User::factory()->create([
//             'name' => 'Test User',
//             'email' => 'test@example.com',
//         ]);

         Type::factory()->create();
         Question::factory(25)->create();
         Choice::factory(100)->create();
         Score::factory(10)->create();
    }
}
