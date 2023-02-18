<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1)
 * @method static latest()
 * @method static firstWhere(string $string, int|string|null $id)
 * @method static findOrFail()
 * @method static select(string $string, string $string1, string $string2, string $string3, string $string4, string $string5, string $string6, string $string7, string $string8, string $string9, string $string10, string $string11, string $string12, string $string13, string $string14, string $string15, string $string16, string $string17, string $string18, string $string19, string $string20)
 * @property mixed document
 */
class Bp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supervisor_id',
        'dd_house_id',
        'stuff_id',
        'pool_number',
        'personal_number',
        'tmp_personal_number',
        'gender',
        'blood_group',
        'tmp_blood_group',
        'education',
        'tmp_education',
        'father_name',
        'tmp_father_name',
        'mother_name',
        'tmp_mother_name',
        'division',
        'tmp_division',
        'district',
        'tmp_district',
        'thana',
        'tmp_thana',
        'address',
        'tmp_address',
        'nid',
        'tmp_nid',
        'bank_name',
        'tmp_bank_name',
        'brunch_name',
        'tmp_brunch_name',
        'account_number',
        'salary',
        'tmp_account_number',
        'dob',
        'tmp_dob',
        'joining_date',
        'resigning_date',
        'document',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'dob'               => 'datetime',
        'tmp_dob'           => 'datetime',
        'joining_date'      => 'datetime',
        'resigning_date'    => 'datetime',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'stuff_id', 'like', $term )
                ->orWhere( 'pool_number', 'like', $term )
                ->orWhere( 'personal_number', 'like', $term )
                ->orWhere( 'blood_group', 'like', $term )
                ->orWhere( 'education', 'like', $term )
                ->orWhere( 'father_name', 'like', $term )
                ->orWhere( 'mother_name', 'like', $term )
                ->orWhere( 'division', 'like', $term )
                ->orWhere( 'district', 'like', $term )
                ->orWhere( 'thana', 'like', $term )
                ->orWhere( 'address', 'like', $term )
                ->orWhere( 'nid', 'like', $term )
                ->orWhere( 'bank_name', 'like', $term )
                ->orWhere( 'brunch_name', 'like', $term )
                ->orWhere( 'account_number', 'like', $term )
                ->orWhere( 'status', 'like', $term )
                ->orWhereHas('user', function ( $query ) use ( $term ){
                    $query->where( 'name', 'like', $term );
                })
            ->orWhereHas('supervisor', function ( $query ) use ( $term ){
                $query->where( 'pool_number', 'like', $term );
            })
            ->orWhereHas('ddHouse', function ( $query ) use ( $term ){
                $query->where( 'code', 'like', $term );
            });
        });
    }

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }
    public function ddHouse(): BelongsTo
    {
        return $this->belongsTo( DdHouse::class );
    }
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo( Supervisor::class );
    }
}
