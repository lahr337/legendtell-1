<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaintProtectionFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paint_protection_films', function (Blueprint $table) {
            $table->id('paint_protection_film_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('film_manufacturer')->nullable();
            $table->string('film_thickness')->nullable();
            $table->string('registered')->nullable();
            $table->string('registered_company')->nullable();
            $table->string('is_waranty')->nullable();
            $table->string('waranty_company')->nullable();
            $table->string('annual_required')->nullable();
            $table->string('annual_completed')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('paint_protection_films');
    }
}
