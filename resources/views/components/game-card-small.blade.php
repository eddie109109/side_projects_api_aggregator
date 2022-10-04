<div class="game flex">
    <a href={{$game['routeToSlug']}}>
        <img src={{$game['coverUrl']}}  alt="most_anticipated_img" class="w-16 hover:opacity-75 transition ease-in-out duration-150 hover:rotate-2">
    </a>
    <div class="ml-4">
        <a href={{$game['routeToSlug']}} class="hover:text-gray-300">
            @if (isset($game['name']))
            {{$game['name']}}
            @else
                Game Name N/A
            @endif
        </a>
        <div class="text-gray-400 text-sm mt-1">{{$game['first_release_date_formatted']}}</div>
    </div>
</div>