<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_appraisals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('color')->nullable();
            $table->string('engine')->nullable();
            $table->string('mileage')->nullable();
            $table->date('appraisal_date')->nullable();
            $table->string('appraiser')->nullable();
            $table->string('market_value')->nullable();
            $table->string('appraisal_value')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
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
        Schema::dropIfExists('car_appraisals');
    }
}
