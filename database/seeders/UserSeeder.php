<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini!
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nama_depan' => 'Admin',
            'nama_belakang' => 'Satu',
            'username' => 'admin123',
            'email' => 'admin@example.com',
            'nis' => null, 
            'nomor_telepon' => '08123456789',
            'jurusan' => null,
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            [
                'nama_depan' => 'Budi',
                'nama_belakang' => 'Santoso',
                'username' => 'budi01',
                'email' => 'budi@example.com',
                'nis' => '12345678',
                'nomor_telepon' => '08122334455',
                'jurusan' => 'Teknik Informatika',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_depan' => 'Ani',
                'nama_belakang' => 'Sutrisno',
                'username' => 'ani02',
                'email' => 'ani@example.com',
                'nis' => '87654321',
                'nomor_telepon' => '08125556677',
                'jurusan' => 'Manajemen Bisnis',
                'password' => Hash::make('password123'),
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
