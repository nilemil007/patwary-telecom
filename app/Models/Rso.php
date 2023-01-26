<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static create(string $string, $id)
 * @method static insert(array $array)
 * @method static firstWhere(string $string, $rsoItop)
 * @method static find()
 * @method static findOrFail()
 */
class Rso extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supervisor_id',
        'code',
        'itop_number',
        'pool_number',
        'personal_number',
        'tmp_personal_number',
        'rid',
        'father_name',
        'tmp_father_name',
        'mother_name',
        'tmp_mother_name',
        'division',
        'district',
        'thana',
        'address',
        'tmp_address',
        'blood_group',
        'tmp_blood_group',
        'sr_no',
        'account_number',
        'tmp_account_number',
        'bank_name',
        'tmp_bank_name',
        'routing_number',
        'tmp_routing_number',
        'market_type',
        'salary',
        'education',
        'tmp_education',
        'marital_status',
        'tmp_marital_status',
        'gender',
        'dob',
        'tmp_dob',
        'nid',
        'tmp_nid',
        'status',
        'remarks',
        'documents',
        'joining_date',
        'resigning_date',
    ];

    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'code', 'like', $term )
                ->orWhere( 'itop_number', 'like', $term )
                ->orWhere( 'pool_number', 'like', $term )
                ->orWhere( 'personal_number', 'like', $term )
                ->orWhere( 'rid', 'like', $term )
                ->orWhere( 'father_name', 'like', $term )
                ->orWhere( 'mother_name', 'like', $term )
                ->orWhere( 'division', 'like', $term )
                ->orWhere( 'district', 'like', $term )
                ->orWhere( 'thana', 'like', $term )
                ->orWhere( 'address', 'like', $term )
                ->orWhere( 'blood_group', 'like', $term )
                ->orWhere( 'sr_no', 'like', $term )
                ->orWhere( 'account_number', 'like', $term )
                ->orWhere( 'bank_name', 'like', $term )
                ->orWhere( 'routing_number', 'like', $term )
                ->orWhere( 'market_type', 'like', $term )
                ->orWhere( 'salary', 'like', $term )
                ->orWhere( 'education', 'like', $term )
                ->orWhere( 'marital_status', 'like', $term )
                ->orWhere( 'gender', 'like', $term )
                ->orWhere( 'nid', 'like', $term )
                ->orWhere( 'remarks', 'like', $term )
                ->orWhere( 'status', 'like', $term )
                ->orWhereHas('user', function ( $query ) use ( $term ){
                    $query->where( 'name', 'like', $term );
                })
                ->orWhereHas('supervisor', function ( $query ) use ( $term ){
                    $query->where( 'name', 'like', $term );
            });
        });
    }


    // Relationship
    public function retailer(): HasMany
    {
        return $this->hasMany( Retailer::class );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }

    public function supervisor(): BelongsTo
    {
        return $this->belongsTo( Supervisor::class );
    }
}
