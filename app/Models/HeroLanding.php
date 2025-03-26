<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroLanding extends Model
{
    use HasFactory;

    protected $table = 'hero_landing';

    protected $fillable = [
        'background_image',
        'judul_hero',
        'subtitle_hero',
    ];
}