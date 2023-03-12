<?php

namespace App\Models\Reports;

use App\Models\DdHouse;
use App\Models\Retailer;
use App\Models\Rso;
use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static truncate()
 */
class LiveC2c extends Model
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'datetime',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'amount', 'like', $term )
                ->orWhere( 'date', 'like', $term )
                ->orWhereHas('ddHouse', function ( $query ) use ( $term ){
                    $query->where( 'code', 'like', $term )
                        ->orWhere( 'name', 'like', $term );
                })
                ->orWhereHas('supervisor', function ( $query ) use ( $term ){
                    $query->where( 'pool_number', 'like', $term );
                })
                ->orWhereHas('retailer', function ( $query ) use ( $term ){
                    $query->where( 'retailer_code', 'like', $term )
                        ->orWhere('retailer_name', 'like', $term);
                })
                ->orWhereHas('rso', function ( $query ) use ( $term ){
                    $query->where( 'itop_number', 'like', $term );
                });
        });
    }

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
