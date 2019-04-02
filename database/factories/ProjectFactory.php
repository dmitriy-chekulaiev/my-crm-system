<?php

use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\User;
use App\Models\Client;
use \Illuminate\Support\Facades\DB;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'client_id'=>rand(1,50),
        'name'=>$faker->name,
        'description'=>$faker->text,
        'estimation'=>$faker->numberBetween(40,500),
        'time_spent'=>$faker->numberBetween(0,800),
        'status' => $faker->randomElement(['on_going', 'in_progress', 'finish', 'failed']),
    ];
});
