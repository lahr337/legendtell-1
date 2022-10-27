<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreakServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('break_services', function (Blueprint $table) {
            $table->id('break_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('driver_front_break')->nullable();
            $table->string('driver_rear_break')->nullable();
            $table->string('driver_front_rotors')->nullable();
            $table->string('driver_rear_rotors')->nullable();
            $table->string('passenger_front_brakes')->nullable();
            $table->string('passenter_rear_brakes')->nullable();
            $table->string('passenger_front_rotors')->nullable();
            $table->string('passenger_rear_rotors')->nullable();
            $table->string('driver_front_calipers')->nullable();
            $table->string('driver_rear_calipers')->nullable();
            $table->string('passenger_front_calipers')->nullable();
            $table->string('passenger_rear_calipers')->nullable();
            $table->string('brake_hoses')->nullable();
            $table->string('brake_lines')->nullable();
            $table->string('wheel_cylinder')->nullable();
            $table->string('master_cylinder')->nullable();
            $table->string('brake_fluid')->nullable();
           
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
        Schema::dropIfExists('break_services');
    }
}
