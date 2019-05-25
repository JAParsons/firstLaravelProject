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
            @foreach($posts as $post)
            <article class="post">
                <p>{{$post->body}}</p>
                <div class="info">
                    Posted by {{$post->user->first_name}} {{$post->created_at->diffForHumans()}} <?php //{{$post->created_at->format('m/d/Y')}}?>
                </div>
                <div class="interaction">
                    <a href="#">Like</a>
                    <a href="#">Dislike</a>
                    @if(Auth::user() == $post->user)
                        <a href="#">Edit</a>
                        <a href="{{route('post.delete', ['post_id' => $post->id])}}">Delete</a>
                    @endif
                </div>
            </article>
            @endforeach
            <br><br>
        </div>
    </section>
@endsection