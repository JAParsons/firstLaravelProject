<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function postLikePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false; //flag to keep track of if the like needs updating or save a new entry
        $post = Post::find($post_id); //get id of the post
        if(!$post) //if post was not found
        {
            return null;
        }
        $user = Auth::user(); //get the logged in user
        $like = $user->likes()->where('post_id', $post_id)->first(); //get the current post like state from all the user's likes 
        if($like)
        {
            $already_like = $like->like; //get if the post is currently liked or disliked by the user
            $update = true;
            if($already_like == $is_like)
            {
                $like->delete();
                return null;
            }
        }
        else
        {
            $like = new Like();
        }

        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post->id;

        if($update)
        {
            $like->update();
        }
        else
        {
            $like->save();
        }

        return null;
    }
}