<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'is_active' => true
        ]);

        DB::table('users')->insert([
            'name' => 'Owner',
            'email' => 'owner@example.com',
            'role' => 'owner',
            'password' => Hash::make('owner123'),
            'tenant_id' => '1',
            'is_active' => true
        ]);

        DB::table('users')->insert([
            'name' => 'Kasir',
            'email' => 'kasir@example.com',
            'role' => 'kasir',
            'password' => Hash::make('kasir123'),
            'tenant_id' => '1',
            'is_active' => true
        ]);

        DB::table('users')->insert([
            'name' => 'Member',
            'email' => 'member@example.com',
            'role' => 'member',
            'password' => Hash::make('member123'),
            'is_active' => true
        ]);
    }
}
