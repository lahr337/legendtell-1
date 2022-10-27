<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceDynoTuningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_dyno_tunings', function (Blueprint $table) {
            $table->id('performance_dyno_tuning_id');
            $table->unsignedBigInteger('user_id');
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->text('engine_services')->nullable();
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
        Schema::dropIfExists('performance_dyno_tunings');
    }
}
