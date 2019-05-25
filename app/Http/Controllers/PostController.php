<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::all(); //fetch all posts

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
}