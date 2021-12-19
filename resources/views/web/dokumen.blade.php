@extends('web/web-template')

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
                <!-- <div class="col-auto align-self-center">
                    

                </div> -->
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
    @include('web.dokumen.navigasi')

    <div class="col-lg-9">
        <div class="">
            <div class="tab-content" id="files-tabContent">

                <div class="tab-pane fade show active" id="files-projects">
                    <h4 class="card-title mt-0 mb-3">{{$dataDokumenJudul}}</h4>
                    <div class="file-box-content mt-2">
                        @if (count($dataDokumen) == 0)
                        Tidak Ada file
                        @else
                        @foreach ($dataDokumen as $dokumen)

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