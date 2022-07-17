<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('courses')->truncate();

        DB::table('courses')->insert(array(
            0 =>
                array(

                    'course_title' => ' Laravel 1',
                    'course_duration' => '30',
                    'created_by' => '2',
                    'is_published'=> true,
                    'trainer_id'=>1
                ),
            1 =>
                array(

                    'course_title' => ' Laravel 9',
                    'course_duration' => '30',
                    'created_by' => '2',
                    'is_published'=> true,
                    'trainer_id'=>2
                ),
            2 =>
                array(

                    'course_title' => 'NodeJS',
                    'chapter_count' => '9',
                    'created_by' => '2',
                    'is_published'=> 0,
                    'trainer_id'=>5
                ),
            3 =>
                array(

                    'course_title' => 'React Development',
                    'course_duration' => '20',
                    'created_by' => '2',
                    'is_published'=> false,
                    'trainer_id'=>2
                ),
            4 =>
                array(
                    'course_title' => 'Web Development',
                    'course_duration' => '40',
                    'created_by' => '2',
                    'is_published'=> true,
                    'trainer_id'=>1
                ),
        ));

        Schema::enableForeignKeyConstraints();
    }
}
