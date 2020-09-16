<?php

declare(strict_types=1);

use App\Models\Tournament;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Tournament::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
