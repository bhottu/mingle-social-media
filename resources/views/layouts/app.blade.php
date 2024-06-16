<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Social Media')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body>
    <header>
        <nav class="bg-gray-100 p-6">
            <div class="container mx-auto flex justify-between items-center">
                <a class="text-2xl font-bold" href="{{ route('home') }}">My Social Media</a>
                <div>
                    <ul class="flex space-x-4">
                        @guest
                            <li>
                                <a class="hover:text-blue-500" href="{{ route('login') }}">Login</a>
                            </li>
                            <li>
                                <a class="hover:text-blue-500" href="{{ route('register') }}">Register</a>
                            </li>
                        @else

                        <!-- Ikon tambah -->
                           
                             <li> 
                                <a class="hover:text-blue-500" href="{{ route('post.create') }}">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg></a>
                            </li>
                            <li>
                                <a class="hover:text-blue-500" href="{{ route('profile', ['user' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="hover:text-blue-500">Logout</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mx-auto my-4">
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
