<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $brand = ['LOUIS VUITTON','Gucchi','Prada','Blueberry','RALPH LAUREN','Chanel','ABS','Xenon','Walmart','Leco'];
    return [
        'brand_name' => $faker->unique()->randomElement($brand),
        'description'=> $faker->paragraph,
        // 'status' => $faker->randomElement($array = array (1,2)),
    ];
});
