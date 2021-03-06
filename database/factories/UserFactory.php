<?php

use Faker\Generator as Faker;

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
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'role' => 2, // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'surname' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Phone::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'number' => $faker->phoneNumber,
        'member_id' => $faker->randomDigitNotNull,
    ];
});
