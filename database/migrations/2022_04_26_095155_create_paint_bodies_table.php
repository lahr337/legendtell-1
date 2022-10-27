<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaintBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paint_bodies', function (Blueprint $table) {
            $table->id('paint_body_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('body_panels_repaired_or_replaced')->nullable();
            $table->string('paint_manufacturer')->nullable();
            $table->string('paint_system')->nullable();
            $table->string('paint_code')->nullable();
            $table->string('paint_color')->nullable();
            $table->text('paint_notes')->nullable();
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
        Schema::dropIfExists('paint_bodies');
    }
}
