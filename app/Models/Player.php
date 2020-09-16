<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Player
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property int $team_id
 */
class Player extends Model
{
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
