@extends('layouts.master')

@section('content')
<div class="container">
    <h2>Data Kategori Produk</h2>

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \session::get('success')}} </p>
    </div>

    @endif

    <div class="row">

        <div class="col-sm">
            <button type="button" class="btn btn-primary  btn-fw col-lg-5" data-toggle="modal" data-target="#modal_Tambah"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <div class="col-sm">
            {{ $data_kategori->links() }}
        </div>

    </div>
    <br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($data_kategori as $kategori)
            <tr>
                <td class="text-left">{{ $no++ }}</td>
                <td class="text-left">
                    {{$kategori->nama_kategori}}
                </td>
                <td>

                    <a data-toggle="modal" data-target="#modalEdit_{{ $kategori->id_kategori }}" class="btn btn-secondary btn-sm text-center">
                        <i class="fas fa-edit  text-center"></i>
                    </a>
                    <a data-toggle="modal" data-target="#modalDelete_{{ $kategori->id_kategori }}" class="btn btn-danger btn-sm text-center">
                        <i class="fas fa-trash  text-center"></i>
                    </a>

                    <!-- MODAL EDIT -->
                    <form method="POST" action="{{action('KategoriProdukController@update',$kategori['id_kategori'])}} ">
                        <div class="modal fade bd-example-modal-m" id="modalEdit_{{ $kategori->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="background: #fff;">


                                    <div class="modal-header">
                                        <div class="col ">
                                            <p style="margin-bottom: 0">{{$kategori->nama_kategori}}</p>
                                        </div>
                                        <a type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></a>
                                    </div>


                                    <div class="modal-body">

                                        @method('PUT')
                                        @csrf

                                        <div class="invoice p-3 mb-3">

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive">
                                                        <table class="table">

                                                            <tr>
                                                                <th>Nama</th>
                                                                <td>
                                                                    <input id="nama_kategori" type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}">
                                                                    @if ($errors->has('nama_kategori'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('nama_kategori') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </td>
                                                            </tr>

                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="reset" class="btn btn-warning"> Reset </button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save m-r-5"></i> Simpan</button>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Modal Hapus-->
                    <form action="{{action('KategoriProdukController@destroy',$kategori['id_kategori'])}} " method="POST">
                        <div class="modal fade" id="modalDelete_{{ $kategori->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header bg-danger">
                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">



                                        @method('DELETE')
                                        @csrf

                                        <p>Apakah anda yakin ingin menghapus data <b>{{$kategori->nama_kategori}}</b> ?</p>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ti-close m-r-5 f-s-12"></i> Tutup</button>


                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash m-r-5"></i> Hapus</button>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- MODAL TAMBAH -->
<form method="POST" action="{{ route('kategori.store') }}">
    <div class="modal fade" id="modal_Tambah" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pendaftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('nama_kategori') ? ' has-error' : '' }}">
                        <label for="nama_kategori" class="col-md-7 control-label">Nama Kategori<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="nama_kategori" type="text" class="form-control" name="nama_kategori" placeholder="Masukkan Nama Kategori . . . . . ">
                            @if ($errors->has('nama_kategori'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_kategori') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-warning"> Reset </button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save m-r-5"></i> Simpan</button>
                </div>

            </div>
        </div>
    </div>
</form>
@endsection