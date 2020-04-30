@extends('layouts.header')

@section('content')

    <h3 class="login-heading mb-4">Welcome Dashboard!</h3>
    <div class="card">
        <div class="card-body">
            Welcome {{ ucfirst(Auth()->user()->username) }}
        </div>
        <div class="card-body">
            <a class="small" href="{{route('logout')}}">Logout</a>
        </div>
    </div>



@stop