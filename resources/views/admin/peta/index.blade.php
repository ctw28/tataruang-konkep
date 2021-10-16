@extends('admin-template')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Peta</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">kategori Peta</li>
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
<div class="row">
    @include('admin.peta.navigasi')
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-9">
                        <h4 class="card-title">Kategori {{$petaKategoriDetail[0]->peta_kategori_nama}}</h4>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-3 text-end">
                        <a href="{{route('admin.peta.create',$petaKategoriDetail[0]->id)}}" class="btn btn-primary btn-sm">+ Tambah Peta</a>
                    </div>
                </div>
                <!-- <p class="text-muted mb-0">
                    Use <code>.table-striped</code> to add zebra-striping to any table row
                    within the <code>&lt;tbody&gt;</code>.
                </p> -->
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peta</th>
                                <th>Setting</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($petaKategoriDetail[0]->peta) == 0)
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data</td>
                            </tr>
                            @else
                            @foreach ($petaKategoriDetail[0]->peta as $index => $peta)

                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$peta->peta_nama}}</td>
                                <td><a href="{{route('admin.peta.show',[$petaKategoriDetail[0]->id,$peta->id])}}" class="btn btn-dark btn-sm ">Pengaturan</a></td>
                                <td class="text-end">
                                    <a href="#"><i class="las la-pen text-secondary font-16"></i></a>
                                    <a href="#"><i class="las la-trash-alt text-secondary font-16"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

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

</div>
<!--end row-->

@endsection