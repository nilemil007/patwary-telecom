<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class BpDocument extends Model
{
    use HasFactory;

    protected $fillable = ['bp_id','document'];
}
