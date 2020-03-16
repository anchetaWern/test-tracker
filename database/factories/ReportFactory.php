<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Report;
use App\Device;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
    	'ID' => substr($faker->bankAccountNumber, 0, 6),
        'Device_ID' => Device::all()->random()->ID,
        'Location' => $faker->city,
        'DateCreated' => $faker->dateTime()
    ];
});
