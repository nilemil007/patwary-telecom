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

/**
 * @method static create(array $array)
 * @method static latest()
 * @method static firstWhere(string $string, mixed $dd_house)
 */
class Supervisor extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'pool_number',
        'personal_number',
        'father_name',
        'mother_name',
        'division',
        'district',
        'thana',
        'address',
        'nid',
        'dob',
        'joining_date',
        'resigning_date',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'joining_date' => 'datetime',
        'resigning_date' => 'datetime',
        'dob' => 'datetime',
    ];

    protected function ddHouseId(): Attribute
    {
        return Attribute::make(
            set: fn ( $ddCode ) => DdHouse::firstWhere('code', $ddCode)->id,
        );
    }

    public function rso(): HasMany
    {
        return $this->hasMany(Rso::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ddHouse(): BelongsTo
    {
        return $this->belongsTo(DdHouse::class);
    }

    public function activation(): HasMany
    {
        return $this->hasMany(Activation::class);
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

    public function esaf(): HasMany
    {
        return $this->hasMany( Esaf::class );
    }

}
