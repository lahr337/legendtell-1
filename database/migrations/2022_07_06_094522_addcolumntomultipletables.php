<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addcolumntomultipletables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table_arr = ['ac_services','battery_services','break_services','car_wash_services','ceramic_coatings','collision_repairs','concierge_services'
        ,'custom_build_bodies','dealer_ships','detailing_corrections','electric_controls','engine_block_services','exhaust_services','fabrication_weldings',
        'frame_alignments','fuel_systems','glass_services','lubrications','mechanicals','nitrouses','oil_services','paintless_dent_repairs','paint_bodies',
        'paint_protection_films','parts','performance_dyno_tunings','powder_coatings','race_tracks','rim_repairs','specialty_others','suspensions','tint_services',
        'tires','transmissions','vinyls'
    ];
        foreach ($table_arr as $tableName) {
            Schema::table("$tableName", function (Blueprint $table) {
                 $table->string('car_issue_id')->nullable()->after('car_id');
            });
       }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */ 
    public function down()
    {
        //
    }
}
