<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('supervisor_id')->nullable()->constrained();
            $table->string('stuff_id', 10)->nullable()->unique();
            $table->string('pool_number', 11)->nullable()->unique();
            $table->string('personal_number', 11)->nullable()->unique();
            $table->string('tmp_personal_number', 11)->nullable()->unique();
            $table->enum('gender', ['male','female','others'])->nullable();
            $table->enum('blood_group', ['a+','ab+','a-','ab-','b+','b-','o+','o-']);
            $table->enum('tmp_blood_group', ['a+','ab+','a-','ab-','b+','b-','o+','o-']);
            $table->string('education')->nullable();
            $table->string('tmp_education')->nullable();
            $table->string('father_name', 50)->nullable();
            $table->string('tmp_father_name', 50)->nullable();
            $table->string('mother_name', 50)->nullable();
            $table->string('tmp_mother_name', 50)->nullable();
            $table->string('division', 20)->nullable();
            $table->string('tmp_division', 20)->nullable();
            $table->string('district', 20)->nullable();
            $table->string('tmp_district', 20)->nullable();
            $table->string('thana', 20)->nullable();
            $table->string('tmp_thana', 20)->nullable();
            $table->longText('address')->nullable();
            $table->longText('tmp_address')->nullable();
            $table->string('nid')->nullable()->unique();
            $table->string('tmp_nid')->nullable()->unique();
            $table->string('bank_name')->nullable();
            $table->string('tmp_bank_name')->nullable();
            $table->string('brunch_name')->nullable();
            $table->string('tmp_brunch_name')->nullable();
            $table->string('account_number', 20)->nullable()->unique();
            $table->string('tmp_account_number', 20)->nullable()->unique();
            $table->timestamp('dob')->nullable();
            $table->timestamp('tmp_dob')->nullable();
            $table->timestamp('joining_date')->nullable();
            $table->timestamp('resigning_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bps');
    }
};
