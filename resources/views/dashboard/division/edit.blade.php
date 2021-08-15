@extends('dashboard.theme.default')
@section('title', 'Edit Divisi')

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

    <form action="{{ route('division.update', $divisions->id) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="form-group mt-2">
            <label for="division">Nama Divisi</label>
            <input type="text" name="division" id="division" class="form-control" value="{{$divisions->division}}">
        </div>    
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection