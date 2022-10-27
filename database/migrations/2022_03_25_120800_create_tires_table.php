<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->id('tire_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('driver_front_psi')->nullable();
            $table->string('driver_front_tread_depth')->nullable();
            $table->string('driver_front_condition')->nullable();
            $table->string('driver_front_brand')->nullable();
            $table->string('driver_front_tire_size')->nullable();
            $table->string('driver_rear_psi')->nullable();
            $table->string('driver_rear_tread_depth')->nullable();
            $table->string('driver_rear_condition')->nullable();
            $table->string('driver_rear_brand')->nullable();
            $table->string('driver_rear_tire_size')->nullable();
            
            $table->string('passenger_front_psi')->nullable();
            $table->string('passenger_front_tread_depth')->nullable();
            $table->string('passenger_front_condition')->nullable();
            $table->string('passenger_front_brand')->nullable();
            $table->string('passenger_front_tire_size')->nullable();

            $table->string('passenger_rear_psi')->nullable();
            $table->string('passenger_rear_tread_depth')->nullable();
            $table->string('passenger_rear_condition')->nullable();
            $table->string('passenger_rear_brand')->nullable();
            $table->string('passenger_rear_tire_size')->nullable();
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
        Schema::dropIfExists('tires');
    }
}
