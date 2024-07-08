@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- start form upload -->
<div class="max-w-md mx-auto bg-white shadow-md rounded-md overflow-hidden">
    <div class="p-4">
        <div class="flex items-center">
            <img src="https://via.placeholder.com/40" alt="User" class="rounded-full h-8 w-8">
            <span class="ml-2 font-semibold">{{ Auth::user()->name }}</span>
        </div>
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data" class="mt-4">
            @csrf
           
            <div class="mb-2">
                <label for="caption" class="sr-only">Caption</label>
                <input type="text" name="caption" id="caption" placeholder="What's on your mind, {{ Auth::user()->name }}?" class="w-full border-b border-gray-300 focus:outline-none focus:border-indigo-500 pb-1">
            </div>
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                    <label for="image" class="block bg-gray-200 hover:bg-gray-300 py-2 px-4 rounded-md cursor-pointer"><i class="far fa-image"></i> Photo/Video</label>
                    <button type="submit" class="m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Post</button>
                    <div id="image-preview"></div> 
                </div>
                <button type="button" class="text-gray-500 hover:text-gray-700">
                    <i class="far fa-smile"></i>
                </button>
            </div>
            
        </form>
    </div>
</div>
<!-- end form upload -->

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image-preview');
            output.innerHTML = '<img src="' + reader.result + '" class="w-12 h-auto rounded-md" alt="Preview">';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>


    
    @foreach($posts as $post)
    <div class="max-w-md mt-4 mx-auto bg-gray shadow-md rounded-md overflow-hidden">
        <div class="bg-white p-4 shadow-md mb-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="{{ url('profile/' . $post->user->id) }}">
                        <img src="https://via.placeholder.com/40" alt="User" class="rounded-full h-8 w-8">
                    </a>
                    <div class="ml-2">
                        <span class="font-semibold"><a href="{{ url('profile/' . $post->user->id) }}">
                        {{ $post->user->name }}</a></span>
                        <div class="text-gray-500 text-xs">{{ $post->updated_at }}</div>
                    </div>
                </div>

                @if(Auth::id() === $post->user_id)
                <div class="relative" x-data="{ isOpen: false }">
                    <button @click="isOpen = !isOpen" class="focus:outline-none">
                        <i class="fas fa-ellipsis-h text-gray-400 text-sm"></i>
                    </button>
                    
                    <div x-show="isOpen" @click.away="isOpen = false" class="absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-md py-1">
                    
                      <a href="{{ route('post.edit', $post) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Edit</a>
                        <form action="{{ route('post.destroy', $post) }}" method="POST" class="block px-4 py-2 text-red-600 hover:bg-gray-200" onclick="isOpen = false;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        
                    </div>
                </div>
                @endif
                </div>

             <h3 class="text-sm m-4 mb-3">{{ $post->caption }}</h3>
             @if($post->image)
            
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="w-full h-auto mb-2 cursor-pointer" onclick="openImagePopup('{{ asset('storage/' . $post->image) }}', '{{ $post->id }}')">
           
             @endif
             @include('components.ImagePopup', ['post' => $post])
            
                <div class="flex justify-between items-center mt-4">
                <div>
                    <p><i class="fas fa-heart"></i> {{ $post->likes->count() }}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <form action="{{ route('post.like', ['postId' => $post->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center space-x-1">
                            <i class="fas fa-heart"></i>
                            <span class="ml-1">Like</span>
                        </button>
                    </form>
                    @csrf
                    <form action="{{ route('post.share', ['post' => $post->id]) }}" method="POST">
                        
                        
             @csrf
                <button type="submit"><i class="fas fa-share-alt"></i> Share</button>
             </form>
                    </form>
                </div>
                </div>

             <form action="{{ route('post.comment', ['post' => $post->id]) }}" method="POST" class="mt-4">
                @csrf
                <div class="flex items-center border border-gray-300 rounded-md p-2">
                    <textarea name="content" cols="30" rows="1" class="w-full resize-none focus:outline-none"></textarea>
                    <button type="submit" class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Kirim</button>
                </div>
             </form>

             @if($post->comments->count() > 0)
                <div class="mt-4">
                    <h4 class="font-semibold">Comments:</h4>
                    @foreach($post->comments as $comment)
                        <div class="border-t border-gray-200 mt-2 pt-2">
                            <p>{{ $comment->content }}</p>
                            <p class="text-sm text-gray-600">By {{ $comment->user->name }} on {{ $comment->created_at }}</p>
                        </div>
                    @endforeach
                </div>
             @endif
        </div>
    @endforeach
</div>
@endsection

