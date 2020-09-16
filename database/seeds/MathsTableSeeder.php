<?php

declare(strict_types=1);

use App\Models\Match;
use App\Models\Period;
use App\Models\Player;
use App\Models\Score;
use App\Models\Team;
use Illuminate\Database\Seeder;

class MathsTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Match::class, 3)->create()->each(function (Match $match) {
            $players = [];
            $match->teams()->saveMany(factory(Team::class, 2)->make())->each(function (Team $team) use (&$players) {
                $team->players()->saveMany(
                    $players = factory(Player::class, 2)->make()
                );
            });

            $periodCounts = $match->status === 0 ? Match::STATUS_PERIOD_5 : $match->status;
            $match->periods()->saveMany(
                $periods = factory(Period::class, $periodCounts)->make()
            );

            $i = $periodCounts;
            $playerIds = [];
            $players->map(function (Player $player) use (&$playerIds) {
                $playerIds[$player->id] = $player->id;
            });

            $periods->each(function (Period $period) use ($match, $playerIds, &$i) {
                $period->number = $i--;
                $period->start = $match->date;
                $period->scores()->saveMany(
                    factory(Score::class, rand(1, 10))->make()->each(function (Score $score) use ($playerIds) {
                        $score->player_id = array_rand($playerIds);
                    })
                );
            });
        });
    }
}
