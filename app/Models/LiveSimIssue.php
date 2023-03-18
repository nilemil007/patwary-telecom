<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static truncate()
 */
class LiveSimIssue extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'dd_house_id',
        'supervisor_id',
        'rso_id',
        'retailer_id',
        'product_code',
        'product_name',
        'selling_price',
        'sim_serial',
        'issue_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'issue_date' => 'datetime',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'product_code', 'like', $term )
                ->orWhere( 'product_name', 'like', $term )
                ->orWhere( 'sim_serial', 'like', $term )
                ->orWhere( 'selling_price', 'like', $term )
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
