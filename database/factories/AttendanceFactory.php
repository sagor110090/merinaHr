<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendance;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        'employee_id' =>  1 ,
        'attendance' => '09:00:00',
        'late' => '0',
        'date' => $faker->dateTimeThisMonth->format('Y-m-d'),

    ];
});
