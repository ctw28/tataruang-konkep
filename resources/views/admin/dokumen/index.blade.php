@extends('admin-template')

@section('content')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="row">
                <div class="col">
                    <h4 class="page-title">Dokumen</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dokumen</li>
                    </ol>
                </div>
                <!--end col-->
                <div class="col-auto align-self-center">
                    <button class="btn btn-outline-primary btn-sm add-file"><i class="fas fa-plus me-2 "></i>Tambah
                        kategori Baru</button>
                    <div class="add-file btn btn-outline-primary btn-sm position-relative overflow-hidden">
                        <i class="las la-cloud-upload-alt me-2 font-15"></i>Upload File
                        <input type="file" name="file" class="add-file-input" />
                    </div>
                    <input id="Add_File" type="file" name="files[]" multiple style='display: none;'>

                    <a href="#" class="btn btn-sm btn-outline-primary">
                        <i data-feather="download" class="align-self-center icon-xs"></i>
                    </a>
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
<!-- end page title end breadcrumb -->
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title">Kategori</h4>
                    </div>
                    <!--end col-->
                    <div class="col-auto">
                        <div class="dropdown">
                            <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <!-- <i class="las la-menu align-self-center text-muted icon-xs"></i>  -->
                                <i class="mdi mdi-dots-horizontal text-muted"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Create Folder</a>
                                <a class="dropdown-item" href="#">Delete</a>
                                <a class="dropdown-item" href="#">Settings</a>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </div>
            <!--end card-header-->
            <div class="card-body">
                <div class="files-nav">
                    <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                        <a class="nav-link @if($data['dokumenActive']=='semua') active @endif"
                            href="{{route('admin.dokumen.index','semua')}}">
                            <i data-feather="folder" class="align-self-center icon-dual-file icon-sm me-3"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">Semua Dokumen</h5>
                                <small>{{$data['dokumenTotal']}} File</small>
                            </div>
                        </a>

                        @foreach ($data['dokumenKategori'] as $kategori)

                        <a class="nav-link @if ($data['dokumenActive']==$kategori->dokumen_kategori_slug) active @endif"
                            href="{{route('admin.dokumen.index',$kategori->dokumen_kategori_slug)}}">

                            <i data-feather="folder" class="align-self-center icon-dual-file icon-sm me-3"></i>
                            <div class="d-inline-block align-self-center">
                                <h5 class="m-0">{{$kategori->dokumen_kategori_nama}}</h5>
                                <small>{{$kategori->dokumen_count}} File</small>
                            </div>
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->

    </div>
    <!--end col-->

    <div class="col-lg-9">
        <div class="">
            <div class="tab-content" id="files-tabContent">

                <div class="tab-pane fade show active" id="files-projects">
                    <h4 class="card-title mt-0 mb-3">{{$data['dataDokumenJudul']}}</h4>
                    <div class="file-box-content">
                        @if (count($data['dataDokumen']) == 0)
                        Tidak Ada file
                        @else
                        @foreach ($data['dataDokumen'] as $dokumen)

                        <div class="file-box">
                            <a href="#" class="download-icon-link">
                                <i class="dripicons-download file-download-icon"></i>
                            </a>
                            <div class="text-center">
                                <i class="lar la-file-pdf text-primary"></i>
                                <h6 class="text-truncate" title="{{$dokumen->dokumen_nama}}">{{$dokumen->dokumen_nama}}
                                </h6>
                                <small class="text-muted">{{$dokumen->created_at}}</small>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>


                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
            <!--end card-body-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    @endsection