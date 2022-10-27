<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlassServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glass_services', function (Blueprint $table) {
            $table->id('glass_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->text('windshield')->nullable();
            $table->text('brand')->nullable();
            $table->string('driver_front_window_motor')->nullable();
            $table->string('driver_back_window_motor')->nullable();
            $table->string('passenger_rear_window_motor')->nullable();
            $table->string('back_hatch_window_motor')->nullable();
            $table->string('windshield_replaced')->nullable();
            $table->string('sensor_data')->nullable();
            $table->string('warranty')->nullable();
            $table->string('warranty_company')->nullable();
            $table->string('glass_notes')->nullable();
            $table->text('document')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('glass_services');
    }
}
