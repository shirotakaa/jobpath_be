<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JejakAlumni extends Model
{
    use HasFactory;

    protected $table = 'jejakalumni';
    protected $primaryKey = 'id_jejak_alumni';
    protected $fillable = [
        'id_siswa', // Tambahkan ini
        'foto',
        'nama',
        'nis',
        'jurusan',
        'pekerjaan',
        'perusahaan',
        'instagram',
        'linkedin',
        'status',
    ];

    // Relasi ke tabel siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }
}