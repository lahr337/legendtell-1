<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarOwnerHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_owner_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('car_id');
            $table->string('owner_type')->nullable();
            $table->string('owner_firstname')->nullable();
            $table->string('owner_lastname')->nullable();
            $table->string('owner_email')->nullable();
            $table->string('owner_address')->nullable();
            $table->string('owner_date')->nullable();
            $table->text('owner_document')->nullable();
            
            $table->string('service_completed')->nullable();
            $table->string('service_done')->nullable();
            $table->string('estimated_length_of_ownership')->nullable();
            $table->string('states_provinces')->nullable();
            $table->string('estimated_miles_per_year')->nullable();
            $table->string('last_reported_odometer_reading')->nullable();
            $table->string('total_loss')->nullable();
            $table->string('structural_damage')->nullable();
            $table->string('airbag_deployment')->nullable();
            $table->string('odometer_check')->nullable();
            $table->string('accident_damage')->nullable();
            $table->string('manufacturer_recall')->nullable();
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
        Schema::dropIfExists('car_owner_histories');
    }
}
