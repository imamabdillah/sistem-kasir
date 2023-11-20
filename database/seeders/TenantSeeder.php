<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tenants')->insert([
            'nama' => 'Warung Soto',
            'deskripsi' => 'warung soto',
        ]);
        DB::table('tenants')->insert([
            'nama' => 'Warung Ayam',
            'deskripsi' => 'warung ayam',
        ]);
    }
}
