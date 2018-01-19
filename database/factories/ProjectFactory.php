<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    $date = $faker->date. ' ' .$faker->time;

    return [
        'project_name' => $faker->name,
        'project_folder' => $faker->name,
        'wechat_id' => 1,
        'share_title' => $faker->name,
        'share_desc' => $faker->text,
        'start_time' => $date,
        'end_time' => $date,
    ];
});
