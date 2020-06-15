<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Password::class, function (Faker $faker) {
    return [
        'surname'=>$faker->lastName,
        'name'=>$faker->name,
        'series'=> strtoupper($faker->randomLetter."".$faker->randomLetter),
        'number'=>$faker->unique()->numberBetween(100000,999999),
        'organ'=>$faker->text(20)
    ];
});
