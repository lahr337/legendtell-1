<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTintServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tint_services', function (Blueprint $table) {
            $table->id('tint_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('tintservices')->nullable();
            $table->string('tint_manufacture')->nullable();
            $table->string('tint_type')->nullable();
            $table->string('tint_oem_match')->nullable();
            $table->string('oem_manufacture')->nullable();
            $table->string('tint_warranty')->nullable();
            $table->string('warranty_company')->nullable();
            $table->text('tint_notes')->nullable();
            $table->text('document')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('tint_services');
    }
}
