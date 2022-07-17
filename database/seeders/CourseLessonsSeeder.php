<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CourseLessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('course_lessons')->truncate();

        DB::table('course_lessons')->insert(array(
            0 =>
                array(
                    'lesson_title'=>'Laraval Fundamental Init',
                    'lesson_duration'=> 5,
                    'course_chapter_id'=>'1'
                ),
            1 =>
                array(
                    'lesson_title'=>'Laraval Fundamental 2',
                    'lesson_duration'=> 12,
                    'course_chapter_id'=>'1'
                ),
            2 =>
                array(
                    'lesson_title'=>'Laraval Fundamental 3',
                    'lesson_duration'=> 5,
                    'course_chapter_id'=>'1'
                ),
            3 =>
                array(
                    'lesson_title'=>'Laraval Advance Init',
                    'lesson_duration'=> 5,
                    'course_chapter_id'=>'2'
                ),
            4 =>
                array(
                    'lesson_title'=>'Laraval Advance 2',
                    'lesson_duration'=> 5,
                    'course_chapter_id'=>'2'
                ),
        ));

        Schema::enableForeignKeyConstraints();
    }
}
