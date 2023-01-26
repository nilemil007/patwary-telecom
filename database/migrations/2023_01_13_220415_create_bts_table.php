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
        Schema::create('bts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dd_house_id')->constrained();
            $table->string('site_id')->nullable()->unique();
            $table->string('bts_code')->nullable()->unique();
            $table->string('site_type')->nullable();
            $table->string('division')->nullable();
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->string('site_status')->nullable();
            $table->string('network_mode')->nullable();
            $table->string('address')->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->timestamp('two_g_on_air_date')->nullable();
            $table->timestamp('three_g_on_air_date')->nullable();
            $table->timestamp('four_g_on_air_date')->nullable();
            $table->string('urban_rural')->nullable();
            $table->string('priority')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('bts');
    }
};
