<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
   
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        'password' => '$2y$10$niRzGeGwuCu.MbCain732uCFsWij88VqYDVI0HRLt/BIUuaoDRAHS', // 123
        'phone_no' => $faker->tollFreePhoneNumber,
        'role_type' => $faker->numberBetween($min = 1, $max = 3),
        'status' => $faker->randomElement($array = array (1,2)),
        // 'remember_token' => Str::random(10),
    ];
});
