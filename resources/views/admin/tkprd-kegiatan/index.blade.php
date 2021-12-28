@extends('admin-template')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">{{$title}}</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <!--end col-->

            </div>
            <!--end row-->
        </div>
        <!--end page-title-box-->
    </div>
    <!--end col-->
</div>
<!--end row-->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">{{$title}}</h4>
            <div class="float-end">
                <a href="{{route('admin.tkprd.kegiatan.create')}}" class="btn btn-primary">+ Tambah TKPRD</a>
            </div>
        </div>
        <!--end card-header-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Investor</th>
                            <th>Catatan</th>
                            <th>Surat Permohonan</th>
                            <th>Kelola</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataTkprdKegiatan as $index => $item)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$item->tkprd_kegiatan}}</td>
                            <td>{{$item->tkprd_kegiatan_investor}}</td>
                            <td>{{$item->tkprd_kegiatan_catatan}}</td>
                            <td><a class="btn btn-primary btn-sm"
                                    href="{{asset('/tkprd/')}}/{{$item->tkprd_kegiatan_surat}}">Download</a>
                            </td>
                            <td><a class="btn btn-warning btn-sm"
                                    href="{{route('admin.tkprd.kegiatan.kelola',$item->id)}}">Kelola</a></td>
                            <td>
                                <a href="{{route('admin.tkprd.kegiatan.edit',$item->id)}}"
                                    class="btn btn-warning btn-sm"><i class="las la-pen font-16"></i></a>
                                <a href="{{route('admin.tkprd.kegiatan.delete',$item->id)}}"
                                    onclick="return confirm('yakin hapus?')" class="btn btn-danger btn-sm"><i
                                        class="las la-trash-alt font-16"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end /table-->
            </div>
            <!--end /tableresponsive-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div> <!-- end col -->
@endsection