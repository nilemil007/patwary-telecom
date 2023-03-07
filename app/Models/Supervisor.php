<?php

namespace App\Models;

use App\Models\Reports\Activation;
use App\Models\Reports\LiveActivation;
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
}
