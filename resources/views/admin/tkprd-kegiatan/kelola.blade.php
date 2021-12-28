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
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h3>{{$data->tkprd_kegiatan}}</h3>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div> <!-- end col -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Survey</h3>
        </div>
        <div class="card-body">
            <a data-bs-toggle="modal" data-status="tambah" data-jenis="survey" data-bs-target="#exampleModalWarning"
                class="btn btn-success btn-sm" onclick="showForm(event)">+ Tambah
                Survey</a>
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Lokasi</th>
                            <th>Catatan</th>
                            <th>Kelola</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="survey-data">

                    </tbody>
                </table>
                <!--end /table-->
            </div>
            <!--end /tableresponsive-->
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div> <!-- end col -->
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3>Rapat</h3>
        </div>
        <div class="card-body">
            <a data-bs-toggle="modal" data-jenis="rapat" data-bs-target="#exampleModalWarning"
                class="btn btn-success btn-sm" onclick="showForm(event)">+ Tambah
                Rapat</a>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div> <!-- end col -->

<template id="form-survey">
    <div class="mb-3 row">
        <label for="example-text-input" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Tanggal
            Survey</label>
        <div class="col-sm-10">
            <input class="form-control" type="date" id="tkprd_survey_tanggal">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="example-text-input" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Lokasi</label>
        <div class="col-sm-10">
            <input class="form-control" type="text" id="tkprd_survey_lokasi" placeholder="Tuliskan Lokasi Survey">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="example-text-input" class="col-sm-2 form-label align-self-center mb-lg-0 text-end">Catatan /
            Keterangan</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="tkprd_survey_catatan" placeholder="Catatan (Optional)"></textarea>
        </div>
    </div>

    <div class="col-sm-10 ms-auto">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="simpan-survey">Tambah</button>
    </div>
</template>
<template id="form-rapat">
    ini form Rapat
</template>

<div class="modal fade" id="exampleModalWarning" tabindex="-1" role="dialog" aria-labelledby="exampleModalWarning1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title m-0 text-white" id="exampleModalWarning1">Tambah <span id="header-text"></span>
                </h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end modal-header-->
            <div class="modal-body" id="modal-form">

            </div>
            <!--end modal-body-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end modal-->
@endsection

@section('js')
<script>
loadSurveyData();
async function hapusSurvey(surveyId) {
    let konfirmasi = confirm('yakin hapus?')
    if (konfirmasi) {
        let url = "{{route('admin.tkprd.kegiatan.survey.delete',':id')}}";
        url = url.replace(':id', surveyId)
        response = await fetch(url)
        responseMessage = await response.json()
        console.log(responseMessage);
        if (responseMessage.status) {
            alert('data berhasil dihapus')
            return loadSurveyData()
        }
        alert('ada kesalahan, coba lagi')
    }
}
async function loadSurveyData() {
    let url = "{{route('admin.tkprd.kegiatan.survey.index',':id')}}";
    url = url.replace(':id', '{{$data->id}}')
    response = await fetch(url)
    responseMessage = await response.json()
    console.log(responseMessage);
    if (responseMessage.status) {
        const rowTable = document.querySelector('#survey-data')
        rowTable.innerHTML = ""
        responseMessage.data.forEach((data, i) => {
            let tr = document.createElement('tr')
            let tdNo = document.createElement('td')
            tdNo.innerHTML = i + 1
            let tdTgl = document.createElement('td')
            tdTgl.innerText = data.tkprd_survey_tanggal
            let tdLokasi = document.createElement('td')
            tdLokasi.innerText = data.tkprd_survey_lokasi
            let tdCatatan = document.createElement('td')
            tdCatatan.innerText = data.tkprd_survey_catatan
            let tdKelola = document.createElement('td')
            let tdAksi = document.createElement('td')
            let buttonKelola = document.createElement('a')
            let buttonEdit = document.createElement('button')
            let buttonDelete = document.createElement('button')

            buttonKelola.className = "btn btn-secondary btn-sm"
            buttonKelola.innerText = "Kelola"
            let url = "{{route('admin.tkprd.kegiatan.survey.kelola.index',[':kegiatanId',':surveyId'])}}"
            url = url.replace(':kegiatanId', '{{$data->id}}')
            url = url.replace(':surveyId', data.id)
            buttonKelola.href = url

            buttonEdit.innerHTML = "<i class='las la-pen font-16'></i>"
            buttonEdit.setAttribute('data-id', data.id)
            buttonEdit.setAttribute('data-status', 'edit')
            buttonEdit.setAttribute('data-jenis', 'survey')
            buttonEdit.setAttribute('data-bs-toggle', 'modal')
            buttonEdit.setAttribute('data-bs-target', '#exampleModalWarning')
            buttonEdit.setAttribute('onclick', 'showForm(event)')
            buttonEdit.className = "btn btn-warning btn-sm"

            buttonDelete.innerHTML = "<i class='las la-trash-alt font-16'></i>"
            buttonDelete.setAttribute('data-id', data.id)
            buttonDelete.className = "btn btn-danger btn-sm tombol-hapus"
            buttonDelete.setAttribute('onclick', `hapusSurvey(${data.id})`);

            tdKelola.appendChild(buttonKelola)
            tdAksi.appendChild(buttonEdit)
            tdAksi.appendChild(buttonDelete)
            tr.appendChild(tdNo)
            tr.appendChild(tdTgl)
            tr.appendChild(tdLokasi)
            tr.appendChild(tdCatatan)
            tr.appendChild(tdKelola)
            tr.appendChild(tdAksi)

            rowTable.appendChild(tr)
        });
        // optionPeserta.append(fragment);
    } else {
        alert('ada kesalahan, coba lagi');
    }
}

async function showForm(e) {
    // console.log(e.target.dataset.jenis)
    const headerText = document.querySelector('#header-text')
    headerText.innerHTML = ""
    if (e.target.dataset.jenis == "survey") {

        if (e.target.dataset.status == "tambah") {
            const form = document.querySelector('#modal-form');
            const templateLoader = document.querySelector("#form-survey")
            const firstClone = templateLoader.content.cloneNode(true)
            form.innerHTML = ""
            form.appendChild(firstClone)
            headerText.innerText = "Survey"
            document.querySelector('#simpan-survey').addEventListener('click', async function() {
                let url = "{{route('admin.tkprd.kegiatan.survey.store',':id')}}";
                url = url.replace(':id', '{{$data->id}}')
                let dataSend = new FormData()
                dataSend.append('_token', "{{ csrf_token() }}")
                dataSend.append('tkprd_survey_tanggal', document.querySelector('#tkprd_survey_tanggal')
                    .value)
                dataSend.append('tkprd_survey_lokasi', document.querySelector('#tkprd_survey_lokasi')
                    .value)
                dataSend.append('tkprd_survey_catatan', document.querySelector('#tkprd_survey_catatan')
                    .value)
                response = await fetch(url, {
                    method: "POST",
                    body: dataSend
                })
                responseMessage = await response.json()
                console.log(responseMessage);
                if (responseMessage.status) {
                    loadSurveyData();
                } else {
                    alert('ada kesalahan, coba lagi');
                }
            })
        }
        if (e.target.dataset.status == "edit") {
            const form = document.querySelector('#modal-form');
            const templateLoader = document.querySelector("#form-survey")
            const firstClone = templateLoader.content.cloneNode(true)
            form.innerHTML = ""
            form.appendChild(firstClone)
            headerText.innerText = "Survey"
            let url = "{{route('admin.tkprd.kegiatan.survey.get',[':kegiatanId',':surveyId'])}}"
            url = url.replace(':kegiatanId', '{{$data->id}}')
            url = url.replace(':surveyId', e.target.dataset.id)
            response = await fetch(url)
            responseMessage = await response.json()
            console.log(responseMessage);
            if (responseMessage.status) {
                document.querySelector('#tkprd_survey_tanggal').value = responseMessage.data.tkprd_survey_tanggal
                document.querySelector('#tkprd_survey_lokasi').value = responseMessage.data.tkprd_survey_lokasi
                document.querySelector('#tkprd_survey_catatan').value = responseMessage.data.tkprd_survey_catatan

                document.querySelector('#simpan-survey').addEventListener('click', async function() {
                    let url =
                        "{{route('admin.tkprd.kegiatan.survey.update',[':kegiatanId',':surveyId'])}}"
                    url = url.replace(':kegiatanId', '{{$data->id}}')
                    url = url.replace(':surveyId', e.target.dataset.id)
                    let dataSend = new FormData()
                    dataSend.append('_token', "{{ csrf_token() }}")
                    dataSend.append('tkprd_survey_tanggal', document.querySelector(
                        '#tkprd_survey_tanggal').value)
                    dataSend.append('tkprd_survey_lokasi', document.querySelector(
                            '#tkprd_survey_lokasi')
                        .value)
                    dataSend.append('tkprd_survey_catatan', document.querySelector(
                            '#tkprd_survey_catatan')
                        .value)
                    response = await fetch(url, {
                        method: "POST",
                        body: dataSend
                    })
                    responseMessage = await response.json()
                    console.log(responseMessage);
                    if (responseMessage.status) {
                        loadSurveyData();
                    } else {
                        alert('ada kesalahan, coba lagi');
                    }
                })
            }

        }


    } else if (e.target.dataset.jenis == "rapat") {
        const form = document.querySelector('#modal-form');
        const templateLoader = document.querySelector("#form-rapat")
        const firstClone = templateLoader.content.cloneNode(true)
        form.innerHTML = ""
        form.appendChild(firstClone)
        headerText.innerText = "Rapat"

    }

}
</script>
@endsection