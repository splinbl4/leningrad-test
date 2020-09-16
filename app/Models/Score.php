<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Score
 * @package App\Models
 *
 * @property int $id
 * @property float $score_time
 * @property int $player_id
 * @property int $period_id
 */
class Score extends Model
{
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
