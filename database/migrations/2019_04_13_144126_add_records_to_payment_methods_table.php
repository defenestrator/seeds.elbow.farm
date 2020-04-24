<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Shoreline\PaymentMethod;

class AddRecordsToPaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        PaymentMethod::create([
            'name' => 'Cash',
            'active' => true,
            'image' => 'http://i.thecheebashack.com/images/cash.png',
            'notes' => 'Cash or Money Orders by Mail',
            'account' => 'P.O. Box 32583 Milton, FL 32570'
        ]);

        PaymentMethod::create([
            'name' => 'Paypal',
            'active' => true,
            'image' => 'http://i.thecheebashack.com/images/paypal.png',
            'notes' => 'cheeba@thecheebashack.com',
            'account' => 'cheeba@thecheebashack.com'
        ]);

        PaymentMethod::create([
            'name' => 'Square Cash App - https://cash.app',
            'active' => true,
            'image' => 'http://i.thecheebashack.com/images/cash.app.png',
            'notes' => 'CashTag: $Shoreline Genetics',
            'account' => '$Shoreline Genetics'
        ]);

        PaymentMethod::create([
            'name' => 'Credit/Debit',
            'active' => false,
            'image' => 'http://i.thecheebashack.com/images/visa.png',
            'notes' => 'Secure, Token-based Credit and Debit',
            'account' => config('app.stripe_secret')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            //
        });
    }
}
