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
        Schema::create('sim_inventories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dd_house_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('lifting_price');
            $table->string('sim_serial');
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
        Schema::dropIfExists('sim_inventories');
    }
};
