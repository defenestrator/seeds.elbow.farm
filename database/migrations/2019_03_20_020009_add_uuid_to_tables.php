<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class AddUuidToTables extends Migration
{
    protected $uuid;
    
    public function __construct (Uuid $uuid) 
    {
        $this->uuid = $uuid;
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        protected $tableNames = [
            'users', 'strains', 'breeders', 'invoices', 'payment_methods'
        ];
        foreach($tableNames as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->uuid('uuid')->after('id')->unique()->nullable();
            });
            DB::table($tableName)->where('uuid' === null)->update('uuid' => $uuid->uuid1());      
        }
              
        Schema::table('invoices', function (Blueprint $table) {
            $table->text('customer_notes')->after('total')->nullable();
        });
        
        Schema::table('payment_methods', function (Blueprint $table) {
            $table->text('account')->after('name')->nullable();
            $table->text('notes')->after('name')->nullable();
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
