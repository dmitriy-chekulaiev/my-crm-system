<?php

use Faker\Generator as Faker;
use App\Models\Client;
use App\Models\User;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address'=>$faker->address,
        'contact_person' => $faker->firstName . ' ' .  $faker->lastName,
    ];
});
