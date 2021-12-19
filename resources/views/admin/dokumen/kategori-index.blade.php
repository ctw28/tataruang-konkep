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
                        <li class="breadcrumb-item active">kategori {{$title}}</li>
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
                <a href="{{route('admin.dokumen.kategori.create')}}" class="btn btn-primary">+ Tambah Kategori</a>
            </div>
        </div>
        <!--end card-header-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Dokumen</th>
                            <th>Jumlah Dokumen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokumenKategori as $index => $item)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$item->dokumen_kategori_nama}}</td>
                            <td>{{$item->dokumen_count}}</td>
                            <td>
                                <a href="{{route('admin.dokumen.index',$item->id)}}" class="btn btn-primary btn-sm"><i class="las la-cog font-16"></i></a>
                                <a href="#" class="btn btn-warning btn-sm"><i class="las la-pen font-16"></i></a>
                                <a href="#" class="btn btn-danger btn-sm"><i class="las la-trash-alt font-16"></i></a>
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