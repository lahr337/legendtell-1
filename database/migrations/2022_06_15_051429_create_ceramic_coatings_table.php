<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeramicCoatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ceramic_coatings', function (Blueprint $table) {
            $table->id('ceramic_coating_id');
            $table->unsignedBigInteger('user_id');
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('coating_manufacturer')->nullable();
            $table->string('coating_type')->nullable();
            $table->string('registered')->nullable();
            $table->string('registered_company')->nullable();
            $table->string('is_waranty')->nullable();
            $table->string('waranty_company')->nullable();
            $table->string('annual_required')->nullable();
            $table->string('annual_completed')->nullable();
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
        Schema::dropIfExists('ceramic_coatings');
    }
}
