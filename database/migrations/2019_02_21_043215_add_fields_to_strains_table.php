<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToStrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strains', function (Blueprint $table) {
            $table->boolean('published')->after('retail_price')->default(false);
            $table->integer('inventory')->after('retail_price')->default(0);
            $table->integer('qty_per_pack')->after('retail_price')->default(12);

        });
        Schema::table('strains', function (Blueprint $table) {
            $table->dropColumn('feminized');
        });
        Schema::table('strains', function (Blueprint $table) {
            $table->boolean('feminized')->after('retail_price')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('strains', function (Blueprint $table) {
            //
        });
    }
}
