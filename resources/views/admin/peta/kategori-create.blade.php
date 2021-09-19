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
                <form action="{{route('admin.dokumen.store')}}" method="POST" class="form-horizontal form-label-left">
                    @csrf
                    <div class="mb-3 row">
                        <label for="peta_kategori_nama" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Nama
                            Kategori</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" id="peta_kategori_nama" name="peta_kategori_nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="peta_kategori_deskipsi"
                            class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Deskripsi / Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="peta_kategori_deskipsi" name="peta_kategori_deskipsi"></textarea>
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