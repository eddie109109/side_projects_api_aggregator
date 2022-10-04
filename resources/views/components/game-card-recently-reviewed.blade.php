<div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
    <div class="relative flex-none">
        <a href={{$game['routeToSlug']}}>
            <img src={{$game['coverUrl']}} alt="battlefield" class="w-48 hover:opacity-75 transition ease-in-out duration-150 hover:rotate-2">
        </a>
        <div id={{$game['routeToSlug'].'recently-reviwed'}} class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full" style="right:-20px; bottom: -20px">
            {{-- <div class="font-semibold flex text-xs justify-center items-center h-full">{{$game['floorAggregatedRating']}}</div> --}}
        </div>
    </div>
    <div class="ml-12">
        <a href={{$game['routeToSlug']}} class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
            @if (isset($game['name']))
            {{$game['name']}}
            @else
                N/A
            @endif
            
        </a>
        <div class="text-gray-400 mt-1">
            {{-- @foreach ($game['platforms'] as $platform)
                @if (array_key_exists('abbreviation', $platform))
                    {{$platform['abbreviation']}},
                @endif
            @endforeach --}}
            {{$game['platforms']}}
        </div>
        <p class="mt-6 text-gray-400 hidden lg:block">
            @if (isset($game['summary']))
                {{$game['summary']}}
            @else
                N/A
            @endif
           
        </p>
    </div>
    <script>
    var ProgressBarContainer = document.getElementById("{{$game['routeToSlug'].'recently-reviwed'}}");
    var bar = new ProgressBar.Circle(ProgressBarContainer, {
        color: '#aaa',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 4,
        trailWidth: 2,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: '#3CCF4E', width: 5 },
        to: { color: '#3CCF4E', width: 5 },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * 100);
            if (value === 0) {
                circle.setText('0%');
            } else {
                circle.setText("{{$game['floorAggregatedRating']}}" + "%");
            }

        }
        });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '0.9rem';
    bar.text.style.color = "white";
    bar.animate({{$game['floorAggregatedRating']}}*0.01); 
    </script>
</div>