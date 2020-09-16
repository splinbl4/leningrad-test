<?php

namespace App\Models;

use Carbon\Carbon;
use DomainException;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Jenssegers\Mongodb\Relations\HasMany;

/**
 * Class Match
 * @package App\Models
 *
 * @property int $id
 * @property Carbon $date
 * @property Carbon $start
 * @property Carbon $finish
 * @property int $status
 * @property int $tournament_id
 */
class Match extends Model
{
    public const STATUS_PERIOD_1 = 1;
    public const STATUS_PERIOD_2 = 2;
    public const STATUS_PERIOD_3 = 3;
    public const STATUS_PERIOD_4 = 4;
    public const STATUS_PERIOD_5 = 5;
    public const STATUS_COMPLETED = 0;

    public static array $statusesMap = [
        self::STATUS_PERIOD_1 => 'Period 1',
        self::STATUS_PERIOD_2 => 'Period 2',
        self::STATUS_PERIOD_3 => 'Period 3',
        self::STATUS_PERIOD_4 => 'Period 4',
        self::STATUS_PERIOD_5 => 'Period 5',
        self::STATUS_COMPLETED => 'Completed',
    ];

    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function periods(): HasMany
    {
        return $this->hasMany(Period::class, 'match_id', 'id');
    }

    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'match_id', 'id');
    }

    public function tournament(): BelongsTo
    {
        return $this->belongsTo(Tournament::class, 'tournament_id', 'id');
    }

    /**
     * @param int $status
     */
    public function changeStatus(int $status): void
    {
        if (!isset(self::$statusesMap[$status])) {
            throw new DomainException('This status does not exist.');
        }

        if ($this->status === $status) {
            throw new DomainException('Match is already this status.');
        }

        $this->status = $status;
    }
}
