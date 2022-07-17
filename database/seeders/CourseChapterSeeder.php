<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CourseChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('course_chapters')->truncate();

        DB::table('course_chapters')->insert(array(
            0 =>
                array(
                    'chapter_title'=>'Laraval Fundamental',
                    'course_id'=>'1'
                ),
            1 =>
                array(
                    'chapter_title'=>'Laraval Advanced',
                    'course_id'=>'1'
                ),
            2 =>
                array(
                    'chapter_title'=>'Laraval Eloquent',
                    'course_id'=>'1'
                ),
            3 =>
                array(
                    'chapter_title'=>'React Fundamental',
                    'course_id'=>'4'
                ),
            4 =>
                array(
                    'chapter_title'=>'React Advanced',
                    'course_id'=>'4'
                ),
        ));

        Schema::enableForeignKeyConstraints();
    }
}
