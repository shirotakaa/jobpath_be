<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanContent extends Model
{
    use HasFactory;

    protected $table = 'perusahaan_content';

    protected $fillable = [
        'asset_1',
        'asset_2',
        'asset_3',
        'judul_perusahaan',
        'subtitle_perusahaan',
    ];
}
