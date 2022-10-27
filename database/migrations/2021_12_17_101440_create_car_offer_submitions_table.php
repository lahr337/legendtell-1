<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarOfferSubmitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_offer_submitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id')->nullable()->comment('user id of submiter');
            $table->unsignedBigInteger('car_id')->nullable();
            $table->integer('offer_amount')->nullable();
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('car_offer_submitions');
    }
}
