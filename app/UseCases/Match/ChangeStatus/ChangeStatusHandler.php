<?php

declare(strict_types=1);

namespace App\UseCases\Match\ChangeStatus;

use App\Models\Match;
use App\Models\Period;

/**
 * Class ChangeStatusHandler
 * @package App\UseCases\Match\ChangeStatus
 */
class ChangeStatusHandler
{
    public function handle(ChangeStatusCommand $command): void
    {
        /** @var Match $match **/
        $match = Match::findOrFail($command->matchId);
        $match->changeStatus($command->status);

        if ($command->status !== Match::STATUS_COMPLETED) {
            Period::create([
                'number' => $command->status
            ]);
        }
    }
}
