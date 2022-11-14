@extends('layouts.master')

@section('content')

<div class="container">

    <h2>Membuat Prodi Baru</h2>

    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{\Session::get('success') }} </p>
    </div>

    @endif

    <div class="row">
        <div class="col-sm">
            <button type="button" class="btn btn-primary  btn-fw col-lg-5" data-toggle="modal" data-target="#modal_Tambah"><i class="fa fa-plus"></i> Tambah</button>
        </div>

        <div class="col-sm">
            {{$data_produk->links()}}
        </div>
    </div>
    <br />

    <table class="table striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Dekripsi</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($data_produk as $produk)
            <tr>
                <td class="text-left">{{ $no++ }}</td>
                <td>{{$produk['nama_produk']}} </td>
                <td>{{$produk->kategori->nama_kategori}} </td>
                <td>{{$produk['harga']}} </td>
                <td>{{$produk['deskripsi']}} </td>
                <td>
                    <a data-toggle="modal" data-target="#modalEdit_{{ $produk->id_produk }}" class="btn btn-secondary btn-sm text-center">
                        <i class="fas fa-edit  text-center"></i>
                    </a>
                    <a data-toggle="modal" data-target="#modalDelete_{{ $produk->id_produk }}" class="btn btn-danger btn-sm text-center">
                        <i class="fas fa-trash  text-center"></i>
                    </a>

                    <!-- MODAL EDIT -->
                    <form method="POST" action="{{action('ProdukController@update',$produk['id_produk'])}} ">
                        <div class="modal fade bd-example-modal-m" id="modalEdit_{{ $produk->id_produk }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content" style="background: #fff;">


                                    <div class="modal-header">
                                        <div class="col ">
                                            <p style="margin-bottom: 0">{{$produk->nama_produk}}</p>
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
                                                                    <input id="nama_produk" type="text" class="form-control" name="nama_produk" value="{{$produk->nama_produk }}">
                                                                    @if ($errors->has('nama_produk'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('nama_produk') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>kategori</th>
                                                                <td>
                                                                    <input id="id_kategori" type="text" class="form-control" name="id_kategori" value="{{$produk->id_kategori }}">
                                                                    @if ($errors->has('id_kategori'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('id_kategori') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Harga</th>
                                                                <td>
                                                                    <input id="harga" type="text" class="form-control" name="harga" value="{{$produk->harga }}">
                                                                    @if ($errors->has('harga'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('harga') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Deskripsi</th>
                                                                <td>
                                                                    <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{$produk->deskripsi }}">
                                                                    @if ($errors->has('deskripsi'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('deskripsi') }}</strong>
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
                    <form action="{{action('ProdukController@destroy',$produk['id_produk'])}} " method="POST">
                        <div class="modal fade" id="modalDelete_{{ $produk->id_produk }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
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

                                        <p>Apakah anda yakin ingin menghapus data <b>{{$produk->nama_produk}}</b> ?</p>

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
<form method="POST" action="{{ route('produk.store') }}">
    <div class="modal fade" id="modal_Tambah" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Prodi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('nama_produk') ? ' has-error' : '' }}">
                        <label for="nama_produk" class="col-md-7 control-label">Nama Kategori<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="nama_produk" type="text" class="form-control" name="nama_produk" placeholder="Masukkan Nama Kategori . . . . . ">
                            @if ($errors->has('nama_produk'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_produk') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="container  col-md-12">
                        <label>Jenis Kategori<b style="color:Tomato;">*</b></label>
                        <select required="required" name="id_kategori" class="custom-select mb-3">
                            <option value="">-- Jenis Kategori --</option>
                            @foreach ($data_kategori as $kategori)
                            <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group{{ $errors->has('harga') ? ' has-error' : '' }}">
                        <label for="harga" class="col-md-7 control-label">Harga<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="harga" type="text" class="form-control" name="harga" placeholder="Masukkan Nama Kategori . . . . . ">
                            @if ($errors->has('harga'))
                            <span class="help-block">
                                <strong>{{ $errors->first('harga') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                        <label for="deskripsi" class="col-md-7 control-label">Deskripsi<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="deskripsi" type="text" class="form-control" name="deskripsi" placeholder="Masukkan Nama Kategori . . . . . ">
                            @if ($errors->has('deskripsi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('deskripsi') }}</strong>
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