<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatteryServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('battery_services', function (Blueprint $table) {
            $table->id('battery_service_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('service_type')->nullable();
            $table->string('battery_type')->nullable();
            $table->string('battery_brand')->nullable();
            $table->string('part_number')->nullable();
            $table->string('manufactured_date')->nullable();
            $table->string('expiration_date')->nullable();
            $table->text('document')->nullable();
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
        Schema::dropIfExists('battery_services');
    }
}
