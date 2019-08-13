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
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Administrator',
            'rfid' => '000000',
            'email' => 'administrator@fuelsystem.com',
            'password' => bcrypt('administrator'),
            'type' => '3',
            'created_at' => now()->timestamp,
            'updated_at' => now()->timestamp,
        ]);

        DB::table('companies')->insert([
            'name' => 'Company Name',
            'bis_number' => '000000',
            'fis_number' => '000000',
            'contact_person' => 'Contact Person',
            'tax_number' => '000000',
            'res_number' => '000000',
            'tel_number' => '000000',
            'email' => 'email@address.com',
            'address' => 'Address',
            'city' => 'City',
            'country' => 'Country',
            'status' => '4',
            'starting_balance' => '0',
            'limits' => '0',
            'limit_left' => '0',
            'has_limit' => '0',
            'has_receipt' => '0',
            'has_receipt_nr' => '0',
            'created_at' => now()->timestamp,
            'updated_at' => now()->timestamp,
        ]);
    }
}
