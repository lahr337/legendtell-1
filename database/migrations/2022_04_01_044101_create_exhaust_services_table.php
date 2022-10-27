<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExhaustServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exhaust_services', function (Blueprint $table) {
            $table->id('exhaust_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('exhaust_manifold')->nullable();
            $table->string('exhaust_resonator')->nullable();
            $table->string('exhaust_muffler')->nullable();
            $table->string('exhaust_pipes')->nullable();
            $table->string('exhaust_isolators')->nullable();
            $table->string('exhaust_o2sensor')->nullable();
            $table->string('exhasut_notes')->nullable();
           
            $table->text('document')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('exhaust_services');
    }
}
