@extends('layouts.header')

@section('content')
    @if(session('error'))
        <p class="alert alert-danger">{{session('error')}}</p>
    @endif
    @if(session('credentials'))
        <p class="alert alert-danger">{{session('credentials')}}</p>
    @endif
    <h3 class="login-heading mb-4">Welcome</h3>
    <form action="{{route('postLogin')}}" method="POST" id="logForm">

        {{ csrf_field() }}

        <div class="form-label-group">
            <label for="inputEmail">Email address</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" >

            @error('email')
            <span class="text-danger" role="alert">
                           <strong >{{$message }}</strong>
                       </span>
            @enderror

        </div><br>

        <div class="form-label-group">
            <label for="inputPassword">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">

            @error('password')
            <span class="text-danger" role="alert">
                           <strong >{{$message }}</strong>
                       </span>
            @enderror
        </div><br>

        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
        <div class="text-center">If you have an account?
            <a class="small" href="{{route('register')}}">Sign Up</a></div>
    </form>
@stop