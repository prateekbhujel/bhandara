<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('users')->insert([
            [
                'name'      => 'Admin User',
                'username'  => 'admin',
                'email'     => 'admin@email.com',
                'password'  => bcrypt('password'),
                'role'      => 'admin',
                'status'     => 'active',
            ],
            [
                'name'      => 'Vendor User',
                'username'  => 'vendor',
                'email'     => 'vendor@email.com',
                'password'  => bcrypt('password'),
                'role'      => 'vendor',
                'status'     => 'active',
            ],
            [
                'name'      => 'User',
                'username'  => 'user',
                'email'     => 'user@email.com',
                'password'  => bcrypt('password'),
                'role'      => 'user',
                'status'     => 'active',
            ],
        ]);

    }
}
