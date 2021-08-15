@extends('dashboard.theme.default')
@section('title', 'Data Jabatan')
@section('subtitle', 'Mengelola Data Jabatan')

@section('content')

<div class="card mb-4 col-md-2">
    <a href="{{url('dashboard/position/add')}}" class="btn btn-primary p-2">Tambah Jabatan</a>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Jabatan
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Tunjangan</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Jabatan</th>
                    <th>Gaji</th>
                    <th>Tunjangan</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($positions as $p)
                <tr>
                    <td class="align-middle">{{$p->position}}</td>
                    <td class="align-middle">@money($p->salary)</td>
                    <td class="align-middle">@money($p->allowance)</td>
                    <td class="text-center">
                        <a href="{{route('position.edit', $p->id)}}" class="btn btn-warning">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a href="{{route('position.delete', $p->id)}}" class="btn btn-danger">
                            <i class="fa fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection