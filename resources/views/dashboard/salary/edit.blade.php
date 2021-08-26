@extends('dashboard.theme.default')
@section('title', 'Tambah Jabatan')

@section('content')

<div class="mb-4 col-md-12">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br />
    @endif
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="employee">Nama Karyawan</label>
                    <input type="text" name="employee" id="employee" class="form-control" value="{{$salary->name}}"
                        disabled />
                </div>
            </div>
        </div>
    </div>
    <hr />
    <form action="{{ route('salary.update', $salary->id) }}" method="post">
        @method('PATCH')
        @csrf
        <input type="number" name="salary_id" id="salary_id" value="{{$salary->id}}" hidden />
        <div class="row">
            <div class="col-md-6">
                <div><b>PENGHASILAN</b></div>
                <div id="list-penghasilan">
                    @foreach($penghasilan as $name => $value)
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" name="penghasilan-a[]" placeholder="Penghasilan"
                                value="{{$name}}" required>
                        </div>
                        <input type="text" class="form-control uang" name="penghasilan-b[]" placeholder="Nominal"
                            value="{{$value}}" required>
                    </div>
                    @endforeach
                </div>
                <div class="input-group mt-3">
                    <button type="button" onclick="penghasilan()" class="btn btn-success">Tambah Penghasilan <i
                            class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="col-md-6">
                <div><b>POTONGAN</b></div>
                <div id="list-potongan">
                    @foreach($potongan as $name => $value)
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" name="potongan-a[]" placeholder="Potongan"
                                value="{{$name}}" required>
                        </div>
                        <input type="text" class="form-control uang" name="potongan-b[]" placeholder="Nominal"
                            value="{{$value}}" required>
                    </div>
                    @endforeach
                </div>
                <div class="input-group mt-3">
                    <button type="button" onclick='potongan()' class="btn btn-success">Tambah Potongan <i
                            class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <hr />
        <button class="btn btn-primary float-right">Submit</button>
    </form>
</div>

<script>
$(document).ready(function() {

    $('.uang').mask('000.000.000.000', {
        reverse: true
    });

})

function penghasilan() {
    let penghasilan = document.getElementById('list-penghasilan')
    let div = document.createElement('div')
    div.className = "input-group mt-3"
    let input =
        `<div class = 'input-group-prepend'><input type = 'text'class = 'form-control' name = 'penghasilan-a[]' placeholder = 'Penghasilan' required></div> <input type = 'text' class = 'form-control uang' name = 'penghasilan-b[]' placeholder = 'Nominal' required>`
    div.innerHTML += input;
    penghasilan.appendChild(div)

    $('.uang').mask('000.000.000.000', {
        reverse: true
    });
}

function potongan() {
    let potongan = document.getElementById('list-potongan')
    let div = document.createElement('div')
    div.className = "input-group mt-3"
    let input =
        `<div class = 'input-group-prepend'><input type = 'text'class = 'form-control' name = 'potongan-a[]' placeholder = 'Potongan' required></div> <input type = 'text' class = 'form-control uang' name = 'potongan-b[]' placeholder = 'Nominal' required>`
    div.innerHTML += input;
    potongan.appendChild(div)

    $('.uang').mask('000.000.000.000', {
        reverse: true
    });
}
</script>

@endsection