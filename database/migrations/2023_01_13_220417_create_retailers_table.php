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
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('rso_id')->constrained();
            $table->foreignId('supervisor_id')->constrained();
            $table->foreignId('bts_id')->nullable()->constrained();
            $table->foreignId('route_id')->nullable()->constrained();
            $table->integer('manager_id')->nullable();
            $table->integer('zm_id')->nullable();
            $table->string('retailer_code')->nullable()->unique();
            $table->string('retailer_name')->nullable();
            $table->string('tmp_retailer_name')->nullable();
            $table->string('retailer_type')->nullable();
            $table->string('tmp_retailer_type')->nullable();
            $table->string('enabled')->nullable();
            $table->string('sim_seller')->nullable();
            $table->string('tmp_sim_seller')->nullable();
            $table->string('itop_number')->nullable()->unique();
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
            $table->string('trade_license_no')->nullable();
            $table->string('tmp_trade_license_no')->nullable();
            $table->json('others_operator')->nullable();
            $table->json('tmp_others_operator')->nullable();
            $table->decimal('longitude', 10, 6)->nullable();
            $table->decimal('latitude', 10, 6)->nullable();
            $table->string('tmp_latitude')->nullable();
            $table->string('tmp_longitude')->nullable();
            $table->string('device_name')->nullable();
            $table->string('tmp_device_name')->nullable();
            $table->string('device')->nullable()->unique();
            $table->string('tmp_device')->nullable();
            $table->string('scanner')->nullable()->unique();
            $table->string('tmp_scanner')->nullable();
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
