<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
    ];
});

$factory->state(Task::class, 'incomplete', function (Faker $faker) {
    return [
        'is_complete' => 0,
    ];
});

$factory->state(Task::class, 'complete', function (Faker $faker) {
    return [
        'is_complete' => 1,
    ];
});
