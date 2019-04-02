<?php

use Faker\Generator as Faker;
use App\Models\Profile;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'gender' => $faker->randomElement(['male', 'female', 'alien', 'not_defined']),
        'position' => $faker->randomElement(['developer', 'designer', 'project_manager', 'qa']),
        'address' => $faker->address
    ];
});
