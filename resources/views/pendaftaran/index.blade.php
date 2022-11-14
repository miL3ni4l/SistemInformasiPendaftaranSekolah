@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pendaftaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pendaftar</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4 col-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$total_pendaftar->count()}}</h3>
                        <p>Total Pendaftar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$pendaftar_pria->count()}}</h3>
                        <p>Total Pria Diterima</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$pendaftar_wanita->count()}}</h3>
                        <p>Total Wanita Diterima</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary  btn-fw col-lg-2" data-toggle="modal" data-target="#modal_Tambah"><i class="fa fa-plus"></i> Tambah</button>

            <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div> -->

        </div>

        <div class=" table-responsive col-md-12 col-sm-6 col-12">
            <!--area diisi-->
            <table class="table table-striped" id="example1">
                <thead>
                    <tr>
                        <th width="1%">NO</th>
                        <th width="1%">STATUS</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">JK</th>
                        <th class="text-center">ALAMAT</th>
                        <th class="text-center">UPDATE</th>
                        <th class="text-center col-md-2">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($pendaftarans as $p)
                    <tr>
                        <td class="text-left">{{ $no++ }}</td>
                        <td class="text-left">
                            @if($p->sts_pendaftar == '1')
                            <a class="badge bg-success col-md-12" data-toggle="modal" data-target="#modalStatus_{{ $p->id }}">
                                <b>Diterima</b>
                            </a>
                            @else
                            <a class="badge bg-warning col-md-12" data-toggle="modal" data-target="#modalStatus_{{ $p->id }}">
                                <b>Ditolak</b>
                            </a>
                            @endif
                            <!-- Modal Show-->
                            <div class="modal fade bd-example-modal-m" id="modalStatus_{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="background: #fff;">

                                        <div class="modal-header">
                                            <a type="button" class="btn btn-dark btn-sm" href="{{ route('pendaftaran.laporan', $p->id) }}"><i class="fa fa-download"></i></a>
                                            <div class="col ">
                                                <p style="margin-bottom: 0">{{ $p->no_pendaftar}}</p>
                                                <!-- <h6 class="font-weight-bold">I</h6> -->
                                            </div>
                                            <a type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></a>
                                        </div>

                                        <div class="modal-body">
                                            <div class="invoice p-3 mb-3">
                                                <div class="row invoice-info">

                                                    <div class="col-sm-6 invoice-col">
                                                        Nama
                                                        <address>
                                                            <strong>{{$p->nm_pendaftar}}</strong>

                                                        </address>
                                                    </div>

                                                    <div class="col-sm-6 invoice-col">
                                                        Jurusan
                                                        <address>
                                                            <strong> {{$p->jrsn_pendaftar}}</strong>

                                                        </address>
                                                    </div>

                                                    <!-- <div class="col-sm-12 invoice-col">
                                                        Alamat
                                                        <address>
                                                            <strong> {{$p->almt_pendaftar}}, {{$p->kcmtn_Pendaftar}}</strong>
                                                        </address>
                                                    </div> -->

                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th style="width:50%">JK</th>
                                                                    <td>{{$p->jk_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:50%">Tempat Lahir</th>
                                                                    <td>{{$p->tmpt_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:50%">Tanggal Lahir</th>
                                                                    <td>{{$p->tgl_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat</th>
                                                                    <td>{{$p->almt_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>HP</th>
                                                                    <td>{{$p->hp_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Diubah</th>
                                                                    <td>{{ $p->updated_at->diffForHumans()}}</td>
                                                                </tr>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <div class="col">
                                                @if($p->sts_pendaftar == '1')
                                                <a href="{{ url('pendaftaran/status/'.$p->id) }}" class="btn btn-warning btn-block btn-sm-12 text-white">Ditolak</a>
                                                @else
                                                <a href="{{ url('pendaftaran/status/'.$p->id) }}" class="btn btn-success btn-block btn-sm-12 text-white">Diterima</a>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="text-left">
                            {{$p->no_pendaftar}}
                        </td>
                        <td class="text-left">
                            {{$p->nm_pendaftar}}
                        </td>
                        <td class="text-left">
                            {{$p->jk_pendaftar}}
                        </td>
                        <td class="text-left">
                            {{$p->almt_pendaftar}}
                        </td>
                        <td class="text-left">{{ $p->updated_at->diffForHumans()}}</td>
                        <td class="col-md-1">

                            @if($p->sts_pendaftar == '1')
                            <a data-toggle="modal" data-target="#modalShow_{{ $p->id }}" class="btn btn-warning btn-sm text-center">
                                <i class="fa fa-eye text-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#modalEdit_{{ $p->id }}" class="btn btn-secondary btn-sm text-center">
                                <i class="fas fa-edit  text-center"></i>
                            </a>
                            @else
                            <a data-toggle="modal" data-target="#modalShow_{{ $p->id }}" class="btn btn-warning btn-sm text-center">
                                <i class="fa fa-eye text-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#modalEdit_{{ $p->id }}" class="btn btn-secondary btn-sm text-center">
                                <i class="fas fa-edit  text-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#modalDelete_{{ $p->id }}" class="btn btn-danger btn-sm text-center">
                                <i class="fas fa-trash  text-center"></i>
                            </a>
                            @endif

                            <!-- Modal Show-->
                            <div class="modal fade bd-example-modal-m" id="modalShow_{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="background: #fff;">

                                        <div class="modal-header">
                                            <a type="button" class="btn btn-dark btn-sm" href=""><i class="fa fa-download"></i></a>
                                            <div class="col ">
                                                <p style="margin-bottom: 0">{{ $p->nm_pendaftar}}</p>
                                                <!-- <h6 class="font-weight-bold">I</h6> -->
                                            </div>
                                            <a type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></a>
                                        </div>

                                        <div class="modal-body">

                                            <div class="invoice p-3 mb-3">
                                                <div class="row invoice-info">

                                                    <div class="col-sm-6 invoice-col">
                                                        Nama
                                                        <address>
                                                            <strong>{{$p->nm_pendaftar}}</strong>

                                                        </address>
                                                    </div>

                                                    <div class="col-sm-6 invoice-col">
                                                        Jurusan
                                                        <address>
                                                            <strong> {{$p->jrsn_pendaftar}}</strong>

                                                        </address>
                                                    </div>

                                                    <!-- <div class="col-sm-12 invoice-col">
                                                        Alamat
                                                        <address>
                                                            <strong> {{$p->almt_pendaftar}}, {{$p->kcmtn_Pendaftar}}</strong>
                                                        </address>
                                                    </div> -->

                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th style="width:50%">JK</th>
                                                                    <td>{{$p->jk_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:50%">Tempat Lahir</th>
                                                                    <td>{{$p->tmpt_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:50%">Tanggal Lahir</th>
                                                                    <td>{{$p->tgl_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat</th>
                                                                    <td>{{$p->almt_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>HP</th>
                                                                    <td>{{$p->hp_pendaftar}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Diubah</th>
                                                                    <td>{{ $p->updated_at->diffForHumans()}}</td>
                                                                </tr>

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-3 mb-3">

                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        Petugas
                                                        <address>
                                                            <strong>{{$p->nm_pengguna}}</strong>
                                                        </address>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!-- MODAL EDIT -->
                            <form method="POST" action="{{route('pendaftaran.update',$p->id)}}">
                                <div class="modal fade bd-example-modal-m" id="modalEdit_{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="background: #fff;">


                                            <div class="modal-header">
                                                <div class="col ">
                                                    <p style="margin-bottom: 0">{{$p->nm_pendaftar}}</p>
                                                </div>
                                                <a type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></a>
                                            </div>


                                            <div class="modal-body">

                                                {{ csrf_field() }}
                                                {{ method_field('put') }}


                                                <div class="invoice p-3 mb-3">

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="table-responsive">
                                                                <table class="table">

                                                                    <tr>
                                                                        <th>Nama</th>
                                                                        <td>
                                                                            <input id="nm_pendaftar" type="text" class="form-control" name="nm_pendaftar" value="{{ $p->nm_pendaftar }}">
                                                                            @if ($errors->has('nm_pendaftar'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('nm_pendaftar') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Alamat</th>
                                                                        <td>
                                                                            <input id="almt_pendaftar" type="text" class="form-control" name="almt_pendaftar" value="{{ $p->almt_pendaftar }}">
                                                                            @if ($errors->has('almt_pendaftar'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('almt_pendaftar') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>


                                                                    <tr>
                                                                        <th>HP</th>
                                                                        <td>
                                                                            <input id="hp_pendaftar" type="text" class="form-control" name="hp_pendaftar" value="{{ $p->hp_pendaftar }}">
                                                                            @if ($errors->has('hp_pendaftar'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('hp_pendaftar') }}</strong>
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
                            <form action="{{ route('pendaftaran.destroy', $p->id)}}" method="post">
                                <div class="modal fade" id="modalDelete_{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
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

                                                <p>Apakah anda yakin ingin menghapus data <b>{{$p->nm_pendaftar}}</b> ?</p>

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
    </div>


</section>

<!-- MODAL TAMBAH -->
<form method="POST" action="{{ route('pendaftaran.store') }}">
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

                    <div class="form-group{{ $errors->has('no_pendaftar') ? ' has-error' : '' }}">
                        <label for="no_pendaftar" class="col-md-7 control-label">Kode Daftar<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="no_pendaftar" type="text" class="form-control" name="no_pendaftar" value="{{ $kode }}" placeholder="Masukkan Nama Pengguna . . . . . " readonly="">
                            @if ($errors->has('no_pendaftar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('no_pendaftar') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('nm_pengguna') ? ' has-error' : '' }}">
                        <label for="nm_pengguna" class="col-md-7 control-label">Nama Pengguna<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="nm_pengguna" type="text" class="form-control" name="nm_pengguna" value="{{ $nama }}" placeholder="Masukkan Nama Pengguna . . . . . " readonly="">
                            @if ($errors->has('nm_pengguna'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_pengguna') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('nm_pendaftar') ? ' has-error' : '' }}">
                        <label for="nm_pendaftar" class="col-md-7 control-label">Nama<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="nm_pendaftar" type="text" class="form-control" name="nm_pendaftar" value="" placeholder="Masukkan Nama  . . . . . ">
                            @if ($errors->has('nm_pendaftar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_pendaftar') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="container  col-md-12">
                        <label>Jenis Kelamin<b style="color:Tomato;">*</b></label>
                        <select required="required" name="jk_pendaftar" class="custom-select mb-3">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="P">Pria</option>
                            <option value="W">Wanita</option>
                        </select>
                    </div>


                    <div class="form-group{{ $errors->has('tmpt_pendaftar') ? ' has-error' : '' }}">
                        <label for="tmpt_pendaftar" class="col-md-7 control-label">Tempat Lahir<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="tmpt_pendaftar" type="text" class="form-control" name="tmpt_pendaftar" value="" placeholder="Masukkan Tempat Lahir . . . . . ">
                            @if ($errors->has('tmpt_pendaftar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tmpt_pendaftar') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('tgl_pendaftar') ? ' has-error' : '' }}">
                        <label for="tgl_pendaftar" class="col-md-7 control-label">Tanggal Lahir<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="tgl_pendaftar" type="date" class="form-control" name="tgl_pendaftar" value="" placeholder="Masukkan Kecamatan Pendaftar. . . . . ">
                            @if ($errors->has('tgl_pendaftar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_pendaftar') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('hp_pendaftar') ? ' has-error' : '' }}">
                        <label for="hp_pendaftar" class="col-md-7 control-label">HP Pendaftar<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="hp_pendaftar" type="number" class="form-control" name="hp_pendaftar" value="" placeholder="Masukkan HP Pendaftar . . . . . ">
                            @if ($errors->has('hp_pendaftar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hp_pendaftar') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>



                    <!-- <div class="form-group col-md-12">
                        <label>Foto pendaftar <i>(kosongkan jika tidak ada)</i> </label>
                        <div class="col-md-12">
                            <img width="250" height="250" />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                        </div>
                    </div> -->


                    <div class="form-group col-md-12">
                        <label>Alamat <b style="color:Tomato;">*</b></label>
                        <textarea id="inputDescription" name="almt_pendaftar" class="form-control col-md-12" placeholder="Masukkan Keterangan Pendaftar . . . . . " rows="3"></textarea>
                    </div>

                    <div class="form-group{{ $errors->has('jrsn_pendaftar') ? ' has-error' : '' }}">
                        <label for="jrsn_pendaftar" class="col-md-7 control-label">Jurusan<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="jrsn_pendaftar" type="text" class="form-control" name="jrsn_pendaftar" value="" placeholder="Masukkan Tempat Lahir . . . . . ">
                            @if ($errors->has('jrsn_pendaftar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jrsn_pendaftar') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="container  col-md-12">
                        <label>Status<b style="color:Tomato;">*</b></label>
                        <select required="required" name="sts_pendaftar" class="custom-select mb-3">
                            <option value="">-- Pilih Status --</option>
                            <option value="0">Ditolak</option>
                            <option value="1">Diterima</option>
                        </select>
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

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

        $('.btn-filter').click(function(e) {
            e.preventDefault();

            $('#modal-filter').modal();
        })

    })
</script>
@endsection