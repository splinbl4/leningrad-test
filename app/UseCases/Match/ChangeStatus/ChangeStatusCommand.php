<?php

declare(strict_types=1);

namespace App\UseCases\Match\ChangeStatus;

/**
 * Class ChangeStatusCommand
 * @package App\UseCases\Match\ChangeStatus
 */
class ChangeStatusCommand
{
    public int $matchId;
    public int $status;
}
