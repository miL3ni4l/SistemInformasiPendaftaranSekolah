<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = "pendaftarans";

    protected $fillable = [
        'nm_pengguna',
        'no_pendaftar',
        'nm_pendaftar',
        'tmpt_pendaftar',
        'tgl_pendaftar',
        'jk_pendaftar',
        'almt_pendaftar',
        'hp_pendaftar',
        'jrsn_pendaftar',
        'sts_pendaftar',
    ];

    public function siswa_relation()
    {
    	return $this->hasMany(Siswa::class);
    }

}
