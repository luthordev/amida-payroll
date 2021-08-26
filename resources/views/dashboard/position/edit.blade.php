@extends('dashboard.theme.default')
@section('title', 'Tambah Jabatan')

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
    <form action="{{ route('position.update', $positions->id) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group mt-2">
            <label for="position">Jabatan</label>
            <input type="text" name="position" id="position" class="form-control" value="{{$positions->position}}">
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection