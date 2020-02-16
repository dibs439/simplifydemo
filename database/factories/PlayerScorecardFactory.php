<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PlayerScorecard;
use Faker\Generator as Faker;

$factory->define(PlayerScorecard::class, function (Faker $faker) {
    return [
        'runs' => $faker->numberBetween(30, 100),
        'balls' => $faker->numberBetween(30, 125),
        'fours'  => $faker->numberBetween(0, 4),
        'sixes' => $faker->numberBetween(0, 2),
        'dots' =>0,
    ];
});
