@extends('dashboard.theme.default')
@section('title', 'Tambah Pengguna')

@section('content')

<div class="mb-4 col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <form action="{{ route('user.add') }}" method="post">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label for="password">Password</label>
            <input type="text" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group mt-2">
            <label for="roles">Level</label>
            <select name="roles" id="roles" class="form-control" required>
                <option value="" selected disabled>--- PILIH LEVEL ---</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection