@extends('layouts.master')

@section('content')
<br>
    @include('includes.message')
<br><br>
    <section class="row new-post">
        <div class="col-md-8 offset-md-2">
            <header><h3>What's on you mind?</h3></header>
            <form action="{{route('post.create')}}" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id ="newpost" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" name="_token" value="{{Session::token()}}"> <?php //protection against CSRF by fetching session token?>
            </form>
        </div>
    </section>
    <br><br>
    <section class="row posts">
        <div class="col-md-8  offset-md-2">
            <header><h3>People say words...</h3></header>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="info">
                    Posted by John on 23 May 2019
                </div>
                <div class="interaction">
                    <a href="#"> Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>
            <br><br>
            <article class="post">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="info">
                    Posted by John on 23 May 2019
                </div>
                <div class="interaction">
                    <a href="#"> Like</a>
                    <a href="#">Dislike</a>
                    <a href="#">Edit</a>
                    <a href="#">Delete</a>
                </div>
            </article>
        </div>
    </section>
@endsection