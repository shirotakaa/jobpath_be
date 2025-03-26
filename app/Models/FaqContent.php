<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqContent extends Model
{
    use HasFactory;

    protected $table = 'faq_content';

    protected $fillable = [
        'asset_1',
        'asset_2',
        'asset_3',
        'deskripsi',
    ];
}
