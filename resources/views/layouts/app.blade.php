<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Games</title>
    <link rel="stylesheet" href="/css/main.css">
    @livewireStyles
</head>
<body class= "bg-gray-900 text-white">
    <head class= "border-b border-gray-800">
        <nav class="container mx-auto flex items-center justify-between px-4 py-6 flex-col lg:flex-row">
            <div class="flex flex-col lg:flex-row items-center">
                <a href="/">
                    <img src="/gamelogo.png" alt="gamelogo" class="w-32 flex-none">
                </a>
                <ul class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">
                    <li><a href="#popular_games" class="hover:text-gray-400">Games</a></li>
                    <li><a href="#recently_reviewed" class="hover:text-gray-400">Reviews</a></li>
                    <li><a href="#coming_soon" class="hover:text-gray-400">Coming Soon</a></li>
                </ul>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                <livewire:search-dropdown>
                
                <div class="ml-6">
                    <a href="#"><img src="/avatar.jpeg" alt="avatar" class="rounded-full w-8"></a>
                </div>
            </div>
        </nav>
    </head>
    <main class="py-8">
        @yield('content')
    </main>
    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered By <a href="#" class="underline hover:text-gray-400">IGDB API</a>
            &copy; eddieprogramming 
            <script>document.write(new Date().getFullYear())</script>
        </div>
    </footer>
    @livewireScripts
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>