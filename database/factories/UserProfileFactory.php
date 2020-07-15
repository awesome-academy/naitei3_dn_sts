<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\User_profile;
use Faker\Generator as Faker;

$factory->define(User_profile::class, function (Faker $faker) {
    return [
        'birthday' => $faker->dateTime,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => $faker->boolean($chanceOfGettingTrue = 60),
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
