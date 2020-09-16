<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasMany;

/**
 * Class Team
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property int $match_id
 */
class Team extends Model
{
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function players(): HasMany
    {
        return $this->hasMany(Player::class, 'team_id', 'id');
    }
}
