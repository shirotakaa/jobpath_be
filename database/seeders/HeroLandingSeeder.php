<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HeroLanding;

class HeroLandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroLanding::create([
            'background_image' => 'public/hero_images/default.jpg',
            'judul_hero' => 'Selamat Datang di JobPath',
            'subtitle_hero' => 'Temukan pekerjaan impian Anda bersama kami',
        ]);
    }
}
