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
        Schema::create('dd_houses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->string('cluster_name')->nullable();
            $table->string('region')->nullable();
            $table->string('name');
            $table->string('market_status')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('district')->nullable();
            $table->text('address')->nullable();
            $table->string('proprietor_name')->nullable();
            $table->string('proprietor_number')->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->string('bts_code')->nullable();
            $table->integer('established_year')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('dd_houses');
    }
};
