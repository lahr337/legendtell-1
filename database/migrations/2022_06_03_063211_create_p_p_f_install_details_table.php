<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePPFInstallDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_p_f_install_details', function (Blueprint $table) {
            $table->id('p_p_f_install_detail_id');
            $table->unsignedBigInteger('paint_protection_films_id');
            $table->unsignedBigInteger('user_id');
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('type')->nullable();
            $table->string('hood')->nullable();
            $table->string('front')->nullable();
            $table->string('rear')->nullable();
            $table->string('roof')->nullable();
            $table->string('trunk')->nullable();
            $table->string('hatch')->nullable();
            $table->string('front_bumper')->nullable();
            $table->string('rear_bumper')->nullable();
            $table->string('wrap_brand')->nullable();
            $table->string('wrap_color')->nullable();
            $table->string('is_waranty')->nullable();
            $table->string('waranty_company')->nullable();
            $table->string('driver_front_quarter_panel')->nullable();
            $table->string('driver_rear_quarter_panel')->nullable();
            $table->string('driver_front_door')->nullable();
            $table->string('driver_rear_door')->nullable();
            $table->string('driver_a_piller')->nullable();
            $table->string('driver_b_piller')->nullable();
            $table->string('driver_c_piller')->nullable();
            $table->string('driver_rocker_panel')->nullable();
            $table->string('driver_mirror')->nullable();
            $table->string('pref_driver_window')->nullable();
            $table->string('pass_front_quarter_panel')->nullable();
            $table->string('pass_rear_quarter_panel')->nullable();
            $table->string('passenger_rear_door')->nullable();
            $table->string('passenger_front_door')->nullable();
            $table->string('pass_a_piller')->nullable();
            $table->string('pass_b_piller')->nullable();
            $table->string('pass_c_piller')->nullable();
            $table->string('passenger_rocker_panel')->nullable();
            $table->string('passenger_mirror')->nullable();
            $table->string('pref_passenger_window')->nullable();
            $table->string('pref_back_windshield')->nullable();
            $table->string('tailgate')->nullable();
            $table->text('document')->nullable();
            $table->string('driver_front_section')->nullable();
            $table->string('driver_mid_section')->nullable();
            $table->string('driver_rear_section')->nullable();
            $table->string('passenger_front_section')->nullable();
            $table->string('passenger_mid_section')->nullable();
            $table->string('passenger_rear_section')->nullable();
            $table->string('back_doors')->nullable();
            $table->text('wrap_detail_and_notes_of_project')->nullable();
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
        Schema::dropIfExists('p_p_f_install_details');
    }
}
