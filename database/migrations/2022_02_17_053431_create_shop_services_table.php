<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_services', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('service_name')->nullable();
            $table->string('service_page')->nullable();
            
            $table->string('user_id')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_services');
    }
}
