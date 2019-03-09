<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('image')->default('http://heisenbeans.com/images/heisenhead.png');
            $table->boolean('active')->default(false);
        });

        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('payment_method_id');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->integer('total');
            $table->softDeletesTz();
            $table->timestamps();
        });

        Schema::create('invoice_seed_packs', function (Blueprint $table){
                $table->unsignedInteger('invoice_id');
                $table->foreign('invoice_id')->references('id')->on('invoices');
                $table->unsignedInteger('seed_pack_id');
                $table->foreign('seed_pack_id')->references('id')->on('seed_packs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
