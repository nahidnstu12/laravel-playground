<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CourseEnrolementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('course_enrolements')->truncate();

        DB::table('course_enrolements')->insert(array(
            0 =>
                array(
                    'student_id'=>1,
                    'tsp_approval'=> true,
                    'course_id'=>'1'
                ),
            1 =>
                array(
                    'student_id'=>1,
                    'tsp_approval'=> true,
                    'course_id'=>'2'
                ),
            2 =>
                array(
                    'student_id'=>1,
                    'tsp_approval'=> true,
                    'course_id'=>'3'
                ),
            3 =>
                array(
                    'student_id'=>2,
                    'tsp_approval'=> true,
                    'course_id'=>'1'
                ),
            4 =>
                array(
                    'student_id'=>3,
                    'tsp_approval'=> true,
                    'course_id'=>'1'
                ),
        ));

        Schema::enableForeignKeyConstraints();
    }
}
