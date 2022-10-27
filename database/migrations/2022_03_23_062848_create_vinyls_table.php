<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinylsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinyls', function (Blueprint $table) {
            $table->id('vinyl_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('type')->nullable();
            $table->string('hood')->nullable();
            $table->string('roof')->nullable();
            $table->string('front')->nullable();
            $table->string('rear')->nullable();
            $table->string('back_door')->nullable();
            $table->string('truck')->nullable();
            $table->string('hatch')->nullable();
            $table->string('front_bumper')->nullable();
            $table->string('rear_bumper')->nullable();
            $table->string('wrap_brand')->nullable();
            $table->string('wrap_color')->nullable();
            $table->string('warranty')->nullable();
            $table->string('warranty_company')->nullable();
            $table->string('driver_front_quarter')->nullable();
            $table->string('driver_rear_quarter')->nullable();
            $table->string('driver_front_door')->nullable();
          
            $table->string('driver_rear_door')->nullable();
            $table->string('driver_a_pilar')->nullable();
            $table->string('driver_b_pilar')->nullable();
            $table->string('driver_c_pilar')->nullable();
            $table->string('driver_rocker_pilar')->nullable();
            $table->string('driver_mirror')->nullable();
            $table->string('pref_driver_window')->nullable();
            $table->string('full_vechile_wrap')->nullable();
            $table->string('pass_front_quarter_panel')->nullable();
            $table->string('pass_rear_quarter_panel')->nullable();
            $table->string('passenger_rear_door')->nullable();
            $table->string('pass_a_pillar')->nullable();

            $table->string('pass_b_pillar')->nullable();
            $table->string('pass_c_pillar')->nullable();
            $table->string('passenger_rocker_panel')->nullable();
            $table->string('passenger_mirror')->nullable();
            $table->string('pref_pass_window')->nullable();
            $table->string('pref_back_windshild')->nullable();
            $table->string('taligate')->nullable();
           
            $table->string('passenger_front_door')->nullable();
            $table->string('vehicle_wrap')->nullable();
            $table->string('full_rv_wrap')->nullable();
            $table->string('full_driver_front_section')->nullable();
            $table->string('full_driver_mid_section')->nullable();
            $table->string('full_driver_rear_section')->nullable();
            $table->string('roof_driver_front_section')->nullable();
            $table->string('roof_driver_mid_section')->nullable();
            $table->string('roof_driver_rear_section')->nullable();
            $table->string('other_service_competed')->nullable();
            $table->string('other_brand_wrap')->nullable();
            $table->string('other_wrap_color')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('vinyls');
    }
}
