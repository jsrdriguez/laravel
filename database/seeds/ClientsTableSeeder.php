<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create()->each(function($user) {
            $address = factory(\App\Models\Client::class)->make();
            $user->client()->save($address);
        });
    }
}
