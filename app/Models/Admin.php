<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'id', 'username', 'email', 'nomor', 'password', 
        'avatar', 'nama_depan', 'nama_belakang'
    ];

    protected $hidden = ['password'];

    public function getAvatarAttribute($value)
    {
        return $value ? 'storage/' . $value : 'assets/admin/media/svg/blank.svg';
    }
}

