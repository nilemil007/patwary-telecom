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
        Schema::create('c2s', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dd_house_id');
            $table->foreignUuid('supervisor_id');
            $table->foreignUuid('rso_id');
            $table->foreignUuid('retailer_id');
            $table->date('date');
            $table->string('amount');
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
        Schema::dropIfExists('c2_s');
    }
};
