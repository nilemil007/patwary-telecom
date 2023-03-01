<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @method static whereBetween(string $string, array $array)
 * @method static search(mixed $search)
 * @method static where(string $string, int|string|null $id)
 * @method static latest()
 * @method static create(mixed $validated)
 * @method static select(string $string, string $string1, string $string2, string $string3, string $string4, string $string5, string $string6, string $string7, string $string8, string $string9, string $string10, string $string11, string $string12, string $string13, string $string14, string $string15, string $string16)
 * @method static firstWhere()
 */
class CompetitionInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'cluster',
        'region',
        'dd_code',
        'retailer_code',
        'rso_number',
        'retailer_number',
        'bl_c2s',
        'gp_c2s',
        'robi_c2s',
        'airtel_c2s',
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
            $query->where( 'retailer_code', 'like', $term )
                ->orWhere( 'rso_number', 'like', $term )
                ->orWhere( 'retailer_number', 'like', $term );
        });
    }
}
