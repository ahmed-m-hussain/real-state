<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
                [
                    'city' => 'Lugano',
                    'country' => 'Switzerland',
                    'address' => 'Loganostrasse 8',
                    'phone' => '+41 123456789',
                    'email' => 'Infinity@Infinity.ch',

                ],
            ]
        );
    }
}
