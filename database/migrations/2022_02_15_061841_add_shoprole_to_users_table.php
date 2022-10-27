<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShoproleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('shop_name')->nullable();
            $table->string('shop_photo')->nullable();
            $table->string('shop_latitude')->nullable();
            $table->string( 'shop_longitude')->nullable();
            $table->string('shop_services')->nullable();
            $table->string('role')->comment('1 Admin 2 shop 3 users')->nullable();
            
            $table->boolean('approve')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('shop_name');
            $table->dropColumn('shop_photo');
            $table->dropColumn('shop_latitude');
            $table->dropColumn('shop_longitude');
            $table->dropColumn('shop_services');
            $table->dropColumn('role');
            
            $table->dropColumn('approve');
        });
    }
}
