<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialtyOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialty_others', function (Blueprint $table) {
            $table->id('specialty_other_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('list_of_specialty')->nullable();
            $table->string('detail_of_services')->nullable();
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
        Schema::dropIfExists('specialty_others');
    }
}
