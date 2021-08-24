@extends('dashboard.theme.header')
@section('title', 'Login')

@section('style')
.card {
margin: 0 auto; /* Added */
float: none; /* Added */
margin-bottom: 10px; /* Added */
}
@endsection

@section('body')

<body class="text-center">
    <div class="container col-md-4">
        <form action="{{route('validate')}}" method="post" class="form-signin mt-4">
            @csrf
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            @if(session()->has('loginError'))
            <div class="alert alert-danger" role="alert">
                {{session('loginError')}}
            </div>
            @endif
            <div class="form-group mb-3">
                <label for="username" class="sr-only">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required
                    autofocus>
            </div>
            <div class="form-group mb-3">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password"
                    required>
            </div>
            <button class="btn btn-primary" type="submit">Login</button>
        </form>
    </div>
</body>
@endsection