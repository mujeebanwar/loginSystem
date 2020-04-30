@extends('layouts.header')
@section('content')
    <h3 class="login-heading mb-4">Register here!</h3>
    <form action="{{route('postRegister')}}" method="POST" id="regForm">
        {{ csrf_field() }}
        <div class="form-label-group">
            <label for="inputName">Username</label><br>
            <input type="text" id="inputName" name="username" class="form-control" placeholder="Username" autofocus value="{{ old('name') }}">

            @error('username')
            <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div><br>
        <div class="form-label-group">
            <label for="inputName">Name ( Optional )</label><br>
            <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" autofocus value="{{ old('name') }}">

        </div><br>
        <div class="form-label-group">
            <label for="inputEmail">Email address</label>
            <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email address" value="{{ old('email') }}"  >

            @error('email')
            <span class="text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror


        </div><br>

        <div class="form-label-group">
            <label for="inputPassword">Password</label><br>

            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">

            @error('password')
            <span class="text-danger" role="alert" >
                        <strong class="">{{ $message }}</strong>
                    </span>
            @enderror

        </div><br>

        <div class="form-label-group">
            <label for="inputName">Country</label><br>
            <select name="country" id="" class="form-control">
                <option value="" selected>Choose option</option>
                <option value="pakistan">Pakistan</option>
                <option value="uae">UAE</option>
            </select>
            @error('country')
            <span class="text-danger" role="alert" >
                        <strong class="">{{ $message }}</strong>
                    </span>
            @enderror

        </div><br>

        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" value="m" name="gender">Male
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
                <input type="radio" class="form-check-input"  name="gender" value="f">Female
            </label>
        </div><br>
        @error('gender')
        <span class="text-danger" role="alert" >
                        <strong class="">{{ $message }}</strong>
                    </span>
        @enderror

        <br> <input type="checkbox" name="terms">
        <label>Do you agree to Terms & Conditions</label><br>
        @error('terms')
        <span class="text-danger" role="alert" >
                        <strong class="">{{ $message }}</strong>
                    </span>
        @enderror

        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" style="margin-top: 20px;">Sign Up</button>
        <div class="text-center">If you have an account?
            <a class="small" href="{{url('login')}}">Sign In</a></div>
    </form>
@stop
