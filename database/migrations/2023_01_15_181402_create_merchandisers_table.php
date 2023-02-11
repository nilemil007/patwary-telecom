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
        Schema::create('merchandisers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('pool_number', 11)->nullable()->unique();
            $table->string('personal_number', 11)->nullable()->unique();
            $table->string('tmp_personal_number', 11)->nullable()->unique();
            $table->string('father_name', 50)->nullable();
            $table->string('tmp_father_name', 50)->nullable();
            $table->string('mother_name', 50)->nullable();
            $table->string('tmp_mother_name', 50)->nullable();
            $table->enum('blood_group', ['a+','ab+','a-','ab-','b+','b-','o+','o-']);
            $table->enum('tmp_blood_group', ['a+','ab+','a-','ab-','b+','b-','o+','o-']);
            $table->string('bank_name', 50)->nullable();
            $table->string('account_number', 20)->nullable()->unique();
            $table->string('tmp_account_number', 20)->nullable()->unique();
            $table->string('salary', 6)->nullable();
            $table->string('division', 20)->nullable();
            $table->string('district', 20)->nullable();
            $table->string('thana', 20)->nullable();
            $table->longText('address')->nullable();
            $table->longText('tmp_address')->nullable();
            $table->string('nid')->nullable()->unique();
            $table->string('tmp_nid')->nullable()->unique();
            $table->string('working_area')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('merchandisers');
    }
};
