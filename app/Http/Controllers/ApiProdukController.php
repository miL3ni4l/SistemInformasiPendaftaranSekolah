<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ApiProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_produk = Produk::with('kategori')->get()->toArray();
        // return $data_produk;
        $produk = Produk::paginate(10);
        return response()->json([
            'data' => $produk
        ]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'id_kategori' => $request->id_kategori,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
        ]);
        return response()->json([
            'data' => $produk
        ]);
    }


    public function show(Produk $produk)
    {
        return response()->json([
            'data' => $produk
        ]);
    }

    public function showById($id)
    {
        $data_produk = Produk::with('kategori')->where('id_kategori', $id)->get();
        return $data_produk;
        //
    }

    public function showByNama($nama)
    {
        $data_produk = Produk::with('kategori')->where('nama_produk', 'LIKE', '%' . $nama . '%')->get();
        return $data_produk;
        //
    }

    public function showByKategori($id)
    {
        $data_produk = Produk::with('kategori')->where('id_kategori', $id)->get();
        return $data_produk;
        //
    }


    public function update(Request $request, Produk $produk)
    {
        $produk->nama_produk = $request->nama_produk;  
        $produk->id_kategori = $request->id_kategori;
        $produk->harga = $request->harga;   
        $produk->deskripsi = $request->deskripsi;   
        $produk->save();
        return response()->json([
            'data' => $produk
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return response()->json([
            'message' => 'Berhasil Dihapus'
        ]);

    }
}
