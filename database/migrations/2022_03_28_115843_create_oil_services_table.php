<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOilServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oil_services', function (Blueprint $table) {
            $table->id('oil_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('oil_mileage')->nullable();
            $table->string('oil_type')->nullable();
            $table->string('oil_brand')->nullable();
            $table->string('oil_amount_added')->nullable();
            $table->string('oil_filter_type')->nullable();
            $table->string('oil_filter_brand')->nullable();
            $table->string('oil_fluid_service')->nullable();
            $table->string('oil_pan_removed')->nullable();
            $table->string('oil_pan_gaskit')->nullable();
            $table->string('oil_pan_nut')->nullable();
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
        Schema::dropIfExists('oil_services');
    }
}
