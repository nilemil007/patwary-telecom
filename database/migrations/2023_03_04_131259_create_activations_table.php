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
        Schema::create('activations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dd_house_id');
            $table->foreignUuid('supervisor_id');
            $table->foreignUuid('rso_id');
            $table->foreignUuid('retailer_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('sim_serial');
            $table->string('msisdn');
            $table->string('selling_price');
            $table->date('activation_date');
            $table->date('bio_date');
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
        Schema::dropIfExists('activations');
    }
};
