@extends('dashboard.theme.default')
@section('title', 'Data Gaji')
@section('subtitle', 'Mengelola Data Gaji')

@section('content')

<div class="card mb-4 col-md-2">
    <a href="{{url('dashboard/salary/data')}}" class="btn btn-success p-2">Edit Data Gaji</a>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Karyawan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($employees as $e)
                <tr>
                    <td class="align-middle">{{$e->name}}</td>
                    <td class="align-middle">{{$e->position->position}}</td>
                    <td class="align-middle">{{$e->division->division}}</td>
                    <td class="text-center">
                        <a href="{{route('salary.pay', $e->id)}}" class="btn btn-success">
                            <i class="fa fa-money-bill-wave"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection