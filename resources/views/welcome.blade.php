@extends('layouts.master')

@section('title') <?php //define the title content to be inserted in to @yield('title') ?>
    Welcome!
@endsection

@section('content') <?php //define the body content to be inserted in to @yield('content') ?>
<br><br>
    <div class="row">
        <div class="col-md-6">
            <h3>Register</h3>
            <form action="{{route('register')}}" method="post">
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email"></input>
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name"></input>
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password"></input>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}"> <?php //protection against CSRF by fetching session token?>
            </form>
        </div>

        <div class="col-md-6">
            <h3>Login</h3>
            <form action="{{route('login')}}" method="post">
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control" type="text" name="email" id="email"></input>
                </div>
                <div class="form-group">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control" type="text" name="first_name" id="first_name"></input>
                </div>
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control" type="password" name="password" id="password"></input>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{Session::token()}}"> <?php //protection against CSRF by fetching session token?>
            </form>
        </div>
        
    </div>
@endsection