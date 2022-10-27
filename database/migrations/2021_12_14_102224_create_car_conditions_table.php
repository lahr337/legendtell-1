<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_conditions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('user_id');
            $table->string('text')->nullable();
            $table->boolean('ok')->nullable();
            $table->boolean('damaged')->nullable();
            $table->string('other')->nullable();
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
        Schema::dropIfExists('car_conditions');
    }
}
