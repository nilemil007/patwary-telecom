<?php

namespace App\Models\Reports;

use App\Models\DdHouse;
use App\Models\Rso;
use App\Models\Supervisor;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activation extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'dd_house_id',
        'supervisor_id',
        'rso_id',
        'retailer_code',
        'product_code',
        'product_name',
        'sim_serial',
        'msisdn',
        'selling_price',
        'activation_date',
        'bio_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'activation_date' => 'datetime',
        'bio_date' => 'datetime',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'code', 'like', $term )
                ->orWhere( 'itop_number', 'like', $term )
                ->orWhere( 'pool_number', 'like', $term );
//                ->orWhereHas('user', function ( $query ) use ( $term ){
//                    $query->where( 'name', 'like', $term );
//                })
//                ->orWhereHas('supervisor', function ( $query ) use ( $term ){
//                    $query->where( 'pool_number', 'like', $term );
//                });
        });
    }

    protected function marketType(): Attribute
    {
        return Attribute::make(
            get: fn( $market ) => Str::title( $market ),
            set: fn( $market ) => Str::lower( $market ),
        );
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
}
