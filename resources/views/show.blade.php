@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
        <div class="flex-none">
            <a href="#">
                <img src={{$game['coverUrlBig']}} alt={{$game['name']}}>
            </a>
        </div>
        <div class="lg:ml-12">
            <h2 class="font-semibold text-4xl leading-tight">{{$game['name']}} </h2>
            <div class="text-gray-400">
                    <span>{{$game['formatted_genres']}}</span>
                &middot;
                {{-- @if (isset($game['involved_companies'] ))
                    @foreach ($game['involved_companies'] as $item)
                        @if (isset($item['company']['name']))
                        <span>{{$item['company']['name']}}</span>,
                            @else
                            <span>Company Info N/A</span>
                            @endif
                    @endforeach
                @else
                    <span>Company Info N/A</span>
                @endif --}}
                <span>{{$game['formatted_involved_companies']}}</span>
                &middot;
                {{-- @if (isset($game['platforms']))
                    @foreach ($game['platforms'] as $item)
                        @if (isset($item['abbreviation']))
                            <span>{{$item['abbreviation']}}</span>,
                        @else
                            <span>No Info</span>
                        @endif
                    @endforeach
                @else
                    <span>Platform Info N/A</span>
                @endif --}}
                <span>{{$game['formatted_platforms']}}</span>
            </div>
            <div class="text-gray-300">
                {{$game['formatted_first_release_date']}}
            </div>
            <div class="flex flex-wrap items-center mt-8 space-x-12">
                <div class= "flex items-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{$game['formatted_rating']}}
                        </div>
                        
                    </div>
                    <div class="ml-4 text-xs">Member <br> Score</div>
                </div>
                <div class= "flex items-center">
                    <div class="w-16 h-16 bg-gray-800 rounded-full">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">
                            {{$game['formatted_aggregated_rating']}}
                        </div>
                        
                    </div>
                    <div class="ml-4 text-xs">Critic <br> Score</div>
                </div>
                {{-- below is for 4 social icons --}}
                <div class="flex items-center space-x-4 mt-4 lg:mt-0">
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center ">
                        <a href="#" class="hover:text-gray-400">
                            {{-- <svg class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0Z"/><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95Z"/></svg> --}}
                            <svg class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56" style="enable-background:new 0 0 56 56" xml:space="preserve"><path d="M28 0C12.561 0 0 12.561 0 28s12.561 28 28 28 28-12.561 28-28S43.439 0 28 0zm0 54C13.663 54 2 42.336 2 28S13.663 2 28 2s26 11.664 26 26-11.663 26-26 26z"/><path d="M28.707 9.293a.999.999 0 0 0-1.414 0l-16 16A1 1 0 0 0 12 27h3v18a1 1 0 0 0 1 1h24a1 1 0 0 0 1-1V27h3a1 1 0 0 0 .707-1.707l-16-16zM25 44V33h6v11h-6zm14 0h-6V32a1 1 0 0 0-1-1h-8a1 1 0 0 0-1 1v12h-6V27h22v17zm1-19H14.414L28 11.414 41.586 25H40z"/></svg>
                        </a>
                    </div>
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="#" class="hover:text-gray-400">
                            <svg class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><path d="M222.892 388h51.491a8 8 0 0 0 8-8V264.093h26.751a8 8 0 0 0 7.958-7.18l4.51-43.772a7.997 7.997 0 0 0-2.019-6.179 7.997 7.997 0 0 0-5.939-2.641h-31.261v-17.73c0-3.662 1.159-3.936 2.928-3.936h27.682a8 8 0 0 0 8-8v-42.5a8 8 0 0 0-7.968-8L274.848 124c-26.752 0-41.029 11.77-48.295 21.643-10.146 13.787-11.661 29.941-11.661 38.343v20.334h-16.489a8 8 0 0 0-8 8v43.772a8 8 0 0 0 8 8h16.489V380a8 8 0 0 0 8 8zm-16.49-139.907v-27.772h16.489a8 8 0 0 0 8-8v-28.334c0-5.185.833-18.376 8.547-28.86 7.386-10.037 19.3-15.126 35.376-15.126l30.177.122v26.533h-19.682c-9.421 0-18.928 6.164-18.928 19.936v25.73a8 8 0 0 0 8 8h30.395l-2.862 27.772h-27.533a8 8 0 0 0-8 8V372H230.89V256.093a8 8 0 0 0-8-8h-16.488z"/><path d="M437.022 74.984C388.67 26.63 324.381 0 256 0 187.624 0 123.338 26.63 74.984 74.984S0 187.624 0 256c0 68.388 26.63 132.678 74.984 181.028C123.335 485.375 187.621 512 256 512c68.385 0 132.673-26.625 181.021-74.972C485.372 388.679 512 324.389 512 256c0-68.378-26.628-132.664-74.978-181.016zm-11.314 350.73C380.381 471.039 320.111 496 256 496c-64.106 0-124.374-24.961-169.703-70.286C40.965 380.386 16 320.113 16 256c0-64.102 24.965-124.37 70.297-169.702C131.63 40.965 191.898 16 256 16c64.108 0 124.378 24.965 169.708 70.297C471.037 131.628 496 191.896 496 256c0 64.115-24.963 124.387-70.292 169.714z"/><path d="M430.038 114.969a7.998 7.998 0 0 0-11.253-1.172 7.999 7.999 0 0 0-1.172 11.252C447.526 161.919 464 208.425 464 256c0 55.567-21.635 107.803-60.919 147.086C363.797 442.367 311.563 464 256 464c-51.26 0-100.505-18.807-138.663-52.956a8 8 0 0 0-10.67 11.922C147.763 459.745 200.797 480 256 480c59.837 0 116.089-23.297 158.394-65.601C456.701 372.094 480 315.84 480 256c0-51.234-17.744-101.319-49.962-141.031zM48 256c0-114.691 93.309-208 208-208 51.26 0 100.504 18.808 138.662 52.959a8 8 0 0 0 11.296-.625 8 8 0 0 0-.625-11.296C364.237 52.256 311.203 32 256 32c-59.829 0-116.079 23.301-158.389 65.611C55.301 139.92 32 196.171 32 256c0 51.24 17.744 101.328 49.963 141.038a7.983 7.983 0 0 0 6.217 2.96 8 8 0 0 0 6.208-13.041C64.474 350.088 48 303.58 48 256z"/></svg>
                        </a>
                    </div>
                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="#" class="hover:text-gray-400">
                            <svg  class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><path d="M437.019 74.981C388.667 26.628 324.379 0 256 0S123.333 26.628 74.981 74.981C26.628 123.333 0 187.621 0 256s26.628 132.667 74.981 181.019C123.333 485.372 187.621 512 256 512s132.667-26.628 181.019-74.981S512 324.379 512 256s-26.628-132.667-74.981-181.019zM256 495.832C123.756 495.832 16.168 388.244 16.168 256S123.756 16.168 256 16.168 495.832 123.756 495.832 256 388.244 495.832 256 495.832z"/><path d="M347.845 97.011h-183.69c-37.024 0-67.144 30.121-67.144 67.144v183.692c0 37.022 30.121 67.143 67.144 67.143h183.692c37.022 0 67.143-30.121 67.143-67.144V164.155c-.001-37.024-30.121-67.144-67.145-67.144zm50.976 250.834c0 28.108-22.868 50.976-50.976 50.976h-183.69c-28.108 0-50.976-22.868-50.976-50.976v-183.69c0-28.108 22.868-50.976 50.976-50.976h183.692c28.107 0 50.975 22.868 50.975 50.976v183.69z"/><path d="M339.402 251.22c-2.391-42.533-37.002-76.75-79.558-78.669-49.108-2.214-89.535 38.232-87.292 87.346 1.945 42.56 36.19 77.154 78.728 79.51 17.951.995 34.762-3.727 48.803-12.494 4.374-2.731 5.087-8.814 1.441-12.459l-.115-.115c-2.657-2.658-6.778-3.059-9.971-1.075a66.948 66.948 0 0 1-36.158 10.102c-37.455-.394-67.676-31.844-66.621-69.286 1.061-37.681 33.215-67.721 71.657-65.312 33.126 2.076 60.09 28.49 62.819 61.569 1.111 13.475-1.787 26.206-7.61 37.157-1.667 3.136-1.153 6.982 1.358 9.493l.124.124c3.773 3.773 10.154 2.886 12.675-1.816 6.982-13.026 10.619-28.098 9.72-44.075z"/><circle cx="342.232" cy="158.989" r="21.558"/></svg>
                        </a>
                    </div>

                    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                        <a href="#" class="hover:text-gray-400">
                            <svg class="w-8 h-8 fill-current" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve"><path d="M437.019 74.981C388.667 26.628 324.379 0 256 0S123.333 26.628 74.981 74.981C26.628 123.333 0 187.621 0 256s26.628 132.667 74.981 181.019C123.333 485.372 187.621 512 256 512s132.667-26.628 181.019-74.981S512 324.379 512 256s-26.628-132.667-74.981-181.019zM256 495.832C123.756 495.832 16.168 388.244 16.168 256S123.756 16.168 256 16.168 495.832 123.756 495.832 256 388.244 495.832 256 495.832z"/><path d="M436.352 162.391c-2.433-2.104-5.958-2.463-8.875-1.11a125.666 125.666 0 0 1-12.806 5.107 73.664 73.664 0 0 0 10.188-19.432c1.002-2.891.503-6.176-1.569-8.427a8.088 8.088 0 0 0-9.963-1.56 116.38 116.38 0 0 1-37.931 13.618c-14.958-13.729-34.201-21.24-54.643-21.24-42.313 0-77.147 32.642-80.648 74.065-8.741-1.364-25.844-6.241-29.933-7.578-29.581-10.075-56.228-27.814-77.075-51.307-1.236-1.393-2.864-2.429-4.695-2.764a8.099 8.099 0 0 0-8.745 4.339c-5.181 10.383-7.809 21.548-7.809 33.185 0 16.093 5.038 31.261 14.113 43.73-2.828-.531-5.838.462-7.812 2.89-1.135 1.396-1.703 3.168-1.77 4.966a67.49 67.49 0 0 0-.057 2.472c0 21.817 9.99 41.646 26.136 54.588a8.125 8.125 0 0 0-2.703 3.082c-.963 1.904-1.07 4.143-.434 6.178 7.052 22.559 24.572 39.739 46.292 46.781-19.673 11.976-42.429 18.434-65.679 18.434-2.053 0-4.166-.053-6.279-.156a8.098 8.098 0 0 0-8.371 6.744c-.568 3.349 1.162 6.698 4.087 8.423 29.718 17.529 63.734 26.792 98.39 26.792 41.361 0 80.758-12.881 113.607-36.725 4.052-2.942 4.499-8.821.959-12.362l-.003-.003c-2.852-2.852-7.338-3.159-10.605-.793-29.275 21.198-65.207 33.714-103.959 33.714a177.989 177.989 0 0 1-63.255-11.61c24.303-4.268 47.275-14.808 66.409-30.712 2.312-1.922 3.529-4.962 2.947-7.911a8.086 8.086 0 0 0-7.707-6.535 55.504 55.504 0 0 1-46.698-28.06 77.33 77.33 0 0 0 13.44-1.841c3.382-.77 6.119-3.472 6.559-6.913a8.086 8.086 0 0 0-6.085-8.897 53.623 53.623 0 0 1-40.14-43.256 73.794 73.794 0 0 0 19.047 1.896 8.088 8.088 0 0 0 7.792-7.166c.374-3.196-1.323-6.291-4.07-7.966-17.529-10.682-27.985-29.272-27.985-49.783 0-5.014.623-9.917 1.859-14.665 21.193 20.954 46.914 36.922 75.086 46.518.258.088 28.093 8.754 38.636 8.797.688.017 3.975.162 3.98.162 3.388.137 6.673-1.919 7.953-5.326.368-.978.502-2.03.477-3.074-.011-.471-.023-.942-.023-1.416 0-35.713 29.055-64.768 64.769-64.768 17.487 0 33.878 6.872 46.158 19.348 1.777 1.807 4.282 2.697 6.793 2.349a133.153 133.153 0 0 0 24.037-5.632 57.859 57.859 0 0 1-14.502 11.504c-3.692 2.067-5.258 6.558-3.518 10.415l.119.264a8.087 8.087 0 0 0 8.136 4.72 142.822 142.822 0 0 0 19.753-3.291 130.55 130.55 0 0 1-18.849 16.051 8.044 8.044 0 0 0-3.416 6.865l.017.511c.019.553.04 1.107.04 1.664v.731c-.186 45.29-17.461 86.654-45.668 117.994-2.882 3.201-2.702 8.117.344 11.163 3.312 3.312 8.72 3.151 11.855-.332 31.691-35.208 49.224-80.18 49.633-127.902a145.695 145.695 0 0 0 36.227-39.093 8.084 8.084 0 0 0-1.558-10.454z"/></svg>
                        </a>
                    </div>
                   
                </div>
            </div>
            <p class="mt-12">
                {{$game['formatted_summary']}}
            </p>
            
            <div class="mt-12">
                @if (isset($game['videos'][0]))
                <a class="inline-block" href="https://youtube.com/watch/{{$game['videos'][0]['video_id']}}">
                    <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="m10 16.5 6-4.5-6-4.5zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="ml-2">Play Trailer</span>
                        </button>
                    </a>
                @else
                    <a class="inline-block" href="https://youtube.com/watch/">
                    <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                
                        <svg class="w-6 fill-current" xmlns="http://www.w3.org/2000/svg" height="24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="m10 16.5 6-4.5-6-4.5zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="ml-2">Trailer N/A</span>
                        </button>
                    </a>
                @endif
                
                
            </div>
        </div>
    </div> 
    <!-- end game details -->
    <div class="images-container border-b border-gray-800 pb-12 mt-8">
        <h2 class="uppercase text-blue-500 font-semibold tracking-wide">Images</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 mt-8">
            {{-- @if (isset($game['screenshots'] )) --}}
                @foreach ($game['formatted_screenshots'] as $item)
                    <div class="w-full h-full">
                        <a href={{$item['huge']}}>
                            <img class="hover:opacity-75 transition ease-in-out duration-150" src={{$item['big']}} alt="screenshots">
                        </a>
                    </div>
                @endforeach
            {{-- @else
                <div>Screenshots N/A :(</div>
            @endif --}}
        </div>
    </div>
    <!-- end images container -->

    <div class="similar-games-container mt-8">
        <h2 class="uppercase text-blue-500 font-semibold tracking-wide">Similar Games</h2>
        <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-12">
            
            @foreach ($game['formatted_similar_games'] as $item)
                
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href={{$item['routeToSlug']}}>
                            {{-- @if (isset($item['cover'])) --}}
                                <img src={{$item['coverBig']}} alt="gamecovers" class="hover:opacity-75 transition ease-in-out duration-150">
                            {{-- @endif  --}}
                        </a>
                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
                            <!-- the circle rating goes in here  -->
                            <div class="font-semibold flex text-xs justify-center items-center h-full">
                                {{-- @if (isset($item['aggregated_rating']))
                                    {{round($item['aggregated_rating'])}}%
                                @else
                                    @if (isset($item['rating']))
                                    {{round($item['rating'])}}%
                                    @else
                                    0%
                                    @endif       
                                @endif --}}
                                {{$item['formatted_aggregated_rating']}}
                            </div>
                        </div>
                    </div>
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$item['name']}}</a>
                    
                    {{-- @if (isset($item['platforms']))
                        @foreach ($item['platforms'] as $platform)
                            @if (isset($platform['abbreviation']))
                                {{$platform['abbreviation']}},
                            @endif
                        @endforeach
                    @else
                    @endif --}}
                    {{$item['formatted_plateforms']}}

                </div>
            @endforeach
  
        </div> 
    </div>
    <!-- end similar games container -->
</div>
@endsection