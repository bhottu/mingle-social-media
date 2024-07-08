<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mingle')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="{{ session('dark_mode', 'light') }}">

<style>
    .dark {
        background-color: #1e2125;
        color: #fff;
    }

    .dark .bg-white {
        background-color: #2d2f33;
    }

    .dark .text-gray-500 {
        color: #8a8d91;
    }

    .dark .border-gray-300 {
        border-color: #4a4e53;
    }

    .dark .hover\:bg-gray-200:hover {
        background-color: #383b3e;
    }

    .dark .text-gray-800 {
        color: #c8ccd1;
    }

    .dark .text-red-600 {
        color: #ff4d4f;
    }

    .dark .bg-gray-300 {
        background-color: #4a4e53;
    }

    .dark .bg-gray-200 {
        background-color: #4a4e53;
    }

    .dark .bg-gray-100 {
        background-color: #4a4e53;
    }

    .dark .text-blue-500 {
        color: #1890ff;
    }
</style>

<header>
    <nav class="bg-gray-100 dark:bg-gray-800 p-6">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-2xl font-bold text-gray-800 dark:text-white" href="{{ route('home') }}">Mingle</a>
            <div>
                <ul class="flex space-x-4">
                    @guest
                        <li>
                            <a class="hover:text-blue-500 text-gray-800 dark:text-gray-300" href="{{ route('login') }}">Login</a>
                        </li>
                        <li>
                            <a class="hover:text-blue-500 text-gray-800 dark:text-gray-300" href="{{ route('register') }}">Register</a>
                        </li>
                    @else
                        <li>
                            <button id="dark-mode-toggle" class="text-gray-800 dark:text-gray-300">
                                <i class="fas fa-toggle-on"></i>
                            </button>
                        </li>
                        <li>
                            <a class="hover:text-blue-500 text-gray-800 dark:text-gray-300" href="{{ route('profile', ['user' => Auth::user()->id]) }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li>
                            <a class="hover:text-blue-500 text-gray-800 dark:text-gray-300" href="{{ route('profile.edit') }}">Setting</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="hover:text-blue-500 text-gray-800 dark:text-gray-300">Logout</button>
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

<script>
    const darkModeToggle = document.getElementById('dark-mode-toggle');
    const body = document.body;

    // Initialize dark mode based on localStorage
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    if (isDarkMode) {
        body.classList.add('dark');
        darkModeToggle.innerHTML = '<i class="fas fa-toggle-off"></i>';
    } else {
        darkModeToggle.innerHTML = '<i class="fas fa-toggle-on"></i>';
    }

    darkModeToggle.addEventListener('click', () => {
        const isDark = body.classList.toggle('dark');
        localStorage.setItem('darkMode', isDark);
        
        if (isDark) {
            darkModeToggle.innerHTML = '<i class="fas fa-toggle-off"></i>';
        } else {
            darkModeToggle.innerHTML = '<i class="fas fa-toggle-on"></i>';
        }
    });
</script>
</body>
</html>
