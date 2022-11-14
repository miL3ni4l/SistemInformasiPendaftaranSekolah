@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profil</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profil</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary  btn-fw col-lg-2" data-toggle="modal" data-target="#modalDelete_Tambah"><i class="fa fa-plus"></i> Tambah</button>

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
                        <th class="text-center">NAMA</th>
                        <th class="text-center">UPDATE</th>
                        <th class="text-center col-md-2">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($profils as $p)
                    <tr>
                        <td class="text-left">{{ $no++ }}</td>
                        <td class="text-left">
                            {{$p->nm_sekolah}} , {{$p->almt_sekolah}},{{$p->kcmtn_sekolah}}
                        </td>
                        <td class="text-left">{{ $p->updated_at->diffForHumans()}}</td>
                        <td class="col-md-1">

                            <a data-toggle="modal" data-target="#modalShow_{{ $p->id }}" class="btn btn-warning btn-sm text-center">
                                <i class="fa fa-eye text-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#modalEdit_{{ $p->id }}" class="btn btn-secondary btn-sm text-center">
                                <i class="fas fa-edit  text-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#modalDelete_{{ $p->id }}" class="btn btn-danger btn-sm text-center">
                                <i class="fas fa-trash  text-center"></i>
                            </a>

                            <!-- Modal Show-->
                            <div class="modal fade bd-example-modal-m" id="modalShow_{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="background: #fff;">

                                        <div class="modal-header">
                                            <a type="button" class="btn btn-dark btn-sm" href=""><i class="fa fa-download"></i></a>
                                            <div class="col ">
                                                <p style="margin-bottom: 0">{{ $p->nm_sekolah}}</p>
                                                <!-- <h6 class="font-weight-bold">I</h6> -->
                                            </div>
                                            <a type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></a>
                                        </div>

                                        <div class="modal-body">

                                            <div class="invoice p-3 mb-3">
                                                <div class="row invoice-info">

                                                    <div class="col-sm-6 invoice-col">
                                                        Nama Sekolah
                                                        <address>
                                                            <strong>{{$p->nm_sekolah}}</strong>

                                                        </address>
                                                    </div>

                                                    <div class="col-sm-6 invoice-col">
                                                        WhatsApp
                                                        <address>
                                                            <strong> {{$p->hp_sekolah}}</strong>

                                                        </address>
                                                    </div>

                                                    <!-- <div class="col-sm-12 invoice-col">
                                                        Alamat
                                                        <address>
                                                            <strong> {{$p->almt_sekolah}}, {{$p->kcmtn_sekolah}}</strong>
                                                        </address>
                                                    </div> -->

                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th style="width:50%">Nama</th>
                                                                    <td>{{$p->nm_sekolah}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width:50%">Kepsek</th>
                                                                    <td>{{$p->kepsek_sekolah}}
                                                                        <!-- ,{{ date('d/m/Y', strtotime($p->tanggal_trc )) }} -->
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Alamat</th>
                                                                    <td>{{$p->almt_sekolah}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Kecamatan</th>
                                                                    <td>{{$p->kcmtn_sekolah}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>HP</th>
                                                                    <td>{{$p->hp_sekolah}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dibuat</th>
                                                                    <td>{{ $p->created_at->diffForHumans()}}</td>
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
                                                        Alamat
                                                        <address>
                                                            <strong>{{$p->almt_sekolah}}</strong>
                                                        </address>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!-- MODAL EDIT -->
                            <form method="POST" action="{{route('profil.update',$p->id)}}">
                                <div class="modal fade bd-example-modal-m" id="modalEdit_{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="background: #fff;">


                                            <div class="modal-header">
                                                <div class="col ">
                                                    <p style="margin-bottom: 0">{{$p->nm_sekolah}}</p>
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
                                                                            <input id="nm_sekolah" type="text" class="form-control" name="nm_sekolah" value="{{ $p->nm_sekolah }}">
                                                                            @if ($errors->has('nm_sekolah'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('nm_sekolah') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Kepsek</th>
                                                                        <td>
                                                                            <input id="kepsek_sekolah" type="text" class="form-control" name="kepsek_sekolah" value="{{ $p->kepsek_sekolah }}">
                                                                            @if ($errors->has('kepsek_sekolah'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('kepsek_sekolah') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <th>Alamat</th>
                                                                        <td>
                                                                            <input id="almt_sekolah" type="text" class="form-control" name="almt_sekolah" value="{{ $p->almt_sekolah }}">
                                                                            @if ($errors->has('almt_sekolah'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('almt_sekolah') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <th>Kecamatan</th>
                                                                        <td>
                                                                            <input id="kcmtn_sekolah" type="text" class="form-control" name="kcmtn_sekolah" value="{{ $p->kcmtn_sekolah }}">
                                                                            @if ($errors->has('kcmtn_sekolah'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('kcmtn_sekolah') }}</strong>
                                                                            </span>
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th>HP</th>
                                                                        <td>
                                                                            <input id="hp_sekolah" type="text" class="form-control" name="hp_sekolah" value="{{ $p->hp_sekolah }}">
                                                                            @if ($errors->has('hp_sekolah'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('hp_sekolah') }}</strong>
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
                            <form action="{{ route('profil.destroy', $p->id)}}" method="post">
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

                                                <p>Apakah anda yakin ingin menghapus data <b>{{$p->nm_sekolah}}</b> ?</p>

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

        <!-- <div class="card-footer">
            Footer
        </div> -->

    </div>


</section>

<!-- MODAL TAMBAH -->
<form method="POST" action="{{ route('profil.store') }}">
    <div class="modal fade" id="modalDelete_Tambah" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}

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

                    <div class="form-group{{ $errors->has('nm_sekolah') ? ' has-error' : '' }}">
                        <label for="nm_sekolah" class="col-md-7 control-label">Nama Sekolah<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="nm_sekolah" type="text" class="form-control" name="nm_sekolah" value="" placeholder="Masukkan Nama Sekolah . . . . . ">
                            @if ($errors->has('nm_sekolah'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_sekolah') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('kepsek_sekolah') ? ' has-error' : '' }}">
                        <label for="kepsek_sekolah" class="col-md-7 control-label">Nama Kepala Sekolah<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="kepsek_sekolah" type="text" class="form-control" name="kepsek_sekolah" value="" placeholder="Masukkan Nama Kepala Sekolah . . . . . ">
                            @if ($errors->has('kepsek_sekolah'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kepsek_sekolah') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('kcmtn_sekolah') ? ' has-error' : '' }}">
                        <label for="kcmtn_sekolah" class="col-md-7 control-label">Kecamatan<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="kcmtn_sekolah" type="text" class="form-control" name="kcmtn_sekolah" value="" placeholder="Masukkan Kecamatan Sekolah. . . . . ">
                            @if ($errors->has('kcmtn_sekolah'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kcmtn_sekolah') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('hp_sekolah') ? ' has-error' : '' }}">
                        <label for="hp_sekolah" class="col-md-7 control-label">HP Sekolah<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="hp_sekolah" type="number" class="form-control" name="hp_sekolah" value="" placeholder="Masukkan HP Sekolah . . . . . ">
                            @if ($errors->has('hp_sekolah'))
                            <span class="help-block">
                                <strong>{{ $errors->first('hp_sekolah') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <!-- <div class="container  col-md-12">
                        <label>Status<b style="color:Tomato;">*</b></label>
                        <select required="required" name="status_trc" class="custom-select mb-3">
                            <option value="">-- Pilih Status --</option>
                            <option value="0">Down Payment</option>
                            <option value="1">Paid</option>
                        </select>
                    </div> -->


                    <!-- <div class="form-group col-md-12">
                        <label>Foto Profil <i>(kosongkan jika tidak ada)</i> </label>
                        <div class="col-md-12">
                            <img width="250" height="250" />
                            <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                        </div>
                    </div> -->


                    <div class="form-group col-md-12">
                        <label>Alamat <b style="color:Tomato;">*</b></label>
                        <textarea id="inputDescription" name="almt_sekolah" class="form-control col-md-12" placeholder="Masukkan Keterangan Sekolah . . . . . " rows="3"></textarea>
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