<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class ApiKategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = KategoriProduk::paginate(10);
        return response()->json([
            'data' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $kategori = KategoriProduk::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return response()->json([
            'data' => $kategori
        ]);
    }

    public function show(KategoriProduk $kategori)
    {
        return response()->json([
            'data' => $kategori
        ]);
    }


    public function update(Request $request, KategoriProduk $kategori)
    {
        $kategori->nama_kategori = $request->nama_kategori;  
        $kategori->save();
        return response()->json([
            'data' => $kategori
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProduk $kategori)
    {
        $kategori->delete();
        return response()->json([
            'message' => 'Berhasil Dihapus'
        ]);

    }
}
