<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Match;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;
use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

/**
 * Class Matches
 * @package App\GraphQL\Queries
 */
class Matches
{
    /**
     * @param $rootValue
     * @param array $args
     * @param GraphQLContext $context
     * @param ResolveInfo $resolveInfo
     * @return array
     */
    public function __invoke($rootValue, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $matches = Match::all()->map(function (Match $match) {
            return [
                'id' => $match->id,
                'match_date' => Carbon::create($match->date),
                'result_score' => '2:0',
                'status' => $match->status,
                'tournament' => [
                    'id' => $match->tournament->id,
                    'name' => $match->tournament->name,
                ],
                'teams' => array_map(function (Team $team) {
                    return [
                        'id' => $team->id,
                        'name' => $team->name,
                        'players' => array_map(function (Player $player) {
                            return [
                                'id' => $player->id,
                                'name' => $player->name
                            ];
                        }, $team->players()->getModels())
                    ];
                }, $match->teams()->getModels())
            ];
        });

        return $matches->toArray();
    }
}
