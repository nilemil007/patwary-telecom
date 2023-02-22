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
        Schema::create('itop_replaces', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->foreignUuid('user_id')->constrained();
            $table->string('itop_number', 11);
            $table->string('tmp_itop_number', 11)->nullable();
            $table->string('serial_number', 18)->nullable()->unique();
            $table->integer('balance')->nullable();
            $table->string('reason');
            $table->text('description')->nullable();
            $table->integer('pay_amount')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->default('pending');
            $table->dateTime('payment_at')->nullable();
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
        Schema::dropIfExists('itop_replaces');
    }
};
