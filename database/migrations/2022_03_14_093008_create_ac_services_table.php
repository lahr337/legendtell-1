<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ac_services', function (Blueprint $table) {
            $table->id('ac_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('condensor')->nullable();
            $table->string('compressor')->nullable();
            $table->string('evaporator_core')->nullable();
            $table->string('receiver_dryer')->nullable();
            $table->string('ac_line')->nullable();
            $table->string('office_tube')->nullable();
            $table->string('pressure_switches')->nullable();
            $table->string('expansion_valve')->nullable();
            $table->string('seals')->nullable();
            $table->string('static_pressure_low')->nullable();
            $table->string('static_pressure_high')->nullable();
            $table->string('dynamic_pressure_low')->nullable();
            $table->string('dynamic_pressure_high')->nullable();
            $table->text('ac_notes')->nullable();
            $table->text('documents')->nullable();
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
        Schema::dropIfExists('ac_services');
    }
}
