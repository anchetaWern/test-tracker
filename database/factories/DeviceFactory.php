<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Device;
use Faker\Generator as Faker;

$factory->define(Device::class, function (Faker $faker) {
    return [
      'ID' => substr($faker->bankAccountNumber, 0, 6),
      'Name' => $faker->userName  
    ];
});
