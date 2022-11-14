<?php

namespace App\Models;

use App\Models\KategoriProduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey ='id_produk';
    public function kategori(){
        return $this->belongsTo(KategoriProduk::class,'id_kategori');
    }
    // public function kategori_relation()
	// {
    // 	return $this->belongsTo(KategoriProduk::class, 'id_kategori');
	// }

    
}
