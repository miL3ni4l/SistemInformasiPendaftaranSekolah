<?php

namespace App\Models;

use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = "siswas";
    protected $fillable = [
        "pendaftaran_id",
    ];

    public function pendaftaran_relation()
	{
    	return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
	}
}
