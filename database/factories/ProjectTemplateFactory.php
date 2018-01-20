<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProjectTemplate::class, function (Faker $faker) {
    return [
        'template_name' => $faker->name,
        'template_desc' => $faker->text,
        'template_folder' => $faker->name,
    ];
});
