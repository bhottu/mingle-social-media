@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="container mx-auto">
    <div class="max-w-md mx-auto bg-white shadow-md rounded-md overflow-hidden">
        <div class="p-4">
            <h1 class="text-xl font-semibold mb-2">Edit Post</h1>
            <form action="{{ route('post.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-2">
                    <label for="caption" class="sr-only">Caption</label>
                    <input type="text" name="caption" id="caption" value="{{ $post->caption }}" placeholder="Caption" class="w-full border-b border-gray-300 focus:outline-none focus:border-indigo-500 pb-1">
                </div>
                <div class="mb-2">
                    <label for="image" class="sr-only">Image</label>
                    <input type="file" name="image" id="image" class="hidden" accept="image/*">
                    <label for="image" class="block bg-gray-200 hover:bg-gray-300 py-2 px-4 rounded-md cursor-pointer">Change Image</label>
                    @if($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="mt-2">
                    @endif
                </div>
                <button type="submit" class="m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
