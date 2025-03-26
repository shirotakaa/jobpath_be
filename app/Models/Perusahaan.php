<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Perusahaan extends Authenticatable
{
    use HasFactory;

    protected $primaryKey = 'id_perusahaan';

    protected $table = 'perusahaan';
    
    protected $fillable = [
        'nama_perusahaan',
        'jenis_perusahaan',
        'password',
        'logo',
        'email',
        'nomor_telepon',
        'alamat',
    ];

    protected $hidden = [
        'password',
    ];
}