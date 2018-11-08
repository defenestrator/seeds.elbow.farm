<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strains', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('breeder_id');
            $table->string('name');
            $table->string('image')->default('/i/heisenhead.png');
            $table->string('genetics')->default('Unidentified bagseed');
            $table->string('description')->default('Fancy Birdseed');
            $table->unsignedInteger('retail_price')->default(50);
            $table->unsignedInteger('flowering_time_min_weeks')->default(9);
            $table->unsignedInteger('flowering_time_max_weeks')->default(9);
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
        Schema::dropIfExists('strains');
    }
}
