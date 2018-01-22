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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'nickname' => $faker->ean8,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->unique()->ean8,
        'password' => '$2y$10$UrZ/lCq4BmtKDPT2lxUg1.I8kpkM.IJCE.uzkzxrMa2suIv1vUpc2', // secret
        'remember_token' => str_random(10),
    ];
});
