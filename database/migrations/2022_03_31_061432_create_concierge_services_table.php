<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConciergeServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concierge_services', function (Blueprint $table) {
            $table->id('conc_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('trip_begin')->nullable();
            $table->string('trip_end')->nullable();
            $table->text('trip_details')->nullable();
            $table->string('client')->nullable();
            $table->string('incident_condition')->nullable();
            $table->string('notesdata')->nullable();
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
        Schema::dropIfExists('concierge_services');
    }
}
