@extends('admin-template')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Pengaturan Peta</h4>
    </div>
    <!--end card-header-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('admin.peta.random.color',$data->peta[0]->id)}}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Random Color</button>

                </form>
                <div class="table-responsive">
                    <table class="table table-striped mb-0" id="makeEditable">
                        <thead>
                            <tr>
                                <th>No</th>
                                @foreach ($header as $col)
                                <th>{{$col}}</th>
                                @endforeach
                                <!-- <th>Edit</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($body as $index=> $records)
                            <tr>
                                <td>{{$index+1}}</td>
                                @foreach($records as $ind=> $record)
                                @if($header[$ind]=="warna")
                                <td class="{{$header[$ind]}}">
                                    <div style="width:60px; height:20px; color:transparent; background-color:{{$record}};">{{$record}}</div>
                                </td>
                                @else
                                <td class="{{$header[$ind]}}">{{$record}}</td>
                                @endif
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
<script src="{{asset('/')}}plugins/tiny-editable/mindmup-editabletable.js"></script>
<!-- <script src="{{asset('/')}}plugins/tiny-editable/numeric-input-example.js"></script> -->
<script src="{{asset('/')}}plugins/bootable/bootstable.js"></script>
<!-- <script src="{{asset('/')}}assets/pages/jquery.tabledit.init.js"></script> -->

<script>
    $(function() {

        $('#makeEditable').SetEditable({
            // $addButton: $('#but_add')
        });
    });

    function rowEdit(but) {
        var $td = $("tr[id='editing'] td");
        // rowAcep($td)
        var $row = $(but).parents('tr');
        var $cols = $row.find('td');
        if (ModoEdicion($row)) return; //Ya estÃ¡ en ediciÃ³n
        //Pone en modo de ediciÃ³n
        IterarCamposEdit($cols, function($td) { //itera por la columnas
            // console.log($td[0].classList.value);
            if ($td[0].classList.value !== "") {
                let cont = $td.html(); //lee contenido
                let div = "";
                let input = "";
                if ($td[0].classList.value == "warna") {
                    // console.log($td[0].firstElementChild.style.backgroundColor);
                    div = '<div style="display: none;">' + cont + '</div>'; //guarda contenido
                    input = `<input type="color" id="colorpicker" value="${$td[0].firstElementChild.innerText}">`;
                } else {
                    div = '<div style="display: none;">' + cont + '</div>'; //guarda contenido
                    input = '<input class="form-control input-sm"  value="' + cont + '">';
                }
                $td.html(div + input); //fija contenido

            }
        });
        FijModoEdit(but);
    }

    async function rowAcep(but) {
        var $row = $(but).parents('tr');
        var $cols = $row.find('td');
        let data = []
        if (!ModoEdicion($row)) return;
        IterarCamposEdit($cols, function($td) {
            if ($td[0].classList.value !== "") {
                let cont = $td.find('input').val();
                let item = {}
                let key = $td[0].classList.value
                item[key] = cont
                data.push(item);
                if ($td[0].classList.value == "warna")
                    $td.html(`<div style="width:60px; height:20px; color:transparent; background-color:${cont};">${cont}</div>`);
                else
                    $td.html(cont);

            }
        });
        console.log(data);
        // console.log(Object.assign({}, data));
        // return
        let dataSend = new FormData()
        // dataSend.append('id', [])
        dataSend.append('data', JSON.stringify(data))
        let response = await fetch("{{route('admin.peta.edit.properties',$data->peta[0]->id)}}", {
            method: "POST",
            body: dataSend
        })
        let responseMessage = await response.json()
        // console.log(responseMessage);
        FijModoNormal(but);
        params.onEdit($row);
        alert(responseMessage.status)
    }
</script>
@endsection