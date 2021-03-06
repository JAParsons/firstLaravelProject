@extends('layouts.master')

@section('title') <?php //define the title content to be inserted in to @yield('title') ?>
    writeit: the knowledge exchange of the internet
@endsection
<br><br><br>
@section('content') <?php //define the body content to be inserted in to @yield('content') ?>

@include('includes.message') <?php //display any and all errors ?>

    <br><br><br><br><br><br><br><br><br>

    <div class="row">
        <div class="col-md-5">
            <h3>Login</h3>
            <form action="{{route('login')}}" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="text" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}"> <?php //protection against CSRF by fetching session token?>
            </form>
        </div>

        <div class="col-md-5 offset-md-2">
            <h3>Register</h3>
            <form action="{{route('register')}}" method="post">
                <div class="form-group"> <?php //add red outline to invalid form fields ?>
                    <label for="email">E-mail</label>
                    <input class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" type="text" name="email" id="email" value="{{Request::old('email')}}"> <?php //maintain old inputs if validation fails ?>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input class="form-control form-control {{$errors->has('first_name') ? 'is-invalid' : ''}}" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control form-control {{$errors->has('password') ? 'is-invalid' : ''}}" type="password" name="password" id="password" value="{{Request::old('password')}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}"> <?php //protection against CSRF by fetching session token?>
            </form>
        </div>
        
    </div>
@endsection