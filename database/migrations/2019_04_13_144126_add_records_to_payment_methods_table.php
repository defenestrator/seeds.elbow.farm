<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Heisen\PaymentMethod;

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
            'image' => 'http://i.heisenbeans.com/images/cash.png',
            'notes' => 'Cash or Money Orders by Mail',
            'account' => 'P.O. Box 32583 Milton, FL 32570'
        ]);

        PaymentMethod::create([
            'name' => 'Paypal',
            'active' => true,
            'image' => 'http://i.heisenbeans.com/images/paypal.png',
            'notes' => 'heisen@heisenbeans.com',
            'account' => 'heisen@heisenbeans.com'
        ]);

        PaymentMethod::create([
            'name' => 'Square Cash App - https://cash.app',
            'active' => true,
            'image' => 'http://i.heisenbeans.com/images/cash.app.png',
            'notes' => 'CashTag: $heisenbeans',
            'account' => '$heisenbeans'
        ]);

        PaymentMethod::create([
            'name' => 'Credit/Debit',
            'active' => false,
            'image' => 'http://i.heisenbeans.com/images/visa.png',
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
