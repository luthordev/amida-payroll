@extends('dashboard.theme.default')
@section('title', 'Data Gaji')
@section('subtitle', 'Edit Data Gaji')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Gaji
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Bulan</th>
                    <th>Tahun</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($salary as $s)
                <tr>
                    <td class="align-middle">{{$s->name}}</td>
                    <td class="align-middle">{{$s->bulan}}</td>
                    <td class="align-middle">{{$s->tahun}}</td>
                    <td class="text-center">
                        <a href="{{route('salary.edit', $s->id)}}" class="btn btn-warning">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection