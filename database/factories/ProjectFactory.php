<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    $date = $faker->date. ' ' .$faker->time;

    return [
        'uid' => 1,
        'wechat_id' => 1,
        'project_name' => $faker->name,
        'template_id' => 1,
        'share_title' => $faker->name,
        'share_desc' => $faker->name,
        'start_time' => $date,
        'end_time' => $date,
    ];
});
