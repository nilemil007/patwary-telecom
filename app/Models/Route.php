<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, int $int)
 * @method static truncate()
 * @method static latest()
 * @method static select()
 * @method static firstWhere(string $string, $routeId)
 */
class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'description',
        'length',
        'weekdays',
        'status',
    ];

    public static function getAllRoutes()
    {
        return Route::select('code','name','description','weekdays','length')->get()->toArray();
    }

    // Relationship
    public function rso(): BelongsTo
    {
        return $this->belongsTo( Rso::class );
    }

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'code', 'like', $term )
                ->orWhere( 'name', 'like', $term )
                ->orWhere( 'description', 'like', $term )
                ->orWhere( 'length', 'like', $term )
                ->orWhere( 'weekdays', 'like', $term );
        });
    }
}
