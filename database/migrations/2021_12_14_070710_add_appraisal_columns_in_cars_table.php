<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppraisalColumnsInCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('color')->nullable()->comment('appraisal color')->change();
            $table->string('engine')->nullable()->comment('appraisal engine')->change();
            $table->string('mileage')->nullable()->comment('appraisal mileage')->after('color');
            $table->date('appraisal_date')->nullable()->comment('appraisal date')->after('color');
            $table->string('appraiser')->nullable()->comment('appraisal appraiser')->after('color');
            $table->string('market_value')->nullable()->comment('appraisal market value')->after('color');
            $table->string('appraisal_value')->nullable()->comment('appraisal value')->after('color');
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
            $table->dropColumn(['mileage','appraisal_date','appraiser','market_value','appraisal_value']);
        });
    }
}
