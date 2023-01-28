<?php

namespace App\Models;

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
    use HasFactory;

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
}
