@extends('dashboard.theme.default') 
@section('title', 'Data Divisi')
@section('subtitle', 'Mengelola Data Divisi') 

@section('content')

<div class="card mb-4 col-md-2">
    <a href="{{url('dashboard/division/add')}}" class="btn btn-primary p-2"
        >Tambah Divisi</a
    >
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Data Divisi
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Nama Divisi</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nama Divisi</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($divisions as $d)
                <tr>
                    <td class="align-middle">{{$d->division}}</td>
                    <td class="text-center">
                        <a href="{{route('division.edit', $d->id)}}" class="btn btn-warning">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a href="{{route('division.delete', $d->id)}}" class="btn btn-danger">
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
