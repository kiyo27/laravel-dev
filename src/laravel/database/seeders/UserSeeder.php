<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'john',
            'email' => 'john@gmail.com',
            'password' => Hash::make('MyPassword'),
        ]);

        DB::table('users')->insert([
            'name' => 'jack',
            'email' => 'jack@gmail.com',
            'password' => Hash::make('MyPassword'),
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('MyPassword'),
            'role' => 'admin,'
        ]);
    }
}
