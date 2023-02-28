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
            $table->uuid('id')->primary();
//            $table->foreignUuid('dd_house_id')->constrained();
            $table->string('dd_code');
            $table->foreignUuid('user_id')->nullable()->constrained();
            $table->foreignUuid('bts_id')->nullable()->constrained();
            $table->foreignUuid('route_id')->nullable()->constrained();
//            $table->foreignUuid('rso_id')->constrained();
            $table->string('rso_number');
            $table->foreignUuid('supervisor_id')->nullable()->constrained();
            $table->string('retailer_code')->unique();
            $table->string('retailer_name')->nullable();
            $table->string('tmp_retailer_name')->nullable();
            $table->string('retailer_type')->nullable();
            $table->string('tmp_retailer_type')->nullable();
            $table->string('enabled')->nullable();
            $table->string('sim_seller')->nullable();
            $table->string('tmp_sim_seller')->nullable();
            $table->string('itop_number')->unique();
            $table->string('service_point')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('tmp_owner_name')->nullable();
            $table->string('contact_no')->nullable()->unique();
            $table->string('tmp_contact_no')->nullable();
            $table->string('own_shop')->nullable();
            $table->string('district')->nullable();
            $table->string('thana')->nullable();
            $table->string('tmp_thana')->nullable();
            $table->string('address')->nullable();
            $table->string('tmp_address')->nullable();
            $table->string('nid')->nullable()->unique();
            $table->string('tmp_nid')->nullable();
            $table->string('trade_license_no')->nullable()->unique();
            $table->string('tmp_trade_license_no')->nullable();
            $table->json('others_operator')->nullable();
            $table->json('tmp_others_operator')->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->string('tmp_longitude')->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->string('tmp_latitude')->nullable();
            $table->string('device_name')->nullable();
            $table->string('tmp_device_name')->nullable();
            $table->string('device_sn')->nullable()->unique();
            $table->string('tmp_device_sn')->nullable();
            $table->string('scanner_sn')->nullable()->unique();
            $table->string('tmp_scanner_sn')->nullable();
            $table->string('document')->nullable();
            $table->string('password')->nullable();
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
