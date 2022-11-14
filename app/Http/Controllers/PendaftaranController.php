<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Facades\Auth;
use App\Models\Pendaftaran;
use App\Models\Profil;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
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
        $pendaftarans = Pendaftaran::orderBy('updated_at', 'desc')->get();

        // COUNT
        $total_pendaftar = Pendaftaran::get();
        $pendaftar_pria = Pendaftaran::where('jk_pendaftar', 'P')
            ->where('sts_pendaftar', '1')->get();
        $pendaftar_wanita = Pendaftaran::where('jk_pendaftar', 'W')
            ->where('sts_pendaftar', '1')->get();

        return view(
            'pendaftaran.index',
            array(
                'pendaftarans' => $pendaftarans, 'nama' => $nama, 'kode' => $kode,
                'total_pendaftar' => $total_pendaftar, 'pendaftar_pria' => $pendaftar_pria, 'pendaftar_wanita' => $pendaftar_wanita
            )
        );
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
        Pendaftaran::create($request->all());
        return redirect()->route('pendaftaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendaftarans = Pendaftaran::orderBy('id', 'desc')->findOrFail($id);
        return view('pendaftaran.index', compact('$pendaftarans'));
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
        Pendaftaran::find($id)->update($request->all());
        return redirect()->route('pendaftaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pendaftaran::find($id)->delete();
        return redirect()->route('pendaftaran.index');
    }

    //KONFRIMASI
    public function status($id)
    {
        $data = DB::table('pendaftarans')->where('id', $id)->first();
        $status_sekarang = $data->sts_pendaftar;

        if ($status_sekarang == '1') {
            DB::table('pendaftarans')
                ->where('id', $id)
                ->update(['sts_pendaftar' => '0']);
            // Alert()->success('Berhasil.', 'Status batal diverifikasi !');
        } else {
            DB::table('pendaftarans')
                ->where('id', $id)
                ->update(['sts_pendaftar' => '1']);
            // Alert()->success('Berhasil.', 'Status berhasil diverifikasi !');
        }
        return redirect()->back();
    }

    public function cetak_pdf($id)
    {
        $pendaftarans = Pendaftaran::find($id);
        $pdf = PDF::loadView('pendaftaran.laporan', compact('pendaftarans'));
        return $pdf->download('INVOICE_' . $pendaftarans->nm_pendaftar . '.pdf');
    }
}
