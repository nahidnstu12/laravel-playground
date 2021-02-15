<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;
use App\Brand;
use App\Dress;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        // Brand::truncate();
        Dress::truncate();
        // Category::truncate();
        // Product::truncate();
        
        factory(App\User::class, 6)->create();
        // ->each(function($u){
        //     $u->dresses()
        //     ->saveMany(factory(App\Dress::class,20)->make());
        // });
        factory('App\Dress',40)->create();
        // factory('App\Brand',10)->create();
    }
}
