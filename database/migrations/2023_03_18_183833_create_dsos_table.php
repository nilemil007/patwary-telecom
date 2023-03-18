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
        Schema::create('dsos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dd_house_id');
            $table->foreignUuid('supervisor_id');
            $table->foreignUuid('rso_id');
            $table->foreignUuid('retailer_id');
            $table->string('day');
            $table->string('amount');
            $table->string('eligibility');
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
        Schema::dropIfExists('dsos');
    }
};
