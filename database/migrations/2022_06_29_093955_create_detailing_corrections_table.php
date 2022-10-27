<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailingCorrectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailing_corrections', function (Blueprint $table) {
            $table->id('detailing_correction_id');
            $table->unsignedBigInteger('user_id');
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('service_type')->nullable();
            $table->text('correction')->nullable();
            $table->text('cleaning_mobile')->nullable();
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
        Schema::dropIfExists('detailing_corrections');
    }
}
