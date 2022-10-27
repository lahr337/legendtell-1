<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmissions', function (Blueprint $table) {
            $table->id('transmission_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('service_type')->nullable();
            $table->string('fluid_type')->nullable();
            $table->string('filter_brand')->nullable();
            $table->string('lubrication_pan_gasket_replaced')->nullable();
            $table->string('lubrication_pan_replaced')->nullable();
            $table->string('mileage')->nullable();
            $table->text('transmission_notes')->nullable();
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
        Schema::dropIfExists('transmissions');
    }
}
