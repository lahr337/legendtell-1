<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectricControlsTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electric_controls', function (Blueprint $table) {
            $table->id('electric_controls_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('system')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('action')->nullable();
            $table->string('manufacturer_by')->nullable();
            $table->string('is_waranty')->nullable();
            $table->string('waranty_company')->nullable();
            $table->text('electric_notes')->nullable();
            $table->text('documents')->nullable();
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
        Schema::dropIfExists('electric_controls');
    }
}
