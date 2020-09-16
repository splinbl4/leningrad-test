<?php

declare(strict_types=1);

use App\Models\Score;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Score::class, function (Faker $faker) {
    return [
        'score_time' => $faker->randomFloat(2, 0, 30),
        'player_id' => null,
        'period_id' => null
    ];
});
