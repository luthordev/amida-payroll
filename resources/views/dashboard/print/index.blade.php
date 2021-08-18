@extends('dashboard.theme.default')
@section('title', 'Cetak Slip Gaji')

@section('content')

<div class="mb-4 col-md-10">
    <div class="row">
        <div class="col-6">
            <select name="employee" id="employee" class="form-control" required>
                <option value="" selected disabled>
                    --- PILIH KARYAWAN ---
                </option>
                @foreach($employees as $e)
                <option value="{{$e->id}}">
                    {{$e->name}} [ {{$e->position}} - {{$e->division}} ]
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-3">
            <select name="month" id="month" class="form-control" required>
                <option value="" selected disabled>
                    --- PILIH BULAN ---
                </option>
                <option value="Januari" {{ $e->bank == 'BRI' ? 'selected' : '' }}>Januari</option>
                <option value="Februari">Februari</option>
                <option value="Maret">Maret</option>
                <option value="April">April</option>
                <option value="Mei">Mei</option>
                <option value="Juni">Juni</option>
                <option value="Juli">Juli</option>
                <option value="Agustus">Agustus</option>
                <option value="September">September</option>
                <option value="Oktober">Oktober</option>
                <option value="November">November</option>
                <option value="Desember">Desember</option>
            </select>
        </div>
        <div class="col-3">
            <button onclick="goPrint()" class="btn btn-primary">Cari</button>
        </div>
    </div>
</div>

<div id="preview"></div>

<script>
var route = ""

function goPrint() {
    var id = document.getElementById("employee").value;
    var month = document.getElementById("month").value;

    if (id == "" || month == "") return;

    route = "print/" + month + "/" + id;

    let preview = document.getElementById("preview").innerHTML =
        "<iframe name='frame' width='0' height='0' src='" + route +
        "'></iframe>"
    // document.getElementById("button").innerHTML =
    //     "<div><button onclick='printSlip()' class='btn btn-warning'>Print</button>  <button class='btn btn-success'>Export to PDF</button></div>"
    setTimeout(() => {
        if (typeof(preview) != 'undefined' && preview != null) printSlip()
    }, 500);

}

function printSlip() {
    //var page = window.open(route)
    frames['frame'].print()
}
</script>

@endsection