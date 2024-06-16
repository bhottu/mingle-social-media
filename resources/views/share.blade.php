@extends('layouts.app')

@section('title', 'Shares')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mt-8 mb-4">Shares</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($shares as $share)
            <div class="bg-white p-4 shadow-md">
                <h3 class="text-lg font-semibold mb-2">{{ $share->post->caption }}</h3>
                @if($share->post->image)
                    <img src="{{ asset('storage/' . $share->post->image) }}" alt="Post Image" class="w-full h-auto mb-2">
                @endif

                <!-- Tampilkan detail postingan -->
                <p>{{ $share->post->content }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
