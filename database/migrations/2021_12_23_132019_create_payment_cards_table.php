<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->id();
            $table->string('cardholder_name',30);
            $table->string('billing_address',30);
            $table->string('email',30);
            $table->string('city',30);
            $table->string('zipcode');
            $table->string('card_number',16);
            $table->string('exp_month',2);
            $table->string('cvc',5);
            $table->string('exp_year',4);
            $table->string('customer_id',30);
            $table->string('card_id',30);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
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
        Schema::dropIfExists('payment_cards');
    }
}
