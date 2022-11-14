<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table = "profils";

    protected $fillable = [
        'nm_pengguna',
        'nm_sekolah',
        'kepsek_sekolah',
        'almt_sekolah',
        'kcmtn_sekolah',
        'hp_sekolah',
    ];
}
