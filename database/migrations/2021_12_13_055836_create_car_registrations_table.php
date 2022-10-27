<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('user_id');
            $table->string('has_closest_odometer')->nullable();
            $table->decimal('odometer',12,3)->nullable();
            $table->string('oil_change')->nullable();
            $table->date('oildate')->nullable();
            $table->string('tire_rotation')->nullable();
            $table->date('tiredate')->nullable();
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
        Schema::dropIfExists('car_registrations');
    }
}
