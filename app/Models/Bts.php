<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Shared\Date;

/**
 * @method static paginate(int $int)
 * @method static latest()
 * @method static truncate()
 * @method static where(string $string, int $int)
 * @method static firstWhere(string $string, $btsId)
 * @method static select(string $string, string $string1, string $string2, string $string3, string $string4, string $string5, string $string6, string $string7, string $string8, string $string9, string $string10, string $string11, string $string12, string $string13, string $string14, string $string15, string $string16)
 */
class Bts extends Model
{
    use HasFactory;

    protected $fillable = [
        'dd_house_id',
        'site_id',
        'bts_code',
        'site_type',
        'division',
        'district',
        'thana',
        'site_status',
        'network_mode',
        'address',
        'longitude',
        'latitude',
        'two_g_on_air_date',
        'three_g_on_air_date',
        'four_g_on_air_date',
        'urban_rural',
        'priority',
        'status',
    ];

    public static function getAllBts()
    {
        return Bts::select(
            'dd_house_id',
            'site_id',
            'bts_code',
            'site_type',
            'division',
            'district',
            'thana',
            'site_status',
            'network_mode',
            'address',
            'longitude',
            'latitude',
            'two_g_on_air_date',
            'three_g_on_air_date',
            'four_g_on_air_date',
            'urban_rural',
            'priority')->get()->toArray();
    }

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'site_id', 'like', $term )
                ->orWhere( 'bts_code', 'like', $term )
                ->orWhere( 'site_type', 'like', $term )
                ->orWhere( 'division', 'like', $term )
                ->orWhere( 'district', 'like', $term )
                ->orWhere( 'thana', 'like', $term )
                ->orWhere( 'site_status', 'like', $term )
                ->orWhere( 'network_mode', 'like', $term )
                ->orWhere( 'address', 'like', $term )
                ->orWhere( 'longitude', 'like', $term )
                ->orWhere( 'latitude', 'like', $term )
                ->orWhere( 'urban_rural', 'like', $term )
                ->orWhere( 'priority', 'like', $term )
                ->orWhereHas('ddHouse', function ( $query ) use ( $term ){
                    $query->where( 'code', 'like', $term );
                });
        });
    }

    //_______________________________________Accessor_________________________________________________________
    // Dd House
    protected function ddHouseId(): Attribute
    {
        return Attribute::make(
            get: fn( $id ) => DdHouse::firstWhere('id', $id)->code,
            set: fn( $code ) => DdHouse::firstWhere('code', $code)->id,
        );
    }
    // 2G On Air Date
    protected function twoGOnAirDate(): Attribute
    {
        return Attribute::make(
            set: fn( $date ) => empty( $date ) ? null : Date::excelToDateTimeObject(intval($date))->format('Y-m-d'),
        );
    }
    // 3G On Air Date
    protected function threeGOnAirDate(): Attribute
    {
        return Attribute::make(
            set: fn( $date ) => empty( $date ) ? null : Date::excelToDateTimeObject(intval($date))->format('Y-m-d'),
        );
    }
    // 4G On Air Date
    protected function fourGOnAirDate(): Attribute
    {
        return Attribute::make(
            set: fn( $date ) => empty( $date ) ? null : Date::excelToDateTimeObject(intval($date))->format('Y-m-d'),
        );
    }
    //_______________________________________End Accessor_____________________________________________________


    //_______________________________________Mutator_________________________________________________________



    //_______________________________________End Mutator_____________________________________________________

    // Relationship
    public function ddHouse(): BelongsTo
    {
        return $this->belongsTo( DdHouse::class );
    }
}
