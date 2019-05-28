<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderby('created_at', 'desc')->get(); //fetch all posts in order of most recent

        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreate(Request $request)
    {
        //Validation
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body']; //get the post content from the form box
        $message = 'Sorry, there was an error processing your request';

        if($request->user()->posts()->save($post)) //if post is successfully saved to the database
        {
            $message = 'Post successfully created!';
        }

        return redirect()->route('dashboard')->with(['message' => $message]); //redirect to the dashboard and display relevant message
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first(); //get post with specified id
        if(Auth::user()!= $post->user)
        {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        $post->body = $request['body'];
        if(Auth::user()!= $post->user)
        {
            return redirect()->back();
        }
        $post->update();
        return response()->json(['new_body' => $post->body, 200]);
    }
}