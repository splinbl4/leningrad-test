<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Tournament
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 */
class Tournament extends Model
{
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
