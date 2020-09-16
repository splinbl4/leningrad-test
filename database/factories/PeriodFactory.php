<?php

declare(strict_types=1);

use App\Models\Period;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Period::class, function (Faker $faker) {
    return [
        'number' => null,
        'start' => null,
        'finish' => null,
        'match_id' => null
    ];
});
