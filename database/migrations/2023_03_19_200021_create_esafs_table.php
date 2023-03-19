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
        Schema::create('esafs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dd_house_id');
            $table->foreignUuid('supervisor_id');
            $table->foreignUuid('rso_id');
            $table->foreignUuid('retailer_id');
            $table->string('customer_name');
            $table->string('customer_number');
            $table->string('alternate_number')->nullable();
            $table->string('email')->nullable();
            $table->string('gender');
            $table->string('reason');
            $table->string('address');
            $table->date('date');
            $table->string('status');
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
        Schema::dropIfExists('esafs');
    }
};
