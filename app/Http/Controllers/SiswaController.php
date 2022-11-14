<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $nama = Auth::user()->name;
        $huruf = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $kode = strtoupper(substr(str_shuffle($huruf), 0, 7));
        $siswas = Siswa::orderBy('updated_at', 'desc')->get();
        $pendaftarans = Pendaftaran::all();

        // SUDAH DIPILIH
        $pendaftarans_create = Pendaftaran::WhereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('siswas')
                ->whereRaw('siswas.pendaftaran_id = pendaftarans.id');
        })->get();

        // COUNT
        $total_siswa = Siswa::get();
        // $siswa_pria_master = Pendaftaran::where('jk_pendaftar','P')->get();
        // $siswa_pria = Siswa::where('pendaftaran_id', $siswa_pria_master)->get();

        return view('siswa.index', array(
            'siswas' => $siswas, 'nama' => $nama, 'kode' => $kode, 'pendaftarans' => $pendaftarans, 'pendaftarans_create' => $pendaftarans_create,
            'total_siswa' => $total_siswa
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Siswa::create($request->all());
        return redirect()->route('siswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::find($id)->delete();
        return redirect()->route('siswa.index');
    }
}
