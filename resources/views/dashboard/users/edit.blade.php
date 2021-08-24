@extends('dashboard.theme.default')
@section('title', 'Edit Pengguna')

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
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group mt-2">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}" required>
        </div>
        <div class="form-group mt-2">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}" required>
        </div>
        <div class="form-group mt-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="{{$user->password}}"
                required>
        </div>
        <div class="form-group mt-2">
            <label for="roles">Level</label>
            <select name="roles" id="roles" class="form-control" required>
                <option value="" selected disabled>--- PILIH LEVEL ---</option>
                <option value="admin" {{ $user->roles == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->roles == 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection