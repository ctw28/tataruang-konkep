@extends('admin-template')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Peta</h4>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('admin.peta.store',$petaKategori->id)}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="peta_kategori_id" id="peta_kategori_id" value="{{$petaKategori->id}}">
                    <div class="mb-3 row">
                        <label for="peta_nama" class="col-sm-2 form-label align-self-center mb-lg-0">Nama Peta</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="peta_nama" id="peta_nama" placeholder="Ketikkan Nama Peta">
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="peta_deskripsi" class="col-sm-2 form-label align-self-center mb-lg-0">Deskripsi / Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="peta_deskripsi" name="peta_deskripsi" placeholder="Ketikkan Deskripsi (Optional)"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="peta_deskripsi" class="col-sm-2 form-label align-self-center mb-lg-0">Upload Files</label>
                        <div class="col-sm-10">
                            <input type="file" name="files[]" id="files" multiple />
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

@section('js')
<!-- <script src="{{asset('/')}}plugins/dropify/js/dropify.min.js"></script>
<script src="{{asset('/')}}assets/pages/jquery.form-upload.init.js"></script> -->

@endsection