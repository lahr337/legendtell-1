<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('year',5)->nullable();
            $table->string('make',30)->nullable();
            $table->string('model',30)->nullable();
            $table->string('picture')->nullable();
            $table->string('vin')->nullable();
            $table->string('miles')->nullable();
            $table->string('drive')->nullable();
            $table->string('engine')->nullable();
            $table->string('status')->nullable();
            $table->string('color')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
