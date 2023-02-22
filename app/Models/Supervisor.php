<?php

namespace App\Models;

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
}
