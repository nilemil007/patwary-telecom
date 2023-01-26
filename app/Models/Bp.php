<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Bp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pool_phone_number',
        'personal_number',
        'gender',
        'blood_group',
        'education',
        'father_name',
        'mother_name',
        'division',
        'district',
        'thana',
        'address',
        'nid',
        'bank_name',
        'brunch_name',
        'account_number',
        'dob',
        'joining_date',
        'resigning_date',
        'status',
    ];
}
