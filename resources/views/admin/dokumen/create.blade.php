@extends('admin-template')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Dokumen</h4>
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('admin.dokumen.store',$dokumenKategori->id)}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="dokumen_nama" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Nama
                            Dokumen</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="dokumen_nama" name="dokumen_nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dokumen_tanggal" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Tanggal Dokumen</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="date" id="dokumen_tanggal" name="dokumen_tanggal">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dokumen_file" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">File (.pdf, maks.
                            5MB)</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="dokumen_file" name="dokumen_file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="dokumen_keterangan" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="dokumen_keterangan" name="dokumen_keterangan"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-10 ms-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end card-body-->
</div>
<!--end card-->
@endsection