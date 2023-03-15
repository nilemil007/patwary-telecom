<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, $id)
 * @method static latest(string $string)
 */
class Retailer extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'dd_house_id',
        'user_id',
        'rso_id',
        'supervisor_id',
        'bts_id',
        'route_id',
        'retailer_code',
        'retailer_name',
        'tmp_retailer_name',
        'retailer_type',
        'tmp_retailer_type',
        'enabled',
        'sim_seller',
        'tmp_sim_seller',
        'itop_number',
        'service_point',
        'owner_name',
        'tmp_owner_name',
        'contact_no',
        'tmp_contact_no',
        'own_shop',
        'district',
        'thana',
        'tmp_thana',
        'address',
        'tmp_address',
        'nid',
        'tmp_nid',
        'trade_license_no',
        'tmp_trade_license_no',
        'others_operator',
        'tmp_others_operator',
        'longitude',
        'tmp_longitude',
        'latitude',
        'tmp_latitude',
        'device_name',
        'tmp_device_name',
        'device_sn',
        'tmp_device_sn',
        'scanner_sn',
        'tmp_scanner_sn',
        'document',
        'password',
        'status',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'retailer_code', 'like', $term )
                ->orWhere( 'retailer_name', 'like', $term )
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
                ->orWhere( 'status', 'like', $term );
//                ->orWhereHas('user', function ( $query ) use ( $term ){
//                    $query->where( 'name', 'like', $term )
//                        ->orWhere( 'role', 'like', $term );
//                });
        });
    }


    //_______________________________________Relationship___________________________________________
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }

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
