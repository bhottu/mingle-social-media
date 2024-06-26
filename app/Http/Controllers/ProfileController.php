<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Share;

class ProfileController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }
    
    public function show(User $user)
    {
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();
        $shares = $user->shares()->orderBy('created_at', 'desc')->get(); 
        return view('profile.show', compact('user', 'posts', 'shares'));
    }
}
