<?php

declare(strict_types=1);

use App\Models\Player;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'team_id' => null,
    ];
});
