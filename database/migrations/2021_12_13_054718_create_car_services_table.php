<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('user_id');
            $table->date('date');
            $table->decimal('odometer',12,3);
            $table->text('completed');
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
        Schema::dropIfExists('car_services');
    }
}
