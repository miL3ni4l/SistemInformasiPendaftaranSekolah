@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Siswa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Siswa</li>
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
                        <h3>{{$total_siswa->count()}}</h3>
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
                        <h3>5</h3>
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
                        <h3>6</h3>
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
                        <th class="text-center">NAMA</th>
                        <th class="text-center">UPDATE</th>
                        <th class="text-center col-md-2">OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($siswas as $s)
                    <tr>
                        <td class="text-left">{{ $no++ }}</td>
                        <td class="text-left">
                            {{$s->pendaftaran_relation->nm_pendaftar}}
                        </td>
                        <td class="text-left">{{ $s->updated_at->diffForHumans()}}</td>
                        <td class="col-md-1">


                            <a data-toggle="modal" data-target="#modalDelete_{{ $s->id }}" class="btn btn-danger btn-sm text-center">
                                <i class="fas fa-trash  text-center"></i>
                            </a>


                            <!-- Modal Hapus-->
                            <form action="{{ route('siswa.destroy', $s->id)}}" method="post">
                                <div class="modal fade" id="modalDelete_{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
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

                                                <p>Apakah anda yakin ingin menghapus data <b>{{$s->nm_pendaftar}}</b> ?</p>

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
<form method="POST" action="{{ route('siswa.store') }}">
    <div class="modal fade" id="modalDelete_Tambah" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
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

                    <div class="form-group col-md-12">
                        <label>Siswa <b style="color:Tomato;">*</b></label>
                        <select required="required" name="pendaftaran_id" class="custom-select mb-3">
                            <option value="">-- Pilih Siswa --</option>
                            @php
                            $no = 1;
                            @endphp

                            @foreach($pendaftarans_create as $p)
                            <option value="{{$p->id}}">
                                {{ $no++ }}. {{$p->nm_pendaftar}}
                            </option>
                            @endforeach

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