<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = "gurus";
    protected $fillable = [
        'nm_pengguna',
        'nip',
        'nm_guru',
        'jk_guru',
    ];
}
