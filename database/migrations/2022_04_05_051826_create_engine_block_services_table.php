<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngineBlockServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engine_block_services', function (Blueprint $table) {
            $table->id('engine_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->text('issue_diagnosis')->nullable();
            $table->text('engine_block')->nullable();
            $table->text('engine_services')->nullable();
            $table->text('engine_pistons')->nullable();
            $table->text('engine_rods')->nullable();
            $table->text('engine_crankshaft')->nullable();
            $table->text('engine_main_bearings')->nullable();
            $table->text('engine_rod_bearing')->nullable();
            $table->text('engine_cam_bearing')->nullable();

             $table->string('engine_piston_rings')->nullable();
             $table->string('engine_heads')->nullable();
             $table->string('engine_oil_pan')->nullable();
             $table->string('engine_valves')->nullable();
             $table->string('engine_lifters')->nullable();
             $table->string('engine_exhaust_manifold')->nullable();
             $table->string('engine_intake_manifold')->nullable();
             $table->string('engine_timing')->nullable();

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
        Schema::dropIfExists('engine_block_services');
    }
}
