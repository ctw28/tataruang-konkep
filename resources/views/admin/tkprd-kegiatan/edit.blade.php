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
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Edit TKPRD</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <form action="{{route('admin.tkprd.kegiatan.update',$data->id)}}" method="POST"
                        class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="example-text-input"
                                class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Nama Kegiatan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="tkprd_kegiatan"
                                    placeholder="Tuliskan Nama Kegiatan" value="{{$data->tkprd_kegiatan}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input"
                                class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Investor</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="tkprd_kegiatan_investor"
                                    placeholder="Tuliskan Nama Investor" value="{{$data->tkprd_kegiatan_investor}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input"
                                class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Surat Permohonan</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="surat_permohonan">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input"
                                class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Catatan /
                                Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="tkprd_kegiatan_catatan"
                                    placeholder="Catatan (Optional)">{{$data->tkprd_kegiatan_catatan}}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-10 ms-auto">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection