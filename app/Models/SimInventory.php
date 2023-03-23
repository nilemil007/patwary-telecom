<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static truncate()
 * @method static create(array $array)
 */
class SimInventory extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'dd_house_id',
        'product_code',
        'product_name',
        'lifting_price',
        'sim_serial',
    ];

    public function ddHouse(): BelongsTo
    {
        return $this->belongsTo( DdHouse::class );
    }
}
