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
        Schema::create('others_operator_information', function (Blueprint $table) {
            $table->id();
            $table->string('cluster')->default('Central');
            $table->string('region')->default('Region');
            $table->string('dd_code');
            $table->string('retailer_code');
            $table->string('rso_number');
            $table->string('retailer_number');
            $table->string('bl_tarshiary')->nullable();
            $table->string('gp_tarshiary')->nullable();
            $table->string('robi_tarshiary')->nullable();
            $table->string('airtel_tarshiary')->nullable();
            $table->string('bl_ga')->nullable();
            $table->string('gp_ga')->nullable();
            $table->string('robi_ga')->nullable();
            $table->string('airtel_ga')->nullable();
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
        Schema::dropIfExists('others_operator_information');
    }
};
