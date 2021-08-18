@extends('dashboard.theme.default')
@section('title', 'Tambah Karyawan')

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
    <form action="{{route('employee.add')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="nik">NIK</label>
                    <input type="number" name="nik" id="nik" class="form-control" required />
                </div>
                <div class="form-group mt-2">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" required />
                </div>
                <div class="form-group mt-2">
                    <label for="bank">Bank</label>
                    <select name="bank" id="bank" class="form-control" required>
                        <option value="" selected disabled>--- PILIH BANK ---</option>
                        <option value="BRI">BRI</option>
                        <option value="MANDIRI">MANDIRI</option>
                        <option value="BCA">BCA</option>
                        <option value="BNI">BNI</option>
                        <option value="BTN">BTN</option>
                        <option value="DANAMON">DANAMON</option>
                        <option value="PERMATA">PERMATA</option>
                        <option value="MAYBANK">MAYBANK</option>
                        <option value="CIMB NIAGA">CIMB NIAGA</option>
                        <option value="OCBC NISP">OCBC NISP</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="no_bank_account">Nomor Rekening</label>
                    <input type="number" name="no_bank_account" id="no_bank_account" class="form-control" required />
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mt-2">
                    <label for="position">Jabatan</label>
                    <select name="position" id="position" class="form-control" required>
                        <option value="" selected disabled>--- PILIH JABATAN ---</option>
                        @foreach($positions as $p)
                        <option value="{{$p->id}}">{{$p->position}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="division">Divisi</label>
                    <select name="division" id="division" class="form-control" required>
                        <option value="" selected disabled>--- PILIH DIVISI ---</option>
                        @foreach($divisions as $d)
                        <option value="{{$d->id}}">{{$d->division}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="" selected disabled>--- PILIH STATUS ---</option>
                        <option value="Tetap">Tetap</option>
                        <option value="PKWT">PKWT</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection