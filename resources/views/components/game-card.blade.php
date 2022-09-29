<div class="game mt-8">
    <div class="relative inline-block">
        <a href={{$game['routeToSlug']}}>
            <img src={{$game['coverUrl']}} alt="battlefield" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
            <!-- the circle rating goes in here  -->
            <div class="font-semibold flex text-xs justify-center items-center h-full">{{$game['floorAggregatedRating']}}</div>
        </div>
    </div>
    <a href={{$game['routeToSlug']}} class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
    <div class="text-gray-400 mt-1">
        {{$game['platforms']}}
    </div>
</div>