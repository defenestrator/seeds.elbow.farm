<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strains', function (Blueprint $table) {
            $table->longText('description')->default('Fancy Birdseed')->change();
            $table->text('genetics')->default('Unidentified bagseed')->change();
        });
        Schema::table('breeders', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('images');
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
