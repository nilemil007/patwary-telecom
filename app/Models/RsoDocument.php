<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class RsoDocument extends Model
{
    use HasFactory;

    protected $fillable = ['rso_id','document'];
}
