<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('model_engine_cc', 30)->nullable();
            $table->string('model_engine_cyl', 30)->nullable();
            $table->string('model_engine_type', 30)->nullable();
            $table->text('trims')->nullable();
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
            $table->dropColumn(['model_engine_cc','model_engine_cyl','model_engine_type']);
        });
    }
}
