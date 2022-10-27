<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuspensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspensions', function (Blueprint $table) {
            $table->id('suspension_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('frame_bracket_mounts')->nullable();
            $table->string('hanger_connection')->nullable();
            $table->string('arm_bushing')->nullable();
            $table->string('axles')->nullable();
            $table->string('axle_bushing_bolts')->nullable();
            $table->string('hub_bearings')->nullable();
            $table->string('king_pin_play')->nullable();
            $table->string('tie_roads_and_castle_nuts')->nullable();
            $table->string('alignment')->nullable();
            $table->string('shocks')->nullable();
            $table->string('air_bags')->nullable();
            $table->string('air_compressor')->nullable();
            $table->string('air_bag')->nullable();
            $table->string('air_manifold')->nullable();
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
        Schema::dropIfExists('suspensions');
    }
}
