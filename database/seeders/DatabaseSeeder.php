<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            CourseChapterSeeder::class,
            CourseLessonsSeeder::class,
            CourseEnrolementsSeeder::class,
            TrainerSeeder::class,
            StudentSeeder::class,
        ]);
        Question::factory(10)->create();
        Answer::factory(40)->create();
    }
}
