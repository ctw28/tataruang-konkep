@extends('admin-template')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Kategori Dokumen</h4>
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="row">
                    <form action="{{route('admin.dokumen.kategori.store')}}" method="POST" class="form-horizontal form-label-left">
                        @csrf
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Nama Kategori</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="dokumen_kategori_nama" placeholder="Tuliskan Nama Kategori">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="peta_kategori_deskripsi" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Deskripsi / Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="peta_kategori_deskripsi" name="dokumen_kategori_keterangan" placeholder="Ketikkan Deskripsi (Optional)"></textarea>
                            </div>
                        </div>
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