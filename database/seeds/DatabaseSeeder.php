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
        factory(Heisen\User::class, 50)->create();
        factory(Heisen\ShippingAddress::class, 120)->create();
        factory(Heisen\Strain::class, 50)->create();
        factory(Heisen\Breeder::class, 2)->create();
        factory(Heisen\SeedType::class, 3)->create();
        // factory(Heisen\Tester::class, 50)->create();
    }
}
