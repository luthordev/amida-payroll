@extends('dashboard.theme.default') 
@section('title', 'Edit Karyawan')

@section('content')

<div class="mb-4 col-md-12">
    @foreach($employees as $e)
    <form action="{{route('employee.update', $e->id)}}" method="post">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group mt-2">
                    <label for="nik">NIK</label>
                    <input
                        type="number"
                        name="nik"
                        id="nik"
                        class="form-control"
                        value="{{$e->nik}}"
                        required
                    />
                </div>
                <div class="form-group mt-2">
                    <label for="name">Nama</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        value="{{$e->name}}"
                        required
                    />
                </div>
                <div class="form-group mt-2">
                    <label for="bank">Bank</label>
                    <select name="bank" id="bank" class="form-control" required>
                        <option value="" selected disabled>--- PILIH BANK ---</option>
                        <option value="BRI" {{ $e->bank == 'BRI' ? 'selected' : '' }}>BRI</option>
                        <option value="MANDIRI" {{ $e->bank == 'MANDIRI' ? 'selected' : '' }}>MANDIRI</option>
                        <option value="BCA" {{ $e->bank == 'BCA' ? 'selected' : '' }}>BCA</option>
                        <option value="BNI" {{ $e->bank == 'BNI' ? 'selected' : '' }}>BNI</option>
                        <option value="BTN" {{ $e->bank == 'BTN' ? 'selected' : '' }}>BTN</option>
                        <option value="DANAMON" {{ $e->bank == 'DANAMON' ? 'selected' : '' }}>DANAMON</option>
                        <option value="PERMATA" {{ $e->bank == 'PERMATA' ? 'selected' : '' }}>PERMATA</option>
                        <option value="MAYBANK" {{ $e->bank == 'MAYBANK' ? 'selected' : '' }}>MAYBANK</option>
                        <option value="CIMB NIAGA" {{ $e->bank == 'CIMB NIAGA' ? 'selected' : '' }}>CIMB NIAGA</option>
                        <option value="OCBC NISP" {{ $e->bank == 'OCBC NISP' ? 'selected' : '' }}>OCBC NISP</option>
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group mt-2">
                    <label for="no_bank_account">Nomor Rekening</label>
                    <input
                        type="number"
                        name="no_bank_account"
                        id="no_bank_account"
                        class="form-control"
                        value="{{$e->no_bank_account}}"
                        required
                    />
                </div>
                <div class="form-group mt-2">
                    <label for="position">Jabatan</label>
                    <select name="position" id="position" class="form-control" required>
                        <option value="" selected disabled>--- PILIH JABATAN ---</option>
                        @foreach($positions as $p)
                        <option value="{{$p->id}}" {{ $e->position_id == $p->id ? 'selected' : '' }}>{{$p->position}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="division">Divisi</label>
                    <select name="division" id="division" class="form-control" required>
                        <option value="" selected disabled>--- PILIH DIVISI ---</option>
                        @foreach($divisions as $d)
                        <option value="{{$d->id}}" {{ $e->division_id == $d->id ? 'selected' : '' }}>{{$d->division}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @endforeach
</div>

@endsection
