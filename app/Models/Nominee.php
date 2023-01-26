<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 */
class Nominee extends Model
{
    use HasFactory;

    protected $fillable = [
        'rso_id',
        'name',
        'relation',
        'number',
        'address',
        'father_name',
        'mother_name',
        'dob',
        'nid',
        'witness_name',
        'witness_designation',
        'image',
    ];

    // Relationship
    public function rso(): BelongsTo
    {
        return $this->belongsTo( Rso::class );
    }
}
