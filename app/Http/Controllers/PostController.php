<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'caption' => 'nullable|string|max:255',
        ]);

        // Simpan gambar dengan nama yang unik
        $imagePath = $request->file('image')->store('uploads', 'public');

        // Buat post baru dengan menggunakan metode create dari hubungan posts() milik user yang sedang login
        $post = Auth::user()->posts()->create([
            'image' => $imagePath,
            'caption' => $request->caption,
        ]);

        // Kembalikan response redirect ke halaman profil user yang sedang login
        return redirect()->route('profile', Auth::user());
    }

    public function addComment(Request $request, $postId)
    {
        // Cari post berdasarkan ID
        $post = Post::find($postId);

        // Pastikan post ditemukan
        if (!$post) {
            abort(404); // Tampilkan error 404 jika post tidak ditemukan
        }

        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->back();
    }

    public function addShare(Request $request, $postId)
    {
    $post = Post::find($postId);

    if (!$post) {
        abort(404);
    }

    $post->shares()->create([
        'user_id' => auth()->id(),
    ]);

    
    

    return redirect()->back();
}



}
