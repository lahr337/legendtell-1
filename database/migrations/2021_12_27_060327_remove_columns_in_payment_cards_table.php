<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsInPaymentCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_cards', function (Blueprint $table) {
            $table->dropColumn([
                'cardholder_name',
                'billing_address',
                'email',
                'city',
                'zipcode',
                'exp_month',
                'cvc',
                'exp_year',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_cards', function (Blueprint $table) {
            $table->string('cardholder_name',30);
            $table->string('billing_address',30);
            $table->string('email',30);
            $table->string('city',30);
            $table->string('zipcode');
            $table->string('exp_month',2);
            $table->string('cvc',5);
            $table->string('exp_year',4);
        });
    }
}
