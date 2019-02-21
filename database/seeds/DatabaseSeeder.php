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
        Heisen\User::create(
            [
                'name' => 'Elbow Mike',
                'email' => 'jeremyblc@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
                'remember_token' => str_random(10),
            ]
        );
        factory(Heisen\ShippingAddress::class, 220)->create();
        factory(Heisen\Strain::class, 12)->create();
        factory(Heisen\Breeder::class, 2)->create();
    }
}
