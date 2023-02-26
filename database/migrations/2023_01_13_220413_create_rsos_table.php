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
        Schema::create('rsos',
            function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('supervisor_id')->nullable()->constrained();
            $table->foreignUuid('dd_house_id')->constrained();
            $table->json('routes')->nullable();
            $table->string('code', 10)->nullable()->unique();
            $table->string('itop_number', 11)->nullable()->unique();
            $table->string('pool_number', 11)->nullable()->unique();
            $table->string('personal_number', 11)->nullable()->unique();
            $table->string('tmp_personal_number', 11)->nullable();
            $table->string('rid', 10)->nullable()->unique();
            $table->string('father_name', 50)->nullable();
            $table->string('tmp_father_name', 50)->nullable();
            $table->string('mother_name', 50)->nullable();
            $table->string('tmp_mother_name', 50)->nullable();
            $table->string('division', 20)->nullable();
            $table->string('district', 20)->nullable();
            $table->string('thana', 20)->nullable();
            $table->longText('address')->nullable();
            $table->longText('tmp_address')->nullable();
            $table->enum('blood_group', ['a+','ab+','a-','ab-','b+','b-','o+','o-'])->nullable();
            $table->string('tmp_blood_group')->nullable();
            $table->string('sr_no', 5)->nullable()->unique();
            $table->string('account_number', 20)->nullable()->unique();
            $table->string('tmp_account_number', 20)->nullable();
            $table->string('bank_name')->nullable();
            $table->string('tmp_bank_name')->nullable();
            $table->string('brunch_name')->nullable();
            $table->string('tmp_brunch_name')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('tmp_routing_number')->nullable();
            $table->string('market_type')->nullable();
            $table->string('salary')->nullable();
            $table->string('education')->nullable();
            $table->string('tmp_education')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('tmp_marital_status')->nullable();
            $table->string('gender')->nullable();
            $table->timestamp('dob')->nullable();
            $table->timestamp('tmp_dob')->nullable();
            $table->string('nid')->nullable()->unique();
            $table->string('tmp_nid')->nullable()->unique();
            $table->string('status')->nullable();
            $table->string('document')->nullable();
            $table->timestamp('joining_date')->nullable();
            $table->timestamp('resigning_date')->nullable();
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
        Schema::dropIfExists('rsos');
    }
};
