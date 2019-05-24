<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postCreate(Request $request)
    {
        //Validation needed
        $post = new Post();
        $post->body = $request['body']; //get the post content from the form box
        $request->user()->posts()->save($post); //save post to db related to the user who posted it
        return redirect()->route('dashboard'); //redirect to the dashboard
    }
}