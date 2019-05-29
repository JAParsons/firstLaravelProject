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
            <article class="post" data-postid="{{$post->id}}">
                <p>{{$post->body}}</p>
                <div class="info">
                    Posted by {{$post->user->first_name}} {{$post->created_at->diffForHumans()}} <?php //{{$post->created_at->format('m/d/Y')}}?>
                </div>
                <div class="interaction">
                    <a href="#" class="like">{{Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'Liked' : 'Like' : 'Like'}}</a>
                    <a href="#" class="like">{{Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'Disliked' : 'Dislike' : 'Dislike'}}</a>
                    @if(Auth::user() == $post->user)
                        <a data-toggle="modal" data-target="#edit-modal" onclick="getModalBody()" href="#">Edit</a>
                        <a href="{{route('post.delete', ['post_id' => $post->id])}}">Delete</a>
                    @endif
                </div>
            </article>
            @endforeach
            <br><br>
        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit your post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="4"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<script> 
    var token = '{{Session::token()}}'; //get session token for ajax call
    var urlEdit = '{{route('edit')}}'; //get correct edit route for ajax call
    var urlLike = '{{route('like')}}'; //lead to like route
</script>

@endsection