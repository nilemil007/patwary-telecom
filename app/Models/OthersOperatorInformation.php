<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static whereNotNull(string $string)
 * @method static create(array $data)
 * @method static search(mixed $input)
 * @method static where(string $string, $itop_number)
 */
class OthersOperatorInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'cluster',
        'region',
        'dd_code',
        'retailer_code',
        'rso_number',
        'retailer_number',
        'bl_tarshiary',
        'gp_tarshiary',
        'robi_tarshiary',
        'airtel_tarshiary',
        'bl_ga',
        'gp_ga',
        'robi_ga',
        'airtel_ga',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'retailer_number', 'like', $term );
        });
    }
}
