<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Siswa extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [ 
        'nama', 'email', 'nis', 'nomor_telepon', 
        'jurusan', 'tahun_ajaran', 'jenis_kelamin', 
        'password', 'foto'
    ];

    public function getFotoAttribute($value)
    {
        return $value ? asset($value) : asset('storage/siswa/default.png');
    }
}