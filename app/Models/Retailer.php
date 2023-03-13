<?php

namespace App\Models;

use App\Models\Activation;
use App\Models\C2C;
use App\Models\C2S;
use App\Models\LiveActivation;
use App\Models\SimIssue;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @method static latest()
 * @method static firstWhere(string $string, mixed $dd_house)
 * @method static where(string $string, string $string1)
 * @method static whereNotNull(string $string)
 * @method static truncate()
 * @property mixed user_id
 * @property mixed rso_id
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




    //_______________________________________Accessor________________________________________________
    // Retailer Name
    protected function retailerName(): Attribute
    {
        return Attribute::make(
            set: fn( $retailerName ) => Str::title( $retailerName ),
        );
    }
    // Retailer Type
    protected function retailerType(): Attribute
    {
        return Attribute::make(
            set: fn( $retailerType ) => Str::upper( $retailerType ),
        );
    }
    // Owner Name
    protected function ownerName(): Attribute
    {
        return Attribute::make(
            set: fn( $ownerName ) => Str::title( $ownerName ),
        );
    }
    // Address
    protected function address(): Attribute
    {
        return Attribute::make(
            set: fn( $address ) => Str::title( $address ),
        );
    }
    // Device Name
    protected function device_name(): Attribute
    {
        return Attribute::make(
            set: fn( $device_name ) => Str::title( $device_name ),
        );
    }
    // Device Serial No
    protected function device(): Attribute
    {
        return Attribute::make(
            set: fn( $device ) => Str::title( $device ),
        );
    }
    // Scanner Serial No
    protected function scanner(): Attribute
    {
        return Attribute::make(
            set: fn( $scanner ) => Str::title( $scanner ),
        );
    }

    // Dd House Id
    protected function ddHouseId(): Attribute
    {
        return Attribute::make(
            set: fn( $ddCode ) => DdHouse::firstWhere('code', $ddCode)->id,
        );
    }
    // Supervisor Id
    protected function supervisorId(): Attribute
    {
        return Attribute::make(
            set: fn( $poolNumber ) => Supervisor::firstWhere('pool_number', $poolNumber)->id,
        );
    }
    // Rso Id
    protected function rsoId(): Attribute
    {
        return Attribute::make(
            set: fn( $itopNumber ) => Rso::firstWhere('itop_number', $itopNumber)->id,
        );
    }
    // Enabled
    protected function enabled(): Attribute
    {
        return Attribute::make(
            set: fn( $on ) => $on == 'N' ? 'N' : 'Y',
        );
    }
    // Sim Seller
    protected function simSeller(): Attribute
    {
        return Attribute::make(
            set: fn( $on ) => $on == 'N' ? 'N' : 'Y',
        );
    }
    // Own Shop
    protected function ownShop(): Attribute
    {
        return Attribute::make(
            set: fn( $on ) => $on == 'N' ? 'N' : 'Y',
        );
    }
    // Others Operator
    protected function othersOperator(): Attribute
    {
        return Attribute::make(
            get: fn($othersOperator ) => json_decode( $othersOperator ),
            set: fn($othersOperator ) => json_encode( $othersOperator ),
        );
    }
    // BTS Id
    protected function btsId(): Attribute
    {
        return Attribute::make(
            set: fn( $btsId ) => Bts::firstWhere('bts_code', $btsId)->id,
        );
    }
    // Route Id
    protected function routeId(): Attribute
    {
        return Attribute::make(
            set: fn( $routeId ) => Route::firstWhere('code', $routeId)->id,
        );
    }
    //_______________________________________End Accessor___________________________________________






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

    public function activation(): HasMany
    {
        return $this->hasMany( Activation::class );
    }

    public function liveActivation(): HasMany
    {
        return $this->hasMany( LiveActivation::class );
    }

    public function c2c(): HasMany
    {
        return $this->hasMany( \App\Models\C2c::class );
    }
    public function liveC2c(): HasMany
    {
        return $this->hasMany( LiveC2c::class );
    }

    public function c2s(): HasMany
    {
        return $this->hasMany( C2S::class );
    }

    public function simIssue(): HasMany
    {
        return $this->hasMany( SimIssue::class );
    }
}
