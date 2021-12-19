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
                <h4 class="card-title">Data Survey</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <form action="{{route('admin.survey.store')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Nama Survey</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="survey_nama" placeholder="Tuliskan Nama Survey">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Tanggal Survey</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="survey_tanggal" placeholder="Tanggal Survey">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Lokasi Survey</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="survey_lokasi" placeholder="Lokasi Survey">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Catatan / Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="survey_catatan"></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="survey_file" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Upload File Survey</label>
                            <div class="col-sm-10">
                                <input type="file" name="files[]" id="survey_file" multiple />
                            </div>
                        </div>
                        <!-- <div class="mb-3 row">
                            <label for="peta_kategori_deskripsi" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Deskripsi / Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="peta_kategori_deskripsi" name="dokumen_kategori_keterangan" placeholder="Ketikkan Deskripsi (Optional)"></textarea>
                            </div>
                        </div> -->
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
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