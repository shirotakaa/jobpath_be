<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'nama' => 'Shofie Nashierotuzzahro',
            'nis' => '271088',
            'jurusan' => '1',
            'tahun_ajaran' => '2024/2025',
            'jenis_kelamin' => 'Perempuan',
            'email' => 'shofie@gmail.com',
            'nomor_telepon' => '08123456789',
            'password' => Hash::make('shofie123'),
            'foto' => null  
        ]);
    }
}
