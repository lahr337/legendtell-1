<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_tracks', function (Blueprint $table) {
            $table->id("race_track_id");
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('track_name')->nullable();
            $table->string('location')->nullable();
            $table->string('track_type')->nullable();
            $table->string('zero_to_sixty_mph')->nullable();
            $table->string('lap_one')->nullable();
            $table->string('lap_two')->nullable();
            $table->string('lap_three')->nullable();
            $table->string('lap_four')->nullable();
            $table->text('run_one')->nullable();
            $table->text('run_two')->nullable();
            $table->text('run_three')->nullable();
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
        Schema::dropIfExists('race_tracks');
    }
}
