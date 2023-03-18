<?php

namespace App\Models;

use App\Models\Activation;
use App\Models\LiveActivation;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $all)
 * @method static latest()
 * @method static where(string $string, mixed $dd_house)
 * @method static firstWhere(string $string, mixed $dd_house)
 * @method static insert(array[] $house)
 * @method static findOrFail(string $string, $dd_house_id)
 */
class DdHouse extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'cluster_name',
        'region',
        'code',
        'name',
        'market_status',
        'email',
        'district',
        'address',
        'proprietor_name',
        'proprietor_number',
        'latitude',
        'longitude',
        'bts_code',
        'established_year',
        'image',
        'status',
    ];

    // Relationship
    public function bts(): HasMany
    {
        return $this->hasMany( Bts::class );
    }

    public function user(): HasMany
    {
        return $this->hasMany( User::class );
    }

    public function supervisor(): HasMany
    {
        return $this->hasMany( Supervisor::class );
    }

    public function bp(): HasMany
    {
        return $this->hasMany( Bp::class );
    }

    public function activation(): HasMany
    {
        return $this->hasMany( Activation::class );
    }

    public function liveActivation(): HasMany
    {
        return $this->hasMany( LiveActivation::class );
    }

    public function fcdGa(): HasMany
    {
        return $this->hasMany( FcdGa::class );
    }

    public function c2c(): HasMany
    {
        return $this->hasMany( C2c::class );
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
    public function liveSimIssue(): HasMany
    {
        return $this->hasMany( LiveSimIssue::class );
    }

    public function balance(): HasMany
    {
        return $this->hasMany( Balance::class );
    }

    public function bso(): HasMany
    {
        return $this->hasMany( Bso::class );
    }

    public function dso(): HasMany
    {
        return $this->hasMany( Dso::class );
    }
}
