<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SocialLoginToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string( 'fb_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('first_login')->default(1)->comment('1 Admin 2 shop 3 users')->nullable();
           
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
            $table->dropColumn('fb_id');
            $table->dropColumn('google_id');
            $table->dropColumn('first_login');
        });
    }
}
