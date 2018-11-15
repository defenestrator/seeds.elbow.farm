<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAddressFieldsToTesters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testers', function (Blueprint $table) {
            $table->string('postcode')->default('00000-0000')->after('id');
            $table->string('country')->default('Void')->after('id');
            $table->string('state')->default('XX')->after('id');
            $table->string('city')->default('Not a Place')->after('id');
            $table->string('address_2')->default('Suite 0')->after('id');
            $table->string('address_1')->default('1234 No Such place')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
