<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricationWeldingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabrication_weldings', function (Blueprint $table) {
            $table->id('fabrication_welding');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
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
        Schema::dropIfExists('fabrication_weldings');
    }
}
