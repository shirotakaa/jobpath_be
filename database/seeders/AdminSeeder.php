<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua data lama
        Admin::truncate();

        Admin::create([
            'username' => 'shofie123',
            'email' => 'shofie@gmail.com',
            'nomor' => '08123456789',
            'password' => Hash::make('shofie123'),
            'avatar' => 'assets/admin/media/photo-alumni-2.jpg',
            'nama_depan' => 'Shofie',
            'nama_belakang' => 'Zahro',
        ]);

        Admin::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'nomor' => '08129876543',
            'password' => Hash::make('admin123'),
            'avatar' => 'assets/admin/media/photo-alumni-2.jpg',
            'nama_depan' => 'Super',
            'nama_belakang' => 'Admin',
        ]);
    }
}
