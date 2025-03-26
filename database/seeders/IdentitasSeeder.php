<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Identitas;

class IdentitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Identitas::create([
            'logo_light' => 'assets/admin/media/svg/blank.svg',
            'logo_dark' => 'assets/admin/media/svg/blank.svg',
            'nama' => 'JobPath',
            'alamat' => 'JL. Lorem ipsum dolor sit amet consectetur adipisicing elit',
            'deskripsi' => 'Lorem ipsum, dolor sit amet codnsectetur adipisicing elit. Inventore iusto explicabo iure amet architecto delectus asperiores vel ab accusantium quos architecto delectus asperiores vel ab accusantium quos architecto delectus asperiores vel ab accusantium quosarchitecto delectus asperiores vel ab accusantium quosarchitecto delectus asperiores vel.',
            'instagram' => 'https://instagram.com/lembaga',
            'youtube' => 'https://youtube.com/lembaga',
            'facebook' => 'https://facebook.com/lembaga',
            'tiktok' => 'https://tiktok.com/@lembaga',
            'whatsapp' => 'https://wa.me/1234567890',
            'email' => 'jobpath@gmail.com',
        ]);
    }
}