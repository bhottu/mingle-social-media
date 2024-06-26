<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Share;
use App\Models\User;

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

 

    public function addShare(Request $request, $id)
        {
    Share::create([
        'user_id' => auth()->id(),
        'post_id' => $id
    ]);

    return redirect()->back()->with('success', 'Post shared successfully');
        }


   // Edit - Update
   public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $post->image = $request->file('image')->store('images', 'public');
        }

        $post->caption = $request->caption;
        $post->save();

        return redirect()->route('profile', Auth::user())->with('status', 'Post updated successfully!');
    }
    // End edit update

    // Hapus post
    public function destroy(Post $post)
    {
    
        $post->delete();

        return redirect()->route('profile', auth()->user());
    }
    // End Hapus post

    // Hapus shared
    public function sharedestroy($id)
        {
            $share = Share::find($id);

            // Lakukan pengecekan apakah pengguna yang sedang masuk adalah pemilik postingan
            if ($share && $share->user_id === auth()->user()->id) {
                $share->delete();
                return redirect()->back()->with('success', 'Postingan berhasil dihapus dari profil.');
            } else {
                return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus postingan ini.');
            }
        }
     // End Hapus shared
}
