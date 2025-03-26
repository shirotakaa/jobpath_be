<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerusahaanContent;

class PerusahaanContentSeeder extends Seeder
{
    public function run(): void
    {
        PerusahaanContent::create([
            'asset_1' => 'images/asset1.jpg',
            'asset_2' => 'images/asset2.jpg',
            'asset_3' => 'images/asset3.jpg',
            'judul_perusahaan' => 'PT Maju Jaya',
            'subtitle_perusahaan' => 'Inovasi dan Teknologi Masa Depan',
        ]);
    }
}
