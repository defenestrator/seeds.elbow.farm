<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Heisen\ShippingAddress::class, 36)->create();
        factory(Heisen\Strain::class, 6)->create();
        factory(Heisen\Breeder::class, 2)->create();
        factory(Heisen\SeedPack::class, 12)->create();
        $tableNames = [
            'users', 'strains', 'breeders', 'invoices', 'payment_methods'
        ];
        foreach($tableNames as $tableName) {
            $records = DB::table($tableName)->where('uuid', '=', null)->get();
            foreach($records as $record) {
                DB::table($tableName)
                ->where('id', '=', $record->id)
                ->update(['uuid' => $this->makeUuid()]);
            }
        }

    }
    public function makeUuid()
    {
        $uuid ='';

        try {
            $uuid = Uuid::uuid1()->toString();
        } catch (UnsatisfiedDependencyException $e) {
            echo 'Caught exception: ' . $e->getMessage() . "\n";
        }

        return $uuid;
    }
}
