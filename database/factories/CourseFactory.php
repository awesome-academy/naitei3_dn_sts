<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'duration' => $faker->randomDigit,
        'duration_type' => rand(0, 2),
        'status' => rand(0, 2),
        'image' => $faker->url,
        'start_day' => $faker->date,
        'end_day' => $faker->date,
    ];
});
