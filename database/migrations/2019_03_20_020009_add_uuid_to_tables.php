<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class AddUuidToTables extends Migration
{
    public function makeUuid() 
    {
        $uuid ='';
        
        try {
            $uuid= Uuid::uuid1()->toString();
        } catch (UnsatisfiedDependencyException $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }
                
        return $uuid;
    }
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = [
            'users', 'strains', 'breeders', 'invoices', 'payment_methods'
        ];
        foreach($tableNames as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->uuid('uuid')->after('id')->nullable();
            });
            $uuid = $this->makeUuid();
            DB::table($tableName)->where('uuid', '=', null)->update(['uuid' => $uuid]);      
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
