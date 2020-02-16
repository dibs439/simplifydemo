<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use App\Team;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'team_id' => function(){
            return factory('App\Team')->create()->id;
        },
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'image_uri'  => $faker->imageUrl(),
        'jersey_num' => $faker->numberBetween(1,99),
        'country_code' => $faker->countryCode,
    ];
});
