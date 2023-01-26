<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static latest()
 * @method static where()
 * @method static firstWhere()
 */
class Retailer extends Model
{
    use HasFactory;

    protected $fillable = [
        'dd_house_id',
        'rso_id',
        'bts_id',
        'route_id',
        'retailer_code',
        'shop_name',
        'tmp_shop_name',
        'retailer_type',
        'enabled',
        'sim_seller',
        'itop_number',
        'service_point',
        'owner_name',
        'tmp_owner_name',
        'contact_no',
        'tmp_contact_no',
        'district',
        'thana',
        'tmp_thana',
        'address',
        'tmp_address',
        'nid',
        'tmp_nid',
        'trade_license_no',
        'tmp_trade_license_no',
        'image',
        'remarks',
        'status',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'retailer_code', 'like', $term )
                ->orWhere( 'shop_name', 'like', $term )
                ->orWhere( 'retailer_type', 'like', $term )
                ->orWhere( 'itop_number', 'like', $term )
                ->orWhere( 'service_point', 'like', $term )
                ->orWhere( 'owner_name', 'like', $term )
                ->orWhere( 'contact_no', 'like', $term )
                ->orWhere( 'district', 'like', $term )
                ->orWhere( 'thana', 'like', $term )
                ->orWhere( 'address', 'like', $term )
                ->orWhere( 'nid', 'like', $term )
                ->orWhere( 'trade_license_no', 'like', $term )
                ->orWhere( 'remarks', 'like', $term );
//                ->orWhereHas('user', function ( $query ) use ( $term ){
//                    $query->where( 'name', 'like', $term )
//                        ->orWhere( 'role', 'like', $term );
//                });
        });
    }

    //_______________________________________Accessor________________________________________________
    // Dd House Id
    protected function ddHouseId(): Attribute
    {
        return Attribute::make(
            set: fn( $ddCode ) => empty( $ddCode ) ? null : DdHouse::firstWhere('code', $ddCode)->id,
        );
    }
    // Rso Id
    protected function rsoId(): Attribute
    {
        return Attribute::make(
            set: fn( $rsoItop ) => empty( $rsoItop ) ? null : Rso::firstWhere('itop_number', $rsoItop)->id,
        );
    }
    // BTS Id
    protected function btsId(): Attribute
    {
        return Attribute::make(
            set: fn( $btsId ) => empty( $btsId ) ? null : Bts::firstWhere('bts_code', $btsId)->id,
        );
    }
    // Route Id
    protected function routeId(): Attribute
    {
        return Attribute::make(
            set: fn( $routeId ) => empty( $routeId ) ? null : Route::firstWhere('code', $routeId)->id,
        );
    }
    //_______________________________________End Accessor___________________________________________

    // Relationship
    public function rso(): BelongsTo
    {
        return $this->belongsTo( Rso::class );
    }

    public function bts(): BelongsTo
    {
        return $this->belongsTo( Bts::class );
    }

    public function route(): BelongsTo
    {
        return $this->belongsTo( Route::class );
    }

    public function ddHouse(): BelongsTo
    {
        return $this->belongsTo( DdHouse::class );
    }
}
