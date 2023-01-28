<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static create()
 * @method static insert(string[] $array)
 */
class Merchandiser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pool_number',
        'personal_number',
        'tmp_personal_number',
        'father_name',
        'tmp_father_name',
        'mother_name',
        'tmp_mother_name',
        'blood_group',
        'tmp_blood_group',
        'bank_name',
        'account_number',
        'tmp_account_number',
        'salary',
        'division',
        'district',
        'thana',
        'address',
        'tmp_address',
        'nid',
        'tmp_nid',
        'working_area',
        'documents',
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

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo( User::class );
    }
}
