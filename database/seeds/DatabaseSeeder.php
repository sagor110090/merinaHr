<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('companies')->truncate();
        $this->call([
            UsersTableSeeder::class,
            CompanyTableSeeder::class
            ]);
    }
}
