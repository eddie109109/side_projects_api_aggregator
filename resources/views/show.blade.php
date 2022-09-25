@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
        <div class="flex-none">
            <a href="#">
                <img src="./battlefield.jpg" alt="battlefield">
            </a>
        </div>
        <div class="lg:ml-12">
            <h2 class="font-semibold text-4xl leading-tight"> Final Fantasy VII Remake</h2>
            <div class="text-gray-400">
                <span>Adventure, RPG</span>
                &middot;
                <span>Square Enix</span>
                &middot;
                <span>PS4</span>
            </div>
            <div class="flex flex-wrap items-center mt-8 space-x-12">
                <div class= "flex items-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">90%</div>
                        
                    </div>
                    <div class="ml-4 text-xs">Member <br> Score</div>
                </div>
                <div class= "flex items-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">90%</div>
                        
                    </div>
                    <div class="ml-4 text-xs">Critic <br> Score</div>
                </div>
                <div class="flex items-center space-x-4 mt-4 lg:mt-0">
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center ">
                        <a href="#" class="hover:text-gray-400">
                            <svg class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0Z"/><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95Z"/></svg>
                        </a>
                    </div>
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="#" class="hover:text-gray-400">
                            <svg class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0Z"/><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95Z"/></svg>
                        </a>
                    </div>
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="#" class="hover:text-gray-400">
                            <svg class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0Z"/><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95Z"/></svg>
                        </a>
                    </div>

                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="#" class="hover:text-gray-400">
                            <svg class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0Z"/><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95Z"/></svg>
                        </a>
                    </div>
                   
                </div>
            </div>
            <p class="mt-12">Lorem ipsum dolor sit, amet consectetur adipisicing elit. At ad quaerat quasi asperiores iure doloribus consequuntur minus corporis aut totam. Iure consequatur repellat quae facilis cum, nesciunt aliquid ipsa laborum.</p>
            
            <div class="mt-12">
                <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                <svg class="w-6 fill-current" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="m10 16.5 6-4.5-6-4.5zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                    <span class="ml-2">Play Trailer</span>
                </button>
            </div>
        </div>
    </div> 
    <!-- end game details -->
    <div class="images-container border-b border-gray-800 pb-12 mt-8">
        <h2 class="uppercase text-blue-500 font-semibold tracking-wide">Images</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
            <div>
                <a href="#">
                    <img class="hover:opacity-75 transition ease-in-out duration-150" src="./battlefield.jpg" alt="battlefield">
                </a>
            </div>
            <div>
                <a href="#">
                    <img class="hover:opacity-75 transition ease-in-out duration-150" src="./battlefield.jpg" alt="battlefield">
                </a>
            </div>
            <div>
                <a href="#">
                    <img class="hover:opacity-75 transition ease-in-out duration-150" src="./battlefield.jpg" alt="battlefield">
                </a>
            </div>
            <div>
                <a href="#">
                    <img class="hover:opacity-75 transition ease-in-out duration-150" src="./battlefield.jpg" alt="battlefield">
                </a>
            </div>
            <div>
                <a href="#">
                    <img class="hover:opacity-75 transition ease-in-out duration-150" src="./battlefield.jpg" alt="battlefield">
                </a>
            </div>
        </div>
    </div>
    <!-- end images container -->

    <div class="similar-games-container mt-8">
        <h2 class="uppercase text-blue-500 font-semibold tracking-wide">Similar Games</h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-12">
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="./battlefield.jpg" alt="battlefield" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                        <!-- the circle rating goes in here  -->
                        <div class="font-semibold flex text-xs justify-center items-center h-full">80%</div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">Final Fantasy 7 Remake</a>
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="./battlefield.jpg" alt="battlefield" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                        <!-- the circle rating goes in here  -->
                        <div class="font-semibold flex text-xs justify-center items-center h-full">80%</div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">Final Fantasy 7 Remake</a>
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="./battlefield.jpg" alt="battlefield" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                        <!-- the circle rating goes in here  -->
                        <div class="font-semibold flex text-xs justify-center items-center h-full">80%</div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">Final Fantasy 7 Remake</a>
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="./battlefield.jpg" alt="battlefield" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                        <!-- the circle rating goes in here  -->
                        <div class="font-semibold flex text-xs justify-center items-center h-full">80%</div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">Final Fantasy 7 Remake</a>
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="./battlefield.jpg" alt="battlefield" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                        <!-- the circle rating goes in here  -->
                        <div class="font-semibold flex text-xs justify-center items-center h-full">80%</div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">Final Fantasy 7 Remake</a>
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>

            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="./battlefield.jpg" alt="battlefield" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                        <!-- the circle rating goes in here  -->
                        <div class="font-semibold flex text-xs justify-center items-center h-full">80%</div>
                    </div>
                </div>
                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">Final Fantasy 7 Remake</a>
                <div class="text-gray-400 mt-1">Playstation 4</div>
            </div>
            
        </div> 
    </div>
    <!-- end similar games container -->
</div>
@endsection