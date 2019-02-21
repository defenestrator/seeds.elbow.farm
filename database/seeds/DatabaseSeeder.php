<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Heisen\ShippingAddress::class, 220)->create();
        factory(Heisen\Strain::class, 12)->create();
        factory(Heisen\Breeder::class, 2)->create();
    }
}
