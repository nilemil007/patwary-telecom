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
        Schema::create('retailers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dd_house_id')->constrained();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('rso_id')->constrained();
            $table->foreignId('bts_id')->nullable()->constrained();
            $table->foreignId('route_id')->constrained();
            $table->string('retailer_code')->nullable()->unique();
            $table->string('shop_name')->nullable();
            $table->string('tmp_shop_name')->nullable();
            $table->string('retailer_type')->nullable();
            $table->string('enabled')->nullable();
            $table->string('sim_seller')->nullable();
            $table->string('itop_number')->nullable()->unique();
            $table->string('service_point')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('tmp_owner_name')->nullable();
            $table->string('contact_no')->nullable()->unique();
            $table->string('tmp_contact_no')->nullable()->unique();
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->string('tmp_thana')->nullable();
            $table->string('address')->nullable();
            $table->string('tmp_address')->nullable();
            $table->string('nid')->nullable()->unique();
            $table->string('tmp_nid')->nullable()->unique();
            $table->string('trade_license_no')->nullable();
            $table->string('tmp_trade_license_no')->nullable();
            $table->string('image')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('retailers');
    }
};
