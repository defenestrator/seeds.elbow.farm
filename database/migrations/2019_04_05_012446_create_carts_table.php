<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('cart_seed_pack', function (Blueprint $table){
            $table->unsignedInteger('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts');
            $table->unsignedInteger('seed_pack_id');
            $table->foreign('seed_pack_id')->references('id')->on('seed_packs');
            $table->unsignedInteger('quantity');
        });

        Schema::rename('invoice_seed_packs', 'invoice_seed_pack');

        Schema::table('seed_packs', function (Blueprint $table) {
            $table->uuid('uuid')->unique()->after('id');
        });

        Schema::table('invoices', function(Blueprint $table){
            $table->unsignedInteger('shipping')->default(0);
        });

        Schema::table('images', function(Blueprint $table){
            $table->nullableMorphs('imageable');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
