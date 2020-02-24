<?php

use Illuminate\Database\Seeder;
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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'developer@merinasoft.com',
            'role' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => 'Mehedi Hasan Sagor',
            'email' => 'mehedihasansagor.cse@gmail.com',
            'role' => 'user',
            'password' => Hash::make('12345678'),
        ]);
    }
}
