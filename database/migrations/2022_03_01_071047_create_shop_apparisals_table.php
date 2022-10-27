<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopApparisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_apparisals', function (Blueprint $table) {
            $table->id();
            $table->string('apparisal_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('apparisal_type')->comment('1 futureRequest  2 appraisalaccount')->nullable();
            $table->string('apperisal_date')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('approved_date')->nullable();
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
        Schema::dropIfExists('shop_apparisals');
    }
}
