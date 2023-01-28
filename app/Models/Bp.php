<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create(array $array)
 * @method static where(string $string, string $string1)
 * @method static latest()
 * @method static firstWhere(string $string, int|string|null $id)
 */
class Bp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supervisor_id',
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
        'status',
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
                });
        });
    }

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }
    public function supervisor(): BelongsTo
    {
        return $this->belongsTo( Supervisor::class );
    }
}
