<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Passenger::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'dateOfBirth' => $faker->dateTimeInInterval("-70 years", "-5 years"),
        'customerSince' => $faker->dateTimeInInterval("-3 years", "-1 days"),
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