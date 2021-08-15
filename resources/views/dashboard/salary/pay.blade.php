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
    @foreach($employee as $e)
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="employee">Nama Karyawan</label>
                    <input type="text" name="employee" id="employee" class="form-control" value="{{$e->name}}"
                        disabled />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group mt-2">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{$e->position}}"
                        disabled />
                </div>
            </div>
        </div>
    </div>
    <hr />
    <form action="{{ route('salary.add') }}" method="post">
        @csrf
        <input type="number" name="employee_id" id="employee_id" value="{{$e->id}}" hidden />
        <div class="row">
            <div class="col-md-6">
                <div><b>PENGHASILAN</b></div>
                <div id="list-penghasilan">
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" name="penghasilan-a[]" placeholder="Penghasilan"
                                required>
                        </div>
                        <input type="number" class="form-control" name="penghasilan-b[]" placeholder="Nominal" min="0"
                            required>
                    </div>
                </div>
                <div class="input-group mt-3">
                    <button type="button" onclick="penghasilan()" class="btn btn-success">Tambah Penghasilan <i
                            class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="col-md-6">
                <div><b>POTONGAN</b></div>
                <div id="list-potongan">
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" name="potongan-a[]" placeholder="Potongan" required>
                        </div>
                        <input type="number" class="form-control" name="potongan-b[]" placeholder="Nominal" min="0"
                            required>
                    </div>
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
    @endforeach
</div>

<script>
function penghasilan() {
    let penghasilan = document.getElementById('list-penghasilan')
    let div = document.createElement('div')
    div.className = "input-group mt-3"
    let input =
        `<div class = 'input-group-prepend'><input type = 'text'class = 'form-control' name = 'penghasilan-a[] placeholder = 'Penghasilan' required></div> <input type = 'number' class = 'form-control' name = 'penghasilan-b[]' placeholder = 'Nominal' min='0' required>`
    div.innerHTML += input;
    penghasilan.appendChild(div)
    penghasilan_no++
}

function potongan() {
    let potongan = document.getElementById('list-potongan')
    let div = document.createElement('div')
    div.className = "input-group mt-3"
    let input =
        `<div class = 'input-group-prepend'><input type = 'text'class = 'form-control' name = 'potongan-a[]' placeholder = 'Potongan' required></div> <input type = 'number' class = 'form-control' name = 'potongan-b[]' placeholder = 'Nominal' min='0' required>`
    div.innerHTML += input;
    potongan.appendChild(div)
    potongan_no++
}
</script>

@endsection