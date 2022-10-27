<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopInsertApparisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_insert_apparisals', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('app_id')->nullable();
            $table->string('apparisal_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('app_rating')->nullable();
            $table->text('notes')->nullable();
            $table->text('documents')->nullable();
            $table->text('vehicle_history')->nullable();
            $table->text('known_issues')->nullable();
            $table->text('repair_suggestion')->nullable();
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
        Schema::dropIfExists('shop_insert_apparisals');
    }
}
