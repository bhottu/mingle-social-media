<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();
        return view('profile.show', compact('user', 'posts'));
    }

    public function shares(User $user)
    {
        $shares = $user->shares()->with('post')->get();
        return view('profile.shares', compact('user', 'shares'));
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }
}


