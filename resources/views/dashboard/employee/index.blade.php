@extends('dashboard.theme.default')
@section('title', 'Karyawan')
@section('subtitle', 'Mengelola data karyawan')

@section('content')

<div class="card mb-4 col-md-2">
    <a href="{{url('dashboard/employee/add')}}" class="btn btn-primary p-2">Tambah Karyawan</a>
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
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Bank - No Rekening</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Bank - No Rekening</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($employees as $e)
                <tr>
                    <td class="align-middle">{{$e->nik}}</td>
                    <td class="align-middle">{{$e->name}}</td>
                    <td class="align-middle">{{$e->bank}} - {{$e->no_bank_account}}</td>
                    <td class="align-middle">{{$e->position}}</td>
                    <td class="align-middle">{{$e->division}}</td>
                    <td class="align-middle">{{$e->status}}</td>
                    <td class="text-center">
                        <a href="{{route('employee.edit', $e->id)}}" class="btn btn-warning">
                            <i class="fa fa-pencil-alt"></i>
                        </a>
                        <a href="{{route('employee.delete', $e->id)}}" class="btn btn-danger">
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

@section('modal')

<script>
function deleteData(id, name) {
    $('#msg').text("Apakah anda yakin ingin menghapus data '" + name + "' ?")
    $('#delete').modal('show')
}
</script>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-primary">Ya</button>
            </div>
        </div>
    </div>
</div>

@endsection