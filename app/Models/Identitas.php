<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    use HasFactory;

    protected $table = 'identitas';

    protected $fillable = [
        'logo_light',
        'logo_dark',
        'nama',
        'alamat',
        'deskripsi',
        'instagram',
        'youtube',
        'facebook',
        'tiktok',
        'whatsapp',
        'email',
    ];
}