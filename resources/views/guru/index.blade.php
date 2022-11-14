@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Guru</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Guru</li>
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
                        <h3>{{$total_guru->count()}}</h3>
                        <p>Total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$guru_pria->count()}}</h3>
                        <p>Pria</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$guru_wanita->count()}}</h3>
                        <p>Wanita</p>
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
                        <th class="text-center">NIP</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">UPDATE</th>
                        <th class="text-center col-md-2">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($gurus as $g)
                    <tr>
                        <td class="text-left">{{ $no++ }}</td>
                        <td class="text-left">
                            {{$g->nip}}
                        </td>
                        <td class="text-left">
                            {{$g->nm_guru}}
                        </td>
                        <td class="text-left">{{ $g->updated_at->diffForHumans()}}</td>
                        <td class="col-md-1">

                            <a data-toggle="modal" data-target="#modalShow_{{ $g->id }}" class="btn btn-warning btn-sm text-center">
                                <i class="fa fa-eye text-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#modalEdit_{{ $g->id }}" class="btn btn-secondary btn-sm text-center">
                                <i class="fas fa-edit  text-center"></i>
                            </a>
                            <a data-toggle="modal" data-target="#modalDelete_{{ $g->id }}" class="btn btn-danger btn-sm text-center">
                                <i class="fas fa-trash  text-center"></i>
                            </a>

                            <!-- Modal Show-->
                            <div class="modal fade bd-example-modal-m" id="modalShow_{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="background: #fff;">

                                        <div class="modal-header">
                                            <a type="button" class="btn btn-dark btn-sm" href=""><i class="fa fa-download"></i></a>
                                            <div class="col ">
                                                <p style="margin-bottom: 0">{{ $g->nip}}</p>
                                                <!-- <h6 class="font-weight-bold">I</h6> -->
                                            </div>
                                            <a type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></a>
                                        </div>

                                        <div class="modal-body">

                                            <div class="invoice p-3 mb-3">
                                                <div class="row invoice-info">

                                                    <div class="col-sm-6 invoice-col">
                                                        Nama Guru
                                                        <address>
                                                            <strong>{{$g->nm_guru}}</strong>

                                                        </address>
                                                    </div>

                                                    <!-- <div class="col-sm-12 invoice-col">
                                                        Alamat
                                                        <address>
                                                            <strong> {{$g->almt_guru}}, {{$g->kcmtn_guru}}</strong>
                                                        </address>
                                                    </div> -->

                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <tr>
                                                                    <th style="width:50%">Nama</th>
                                                                    <td>{{$g->nm_guru}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Dibuat</th>
                                                                    <td>{{ $g->created_at->diffForHumans()}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Diubah</th>
                                                                    <td>{{ $g->updated_at->diffForHumans()}}</td>
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
                                                            <strong>{{$g->nm_pengguna}}</strong>
                                                        </address>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!-- MODAL EDIT -->
                            <form method="POST" action="{{route('guru.update',$g->id)}}">
                                <div class="modal fade bd-example-modal-m" id="modalEdit_{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="background: #fff;">


                                            <div class="modal-header">
                                                <div class="col ">
                                                    <p style="margin-bottom: 0">{{$g->nm_guru}}</p>
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
                                                                        <th>Guru</th>
                                                                        <td>
                                                                            <input id="nm_guru" type="text" class="form-control" name="nm_guru" value="{{ $g->nm_guru }}">
                                                                            @if ($errors->has('nm_guru'))
                                                                            <span class="help-block">
                                                                                <strong>{{ $errors->first('nm_guru') }}</strong>
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
                            <form action="{{ route('guru.destroy', $g->id)}}" method="post">
                                <div class="modal fade" id="modalDelete_{{ $g->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
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

                                                <p>Apakah anda yakin ingin menghapus data <b>{{$g->nm_guru}}</b> ?</p>

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
<form method="POST" action="{{ route('guru.store') }}">
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

                    <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                        <label for="nip" class="col-md-7 control-label">NIP<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="nip" type="text" class="form-control" name="nip" value="{{ $kode }}" placeholder="Masukkan Nama Pengguna . . . . . " readonly="">
                            @if ($errors->has('nip'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nip') }}</strong>
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

                    <div class="form-group{{ $errors->has('nm_guru') ? ' has-error' : '' }}">
                        <label for="nm_guru" class="col-md-7 control-label">Nama Guru<b style="color:Tomato;">*</b> </label>
                        <div class="col-md-12">
                            <input id="nm_guru" type="text" class="form-control" name="nm_guru" value="" placeholder="Masukkan Nama guru . . . . . ">
                            @if ($errors->has('nm_guru'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nm_guru') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="container  col-md-12">
                        <label>JK<b style="color:Tomato;">*</b></label>
                        <select required="required" name="jk_guru" class="custom-select mb-3">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="P">Pria</option>
                            <option value="W">Wanita</option>
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