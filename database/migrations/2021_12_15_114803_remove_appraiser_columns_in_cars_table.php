<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveAppraiserColumnsInCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn(['color','engine','mileage','appraisal_date','appraiser','market_value','appraisal_value']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('color')->nullable()->comment('appraisal color');
            $table->string('engine')->nullable()->comment('appraisal engine');
            $table->string('mileage')->nullable()->comment('appraisal mileage');
            $table->date('appraisal_date')->nullable()->comment('appraisal date');
            $table->string('appraiser')->nullable()->comment('appraisal appraiser');
            $table->string('market_value')->nullable()->comment('appraisal market value');
            $table->string('appraisal_value')->nullable()->comment('appraisal value');
        });
    }
}
