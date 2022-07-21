<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('students')->truncate();

        DB::table('students')->insert(array(
            0 =>
                array(
                    'name'=>'nahid',
                    'email'=>'nahid@mail.com'
                ),
            1 =>
                array(
                    'name'=>'rubel',
                    'email'=>'rubel@mail.com'
                ),
            2 =>
                array(
                    'name'=>'asif',
                    'email'=>'aasif@mail.com'
                ),
            3 =>
                array(
                    'name'=>'forhad',
                    'email'=>'forahd@mail.com'
                ),
            4 =>
                array(
                    'name'=>'nishat',
                    'email'=>'nishat@mail.com'
                ),
        ));

        Schema::enableForeignKeyConstraints();

    }
}
