<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $gurus = Guru::orderBy('updated_at', 'desc')->get();

        // COUNT
        $total_guru = Guru::get();
        $guru_pria = Guru::where('jk_guru', 'P')->get();
        $guru_wanita = Guru::where('jk_guru', 'W')->get();

        return view('guru.index', array(
            'gurus' => $gurus,'nama' => $nama,'kode' => $kode,
            'total_guru' => $total_guru,'guru_pria' => $guru_pria,'guru_wanita' => $guru_wanita
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
        Guru::create($request->all());
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gurus = Guru::orderBy('id', 'desc')->findOrFail($id);
        return view('guru.index', compact('$gurus'));
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
        Guru::find($id)->update($request->all());
        return redirect()->route('guru.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Guru::find($id)->delete();
        return redirect()->route('guru.index');
    }
}
