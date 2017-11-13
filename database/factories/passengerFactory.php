<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Passenger::class, function (Faker $faker) {
    $titles = ['Mr.', 'Ms.', 'Mrs.', 'Miss', 'Dr.', null];
    return [
        'title' => $titles[array_rand($titles)],
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'dateOfBirth' => $faker->dateTimeInInterval("-70 years", "-5 years"),
        'customerSince' => $faker->dateTimeInInterval("-3 years", "-1 days"),
        'gender' => rand(0, 1) ? "m" : "f",
        'email' => $faker->safeEmail,
        'phone' => function() use ($faker) {
            if (mt_rand(0, 2)) {
                $toreturn = $faker->phoneNumber;
                $toreturn = preg_replace('/\-/', '.', $toreturn);
                $toreturn = preg_replace('/ |x[0-9].*/', '', $toreturn);
                return $toreturn;
            }
            else
                return null;
        }
    ];
});