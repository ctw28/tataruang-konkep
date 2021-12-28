@extends('admin-template')

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

</style>
@endsection
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

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h3>{{$kegiatan->tkprd_kegiatan}}</h3>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div> <!-- end col -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h5>Survey Tanggal : {{\Carbon\Carbon::parse($survey->tkprd_survey_tanggal)->format('d M Y')}}</h5>
            <h5>Lokasi : {{$survey->tkprd_survey_lokasi}}</h5>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div> <!-- end col -->

@foreach ($kategoriFile as $row)
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4>{{$row->survey_file_kategori}}</h4>
        </div>

        <div class="card-body">
            <a data-bs-toggle="modal" data-bs-target="#exampleModalWarning" class="btn btn-primary btn-sm"
                onclick="setKategori('{{$row->id}}')">Tambah
                {{$row->survey_file_kategori}}</a>
            <div class="col-sm-12 mt-3">
                @if($row->id==1)
                <div class="row" id="image-list" style="text-align:center">
                </div>
                @else
                <div class="row">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dokumen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="document-list">

                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div> <!-- end col -->
@endforeach

<div class="modal fade" id="exampleModalWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalWarning1"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h6 class="modal-title m-0 text-white" id="exampleModalWarning1">Upload File</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body">
                <div class="mb-3 row">
                    <form method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <label for="example-text-input" class="col-sm-12 form-label align-self-center mb-lg-0 ">Upload
                            File (bisa lebih dari
                            1 file)</label>
                        <div class="col-sm-10">
                            <input class="form-control mt-2" type="file" name="files[]" id="files" multiple>
                            <!-- <input class="form-control" type="file" id="tkprd_survey_tanggal" onchange="uploadFile(event)"
                            multiple> -->
                        </div>
                        <div class="text-end">

                            <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal"
                                onclick="uploadFile()">Upload</button>
                            <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end modal-->

<template id='loading-status'>
    <i class="fa fa-circle-o-notch fa-spin"></i>
</template>
@endsection

@section('js')
<script>
let kategoriId = 0;
loadFiles(1)
loadFiles(2)
async function loadFiles(kategoriId) {

    const imageContainer = document.querySelector('#image-list')
    const documentContainer = document.querySelector('#document-list')
    if (kategoriId == '1') {
        imageContainer.innerHTML =
            '<i class="fa fa-circle-o-notch fa-spin"></i> <span>Mohon Tunggu, sedang mengambil data</span>'
    } else {
        documentContainer.innerHTML =
            '<i class="fa fa-circle-o-notch fa-spin"></i> <span>Mohon Tunggu, sedang mengambil data</span>';

    }
    let url = " {{route('admin.tkprd.kegiatan.survey.kelola.get',[':kegiatanId',':surveyId',':kategoriId'])}}"
    url = url.replace(':kegiatanId', '{{$kegiatan->id}}')
    url = url.replace(':surveyId', '{{$survey->id}}')
    url = url.replace(':kategoriId', kategoriId)
    response = await fetch(url)
    responseMessage = await response.json()
    console.log(responseMessage);
    if (responseMessage.status) {
        if (kategoriId == '1') {
            let fragment = document.createDocumentFragment();

            responseMessage.data.kategoriFile[0].tkprd_survey_file.forEach((data, i) => {
                const img = document.createElement('img');
                const div = document.createElement('div');
                const link = document.createElement('button');
                div.className = 'col-sm-2'
                img.className = "rounded"
                img.setAttribute('height', "200px")
                img.setAttribute('width', "100%")
                img.src = '{{asset("survey/")}}/' + data.tkprd_survey_file_path
                link.setAttribute('onclick', `hapus(event, ${data.id})`)
                link.textContent = "hapus"
                link.className = "btn btn-danger btn-sm my-2"
                div.appendChild(img)
                div.appendChild(link)
                fragment.appendChild(div)
                // imageContainer.appendChild(div)
            })
            imageContainer.innerHTML = ''

            imageContainer.appendChild(fragment)
            return
        } else if (kategoriId == '2') {
            let fragment = document.createDocumentFragment();
            responseMessage.data.kategoriFile[0].tkprd_survey_file.forEach((data, i) => {
                const tr = document.createElement('tr');
                const tdNo = document.createElement('td');
                const tdName = document.createElement('td');
                const tdAksi = document.createElement('td');
                tdNo.appendChild(document.createTextNode(i + 1))
                tdName.appendChild(document.createTextNode(data.tkprd_survey_file_path))
                tdAksi.appendChild(document.createTextNode('hapus'))
                tr.appendChild(tdNo)
                tr.appendChild(tdName)
                tr.appendChild(tdAksi)
                fragment.appendChild(tr)

                // documentContainer.appendChild(tr)
            })
            documentContainer.innerHTML = ''
            documentContainer.appendChild(fragment)
            return
        }
    }
    return alert('gagal mengambil data, coba refresh halaman')

}

function setKategori(id) {
    kategoriId = id
}
//ini komen
async function uploadFile() {
    console.log(kategoriId);
    let url =
        "{{route('admin.tkprd.kegiatan.survey.kelola.store',[':kegiatanId',':surveyId'])}}";
    url = url.replace(':kegiatanId', '{{$kegiatan->id}}')
    url = url.replace(':surveyId', '{{$survey->id}}')
    // let files = []
    let dataUpload = document.querySelector('#files').files
    dataUpload.forEach(async function(data, i) {
        const formInput = document.querySelector('form');
        let dataSend = new FormData()
        dataSend.append('_token', "{{ csrf_token() }}")
        dataSend.append('kategori', kategoriId)
        dataSend.append('formnya', data)
        response = await fetch(url, {
            method: "POST",
            body: dataSend
        })
        responseMessage = await response.json()
        if (i == dataUpload.length - 1)
            loadFiles(kategoriId)
    });
}


async function hapus(e, fileId) {
    // alert(fileId);
    if (confirm('yakin hapus?')) {
        let url = "{{route('admin.tkprd.kegiatan.survey.kelola.delete',':fileId')}}"
        url = url.replace(':fileId', fileId)
        response = await fetch(url)
        responseMessage = await response.json()
        console.log(responseMessage);
        if (responseMessage.status)
            return loadFiles(1)
        return alert("ada kesalahan coba lagi")
    }
}
</script>
@endsection