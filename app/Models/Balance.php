<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static truncate()
 */
class Balance extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'dd_house_id',
        'supervisor_id',
        'rso_id',
        'retailer_id',
        'date',
        'amount',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function ddHouse(): BelongsTo
    {
        return $this->belongsTo( DdHouse::class );
    }
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo( Supervisor::class );
    }
    public function rso(): BelongsTo
    {
        return $this->belongsTo( Rso::class );
    }
    public function retailer(): BelongsTo
    {
        return $this->belongsTo( Retailer::class );
    }
}
