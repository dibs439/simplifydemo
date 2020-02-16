<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Match;
use App\Team;
use Faker\Generator as Faker;

$factory->define(Match::class, function (Faker $faker) {
    return [
        'team_id_1' => function(){
            return factory('App\Team')->create()->id;
        },
        'team_id_2' => function(){
            return factory('App\Team')->create()->id;
        },
        'game_type' => 2,
        'toss_winner' => $faker->numberBetween(1,2),
        'team_batting_fist'  => $faker->numberBetween(1,2),
        'runs_team_1' => $faker->numberBetween(100, 350),
        'overs_team_1' => $faker->numberBetween(50, 50),
        'wickets_team_1' => $faker->numberBetween(0, 10),
        'runs_team_2' => $faker->numberBetween(100, 350),
        'overs_team_2' => $faker->numberBetween(50, 50),
        'wickets_team_2' => $faker->numberBetween(0, 10),
        'winning_team' => $faker->numberBetween(0, 1, 2),
    ];
});
