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
                <div class="relative">    <!-- for the search icon -->
                  <input type="text" class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 pl-8 py-1" placeholder="Search..."> 
                  <div  class="absolute top-1 flex items-center ml-2"> 
                    <svg class="fill-current text-gray-400 w-5" xmlns="http://www.w3.org/2000/svg" ><path d="M0 0h24v24H0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                    </div>
                </div>
                
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
        </div>
    </footer>
    @livewireScripts
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>