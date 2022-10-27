<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });

        Schema::table('car_stickers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->unsignedBigInteger('car_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
        });


        Schema::table('car_conditions', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->unsignedBigInteger('car_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
        });


        Schema::table('car_media', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->unsignedBigInteger('car_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
        });


        Schema::table('car_services', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->unsignedBigInteger('car_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
        });


        Schema::table('car_registrations', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->unsignedBigInteger('car_id')->nullable()->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('CASCADE');
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
            $table->dropForeign(['user_id']);
        });

        Schema::table('car_stickers', function (Blueprint $table) {
            $table->dropForeign(['user_id','car_id']);
        });

        Schema::table('car_conditions', function (Blueprint $table) {
            $table->dropForeign(['user_id','car_id']);
        });

        Schema::table('car_media', function (Blueprint $table) {
            $table->dropForeign(['user_id','car_id']);
        });

        Schema::table('car_services', function (Blueprint $table) {
            $table->dropForeign(['user_id','car_id']);
        });

        Schema::table('car_registrations', function (Blueprint $table) {
            $table->dropForeign(['user_id','car_id']);
        });

    }
}
