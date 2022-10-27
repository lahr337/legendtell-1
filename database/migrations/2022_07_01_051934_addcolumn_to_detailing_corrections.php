<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumnToDetailingCorrections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detailing_corrections', function (Blueprint $table) {
            $table->longText('vehicle_data')->nullable()->after('cleaning_mobile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detailing_corrections', function (Blueprint $table) {
            //
        });
    }
}
