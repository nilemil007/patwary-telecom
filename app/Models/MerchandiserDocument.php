<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(string $string)
 * @method static insert(string $string)
 */
class MerchandiserDocument extends Model
{
    use HasFactory;

    protected $fillable = ['merchandiser_id','documents'];
}
