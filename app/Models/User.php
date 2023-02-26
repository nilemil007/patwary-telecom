<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

/**
 * @method static latest()
 * @method static create(array $except)
 * @method static find($id)
 * @method static findOrFail($id)
 * @method static where($column, $value)
 * @method static firstWhere(string $string, int|string|null $id)
 * @method static whereHas(string $string, \Closure $param)
 * @property mixed id
 * @property mixed role
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'dd_house_id',
        'role',
        'email',
        'password',
        'image',
        'status',
    ];

    protected string $uploads = 'storage/users/';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Search
    public function scopeSearch( $query, $term )
    {
        $term = "%$term%";
        $query->where( function ( $query ) use ( $term ){
            $query->where( 'name', 'like', $term )
                ->orWhere( 'username', 'like', $term )
                ->orWhere( 'email', 'like', $term )
                ->orWhere( 'role', 'like', $term )
                ->orWhereHas('ddHouse', function ($query) use ($term){
                    $query->where('name', 'like', $term);
                })
                ->orWhereHas('rso', function ($query) use ($term){
                    $query->where('itop_number', 'like', $term)
                        ->where('code', 'like', $term);
                })
                ->orWhereHas('supervisor', function ($query) use ($term){
                    $query->where('pool_number', 'like', $term);
                });
        });
    }

    protected function ddHouseId(): Attribute
    {
        return Attribute::make(
            set: fn ( $ddCode ) => DdHouse::firstWhere('code', $ddCode)->id,
        );
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ( $value ) => Hash::make( $value )
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => empty( $image ) ? asset('default_user_avatar.svg') : $this->uploads . $image
        );
    }

    // Relationship
    public function itopReplace(): HasMany
    {
        return $this->hasMany( ItopReplace::class );
    }

    public function supervisor(): HasOne
    {
        return $this->hasOne( Supervisor::class );
    }

    public function rso(): HasOne
    {
        return $this->hasOne( Rso::class );
    }

    public function merchandiser(): HasOne
    {
        return $this->hasOne( Merchandiser::class );
    }

    public function retailer(): HasOne
    {
        return $this->hasOne( Retailer::class );
    }

    public function bp(): HasOne
    {
        return $this->hasOne( Bp::class );
    }

    public function ddHouse(): BelongsTo
    {
        return $this->belongsTo( DdHouse::class );
    }

}
