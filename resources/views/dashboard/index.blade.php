@extends('dashboard.theme.default')

@section('title', 'Dashboard')

@section('content')

<h3>Halo Selamat Datang!</h3>
<p>Anda login sebagai <b>{{Auth::user()->name}}</b> dengan level <b>{{Auth::user()->roles}}</b></p>

@endsection