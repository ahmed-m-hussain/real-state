<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                [
                    'first_name' => 'Test',
                    'last_name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('123456'),
                ],
            ]
        );
    }
}

