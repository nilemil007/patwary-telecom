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
        Schema::create('sim_issues', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('dd_house_id');
            $table->foreignUuid('supervisor_id');
            $table->foreignUuid('rso_id');
            $table->foreignUuid('retailer_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('selling_price');
            $table->string('sim_serial');
            $table->date('issue_date');
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
        Schema::dropIfExists('sim_issues');
    }
};
