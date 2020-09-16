<?php

declare(strict_types=1);

use App\Models\Match;
use App\Models\Tournament;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Match::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'date' => $faker->dateTimeBetween('-3 day', 'now')->getTimestamp(),
        'status' => $faker->randomKey(Match::$statusesMap),
        'tournament_id' => Tournament::query()->first()->id
    ];
});
