<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing records to start fresh
        DB::table('users')->truncate();

        // Create sample users
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'salah ouddiz',
                'email' => 'salah.ouddiz@gmail.com',
                'password' => Hash::make('password'),
            ],
        ]);

        // You can add more users as needed

        // Optionally, you can create a specific number of users using a loop
        // for ($i = 1; $i <= 10; $i++) {
        //     DB::table('users')->insert([
        //         'name' => 'User ' . $i,
        //         'email' => 'user' . $i . '@example.com',
        //         'password' => Hash::make('password'),
        //     ]);
        // }
    }
}
