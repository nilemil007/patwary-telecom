<?php

namespace App\Models;

use App\Models\Reports\Activation;
use App\Models\Reports\C2C;
use App\Models\Reports\C2S;
use App\Models\Reports\LiveActivation;
use App\Models\Reports\SimIssue;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

/**
 * @method static create(array $except)
 * @method static insert(array $array)
 * @method static firstWhere(string $string, $rsoItop)
 * @method static find(string $id)
 * @method static findOrFail()
 * @property mixed user_id
 * @property mixed document
 */
class Rso extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'supervisor_id',
        'dd_house_id',
        'routes',
        'code',
        'itop_number',
        'pool_number',
        'personal_number',
        'tmp_personal_number',
        'rid',
        'father_name',
        'tmp_father_name',
        'mother_name',
        'tmp_mother_name',
        'division',
        'district',
        'thana',
        'address',
        'tmp_address',
        'blood_group',
        'tmp_blood_group',
        'sr_no',
        'account_number',
        'tmp_account_number',
        'bank_name',
        'tmp_bank_name',
        'brunch_name',
        'tmp_brunch_name',
        'routing_number',
        'tmp_routing_number',
        'market_type',
        'salary',
        'education',
        'tmp_education',
        'marital_status',
        'tmp_marital_status',
        'gender',
        'dob',
        'tmp_dob',
        'nid',
        'tmp_nid',
        'status',
        'document',
        'joining_date',
        'resigning_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dob'               => 'datetime',
        'tmp_dob'           => 'datetime',
        'joining_date'      => 'datetime',
        'resigning_date'    => 'datetime',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'code', 'like', $term )
                ->orWhere( 'itop_number', 'like', $term )
                ->orWhere( 'pool_number', 'like', $term )
                ->orWhere( 'personal_number', 'like', $term )
                ->orWhere( 'rid', 'like', $term )
                ->orWhere( 'father_name', 'like', $term )
                ->orWhere( 'mother_name', 'like', $term )
                ->orWhere( 'division', 'like', $term )
                ->orWhere( 'district', 'like', $term )
                ->orWhere( 'thana', 'like', $term )
                ->orWhere( 'address', 'like', $term )
                ->orWhere( 'blood_group', 'like', $term )
                ->orWhere( 'sr_no', 'like', $term )
                ->orWhere( 'account_number', 'like', $term )
                ->orWhere( 'bank_name', 'like', $term )
                ->orWhere( 'routing_number', 'like', $term )
                ->orWhere( 'market_type', 'like', $term )
                ->orWhere( 'salary', 'like', $term )
                ->orWhere( 'education', 'like', $term )
                ->orWhere( 'marital_status', 'like', $term )
                ->orWhere( 'gender', 'like', $term )
                ->orWhere( 'nid', 'like', $term )
                ->orWhere( 'status', 'like', $term )
                ->orWhereHas('user', function ( $query ) use ( $term ){
                    $query->where( 'name', 'like', $term );
                })
                ->orWhereHas('supervisor', function ( $query ) use ( $term ){
                    $query->where( 'pool_number', 'like', $term );
            });
        });
    }

    protected function userId(): Attribute
    {
        return Attribute::make(
            set: fn( $acNumber ) => User::firstWhere('username', $acNumber)->id,
        );
    }
    protected function ddHouseId(): Attribute
    {
        return Attribute::make(
            set: fn( $ddCode ) => DdHouse::firstWhere('code', $ddCode)->id,
        );
    }
    protected function routes(): Attribute
    {
        return Attribute::make(
            get: fn( $route ) => json_decode( $route, true ),
            set: fn( $route ) => json_encode( $route ),
        );
    }
    protected function fatherName(): Attribute
    {
        return Attribute::make(
            get: fn( $fname ) => Str::title( $fname ),
            set: fn( $fname ) => Str::lower( $fname ),
        );
    }
    protected function motherName(): Attribute
    {
        return Attribute::make(
            get: fn( $mname ) => Str::title( $mname ),
            set: fn( $mname ) => Str::lower( $mname ),
        );
    }
    protected function education(): Attribute
    {
        return Attribute::make(
            get: fn( $edu ) => Str::upper( $edu ),
            set: fn( $edu ) => Str::lower( $edu ),
        );
    }
    protected function maritalStatus(): Attribute
    {
        return Attribute::make(
            get: fn( $married ) => Str::title( $married ),
            set: fn( $married ) => Str::lower( $married ),
        );
    }
    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn( $address ) => Str::title( $address ),
            set: fn( $address ) => Str::lower( $address ),
        );
    }
    protected function bankName(): Attribute
    {
        return Attribute::make(
            get: fn( $bankName ) => Str::title( $bankName ),
            set: fn( $bankName ) => Str::lower( $bankName ),
        );
    }
    protected function brunchName(): Attribute
    {
        return Attribute::make(
            get: fn( $brunch ) => Str::title( $brunch ),
            set: fn( $brunch ) => Str::lower( $brunch ),
        );
    }
    protected function marketType(): Attribute
    {
        return Attribute::make(
            get: fn( $market ) => Str::title( $market ),
            set: fn( $market ) => Str::lower( $market ),
        );
    }


    // Relationship
    public function retailer(): HasMany
    {
        return $this->hasMany( Retailer::class );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }
    public function ddHouse(): BelongsTo
    {
        return $this->belongsTo( DdHouse::class );
    }
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo( Supervisor::class );
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
        return $this->hasMany( C2C::class );
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
