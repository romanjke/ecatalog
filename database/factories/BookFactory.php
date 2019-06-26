<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'name' => substr($faker->realText($maxNbChars = 30, $indexSize = 2), 0, -1),
        'udk' => function () use ($faker) {
            return $faker->randomNumber($nbDigits = 3, $strict = false) .
                '.' . $faker->randomNumber($nbDigits = 1, $strict = false) .
                '.' . $faker->randomNumber($nbDigits = 2, $strict = false);
        },
        'bbk' => function () use ($faker) {
            return $faker->randomNumber($nbDigits = 2, $strict = false) .
                '.' . $faker->randomNumber($nbDigits = 3, $strict = false) .
                '.' . $faker->randomNumber($nbDigits = 2, $strict = false);
        },
        'published_at' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)->format('Y-m-d'),
        'publish_place' => $faker->city,
        'annotation' => $faker->realText($maxNbChars = 1500, $indexSize = 2)
    ];
});
