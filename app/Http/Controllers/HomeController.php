<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import model Post jika belum diimport
use App\Models\Comment;
use App\Models\Like;
use App\Models\Share;


class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get(); 
        return view('home', ['posts' => $posts]); 
    }
    

    public function addComment(Request $request, Post $post) // Tambah komentar
    {
        $request->validate([
        'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->user()->id;
        $post->comments()->save($comment);

        return redirect()->back();
    }

    public function addLike(Post $post)
    {
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $post->likes()->save($like);

        return redirect()->back();
    }

    public function addShare(Post $post)
    {
        $share = new Share();
        $share->user_id = auth()->user()->id;
        $post->shares()->save($share);

        return redirect()->back();
    }



}
