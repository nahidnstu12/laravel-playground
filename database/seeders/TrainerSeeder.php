<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('trainers')->truncate();

        DB::table('trainers')->insert(array(
            0 =>
                array(
                    'name'=>'hasnat riaz',
                ),
            1 =>
                array(
                    'name'=>'Kowsik Hawladar',
                ),
            2 =>
                array(
                    'name'=>'Salauddin Paathen',
                ),
            3 =>
                array(
                    'name'=>'Ratno Dip Kuri',
                ),
            4 =>
                array(
                    'name'=>'Abul Kalam Azad',
                ),
        ));

        Schema::enableForeignKeyConstraints();
    }
}
