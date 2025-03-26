<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';
    protected $primaryKey = 'id_pekerjaan';
    public $timestamps = true;

    protected $fillable = [
        'id_perusahaan',
        'judul_pekerjaan',
        'lokasi',
        'kategori',
        'deadline',
        'rentang_gaji',
        'about_job',
        'detail_pekerjaan',
        'status',
        'verifikasi',
    ];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'id_perusahaan', 'id_perusahaan');
    }
}
