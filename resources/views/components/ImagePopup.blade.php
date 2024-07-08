<!-- ImagePopup.blade.php -->
<div id="image-popup" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-75">
    <div class="relative max-w-screen-lg mx-auto flex h-full">
        <!-- Bagian Gambar di Kiri -->
        <div class="relative w-2/3 bg-black h-full flex items-center justify-center">
            <img id="image-popup-img" src="" alt="Post Image" class="max-h-full max-w-full object-contain rounded-lg">
            <div class="absolute top-0 right-0 p-4">
                <button class="text-white hover:text-gray-300" onclick="closeImagePopup()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- Bagian Konten di Kanan -->
        <div class="w-1/3 h-full bg-gray-100 px-6 py-4 flex flex-col justify-between">
            <!-- Info Pengguna -->
            <div class="flex items-center mb-2">
                <a href="{{ url('profile/' . $post->user->id) }}">
                    <img src="https://via.placeholder.com/40" alt="User" class="rounded-full h-8 w-8">
                </a>
                <div class="ml-2">
                    <span class="font-semibold"><a href="{{ url('profile/' . $post->user->id) }}">{{ $post->user->name }}</a></span>
                    <div class="text-gray-500 text-xs">{{ $post->updated_at }}</div>
                </div>
            </div>

            <div id="poster"></div>

            <!-- Caption Post -->
            <div class="mt-2 mb-4">
                <h3 class="text-sm">{{ $post->caption }}</h3>
            </div>
            <!-- Like & Share -->
            <div class="flex justify-between items-center mb-4">
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
                    <form action="{{ route('post.share', ['post' => $post->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center space-x-1">
                            <i class="fas fa-share-alt"></i>
                            <span class="ml-1">Share</span>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Komentar -->
            <div id="comments-section" class="overflow-y-auto flex-grow">
            </div>
            
            <!-- Form Komentar -->
            <form id="comment-form" action="{{ route('post.comment', ['post' => $post->id]) }}" method="POST" class="mt-4">
                @csrf
                <div class="flex items-center border border-gray-300 rounded-md p-2">
                    <textarea id="comment-content" name="content" placeholder="Tambahkan komentar..." class="w-full resize-none focus:outline-none dark:text-black"></textarea>
                </div>
                <div class="flex justify-end mt-2">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline">Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Popup -->
