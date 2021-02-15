<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dress;
use Faker\Generator as Faker;

$factory->define(Dress::class, function (Faker $faker) {
    return [
        'dress_name' => $faker->company,
        'quantity' => $faker->numberBetween($min= 3, $max= 10),
        'prices' => $faker->numberBetween($min= 11, $max= 35),
        'status' => $faker->randomElement($array = array (1,2)),
        'brand_id' => $faker->numberBetween($min= 1, $max= 10),
        'user_id' => App\User::pluck('id')->random(),
        // 'user_id' => factory('App\User')->create()->id,
    ];
});
