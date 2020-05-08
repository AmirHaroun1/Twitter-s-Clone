<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\tweet;
use Faker\Generator as Faker;

$factory->define(tweet::class, function (Faker $faker) {
    return [
        //
        'body'=>$faker->sentence,
    ];
});
