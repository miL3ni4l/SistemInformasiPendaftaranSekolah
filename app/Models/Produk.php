<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $primaryKey ='id_produk';
    public function kategori(){
        return $this->belongsTo('App\KategoriProduk','id_kategori');
    }
}
