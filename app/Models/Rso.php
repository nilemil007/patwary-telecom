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
 * @property mixed user_id
 */
class Rso extends Model
{
    use HasFactory;

    protected $fillable = [
//        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
//$table->foreignId('supervisor_id')->constrained();
//$table->foreignId('manager_id')->nullable()->constrained();
//$table->foreignId('zm_id')->nullable()->constrained();
//$table->foreignId('dd_house_id')->constrained();
//$table->string('code', 10)->nullable()->unique();
//$table->string('itop_number', 11)->nullable()->unique();
//$table->string('pool_number', 11)->nullable()->unique();
//$table->string('personal_number', 11)->nullable()->unique();
//$table->string('tmp_personal_number', 11)->nullable()->unique();
//$table->string('rid', 10)->nullable()->unique();
//$table->string('father_name', 50)->nullable();
//$table->string('tmp_father_name', 50)->nullable();
//$table->string('mother_name', 50)->nullable();
//$table->string('tmp_mother_name', 50)->nullable();
//$table->string('division', 20)->nullable();
//$table->string('district', 20)->nullable();
//$table->string('thana', 20)->nullable();
//$table->longText('address')->nullable();
//$table->longText('tmp_address')->nullable();
//$table->enum('blood_group', ['a+','ab+','a-','ab-','b+','b-','o+','o-']);
//$table->string('tmp_blood_group')->nullable();
//$table->string('sr_no', 5)->nullable()->unique();
//$table->string('account_number', 20)->nullable()->unique();
//$table->string('tmp_account_number', 20)->nullable()->unique();
//$table->string('bank_name')->nullable();
//$table->string('tmp_bank_name')->nullable();
//$table->string('brunch_name')->nullable();
//$table->string('tmp_brunch_name')->nullable();
//$table->string('routing_number')->nullable();
//$table->string('tmp_routing_number')->nullable();
//$table->string('market_type')->nullable();
//$table->string('salary')->nullable();
//$table->string('education')->nullable();
//$table->string('tmp_education')->nullable();
//$table->string('marital_status')->nullable();
//$table->string('tmp_marital_status')->nullable();
//$table->string('gender')->nullable();
//$table->timestamp('dob')->nullable();
//$table->timestamp('tmp_dob')->nullable();
//$table->string('nid')->nullable()->unique();
//$table->string('tmp_nid')->nullable()->unique();
//$table->string('status')->nullable();
//$table->string('document')->nullable();
//$table->timestamp('joining_date')->nullable();
//$table->timestamp('resigning_date')->nullable();
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
                ->orWhere( 'status', 'like', $term )
                ->orWhereHas('user', function ( $query ) use ( $term ){
                    $query->where( 'name', 'like', $term );
                })
                ->orWhereHas('supervisor', function ( $query ) use ( $term ){
                    $query->where( 'pool_number', 'like', $term );
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
