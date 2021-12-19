@extends('admin-template')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Kategori</h4>
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('admin.peta.kategori.store')}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="peta_kategori_nama" class="col-sm-2 form-label align-self-center mb-lg-0">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="peta_kategori_nama" id="peta_kategori_nama" placeholder="Ketikkan Nama Kategori">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="peta_kategori_deskripsi" class="col-sm-2 form-label align-self-center mb-lg-0">Deskripsi / Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="peta_kategori_deskripsi" name="peta_kategori_deskripsi" placeholder="Ketikkan Deskripsi (Optional)"></textarea>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-10 ms-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <!--end card-body-->
</div>
<!--end card-->
@endsection