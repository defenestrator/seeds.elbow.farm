<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyStrainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('strains', function (Blueprint $table) {
            $table->unsignedInteger('breeder_id')->default(1)->change();
            $table->string('name')->default('Anonymous Coward')->change();
            $table->string('genetics')->default('Bagseed X Big Bud')->change();
            $table->longText('description')->nullable('Add a description or people will think this is random bagseed')->change();
            $table->addColumn('boolean', 'feminized')->default(false);
        });
        if (Schema::hasColumn('strains', 'seed_type_id')) {
            Schema::table('strains', function (Blueprint $table) {
               $table->dropColumn(['seed_type_id']);
            });
        }
        Schema::dropIfExists('seed_type');
    }

    /**     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
