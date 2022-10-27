<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollisionRepairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collision_repairs', function (Blueprint $table) {
            $table->id('collision_id');
            $table->string('user_id')->nullable();
            $table->string('car_id')->nullable();
            $table->string('service_id')->nullable();
            $table->text('before_image')->nullable();
            $table->text('document_of_estimate')->nullable();
            $table->text('document_of_repair')->nullable();
            $table->text('after_image')->nullable();
            $table->text('collision_notes')->nullable();
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
        Schema::dropIfExists('collision_repairs');
    }
}
