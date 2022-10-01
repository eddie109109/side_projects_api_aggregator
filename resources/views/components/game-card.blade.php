<div class="game mt-8">
    <div class="relative inline-block">
        <a href={{$game['routeToSlug']}}>
            <img src={{$game['coverUrl']}} alt="battlefield" class="hover:opacity-75 transition ease-in-out duration-150">
        </a>
        <div id={{$game['routeToSlug']}} class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full" style="right:-20px; bottom: -20px">
            <!-- the circle rating goes in here  -->
            {{-- <div id="container" class="font-semibold flex text-xs justify-center items-center h-full">{{$game['floorAggregatedRating']}}</div> --}}
        </div>
    </div>
    <a href={{$game['routeToSlug']}} class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{$game['name']}}</a>
    <div class="text-gray-400 mt-1">
        {{$game['platforms']}}
    </div>
    {{-- @push('scripts')
    @include('_rating', [
        'slug' => $game['routeToSlug'],
        'rating' => $game['floorAggregatedRating'],
        'event' => null,
    ])
    @endpush --}}
    {{-- <button wire:click="$emit('postAdded')">a</button> --}}
    <script>
        var ProgressBarContainer = document.getElementById("{{$game['routeToSlug']}}");
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