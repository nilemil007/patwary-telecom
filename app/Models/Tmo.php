<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Tmo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pool_number',
        'personal_number',
        'father_name',
        'mother_name',
        'blood_group',
        'account_number',
        'salary',
        'division',
        'district',
        'thana',
        'address',
        'nid',
        'documents',
        'dob',
        'joining_date',
        'resigning_date',
        'status',
    ];
}
