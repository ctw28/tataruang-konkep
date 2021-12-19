<div class="col-lg-3">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="card-title">Kategori</h4>
                </div>
                <!--end col-->

            </div>
            <!--end row-->
        </div>
        <!--end card-header-->
        <div class="card-body">
            <div class="files-nav">
                <div class="nav flex-column nav-pills" id="files-tab" aria-orientation="vertical">
                    <a class="nav-link @if($dokumenActive=='semua') active @endif" href="{{route('web.dokumen','semua')}}">
                        <i data-feather="folder" class="align-self-center icon-dual-file icon-sm me-3"></i>
                        <div class="d-inline-block align-self-center">
                            <h5 class="m-0">Semua Dokumen</h5>
                            <small>{{$dokumenTotal}} File</small>
                        </div>
                    </a>
                    @foreach ($dokumenKategori as $kategori)

                    <a class="nav-link @if ($dokumenActive==$kategori->dokumen_kategori_slug) active @endif" href="{{route('web.dokumen',$kategori->dokumen_kategori_slug)}}">

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