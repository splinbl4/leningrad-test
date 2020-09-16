<?php

namespace App\Models;

use Carbon\Carbon;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasMany;

/**
 * Class Period
 * @package App\Models
 *
 * @property int $id
 * @property int $number
 * @property Carbon $start
 * @property Carbon $finish
 * @property int $match_id
 */
class Period extends Model
{
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function scores(): HasMany
    {
        return $this->hasMany(Score::class, 'period_id', 'id');
    }
}
