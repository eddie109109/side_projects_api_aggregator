<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = []; // public property auto passes to the view

    public function loadPopularGames() {

        $before = Carbon::now()->subMonths(2)->timestamp;

        $after = Carbon::now()->addMonths(2)->timestamp;

        $unformatedGames = Cache::remember('popular-games', 100, function() use($before, $after){
            return Http::withHeaders([
                'Client-ID' => env('IGDB_CLIENT_ID'),
                'Authorization' => env('IGDB_AUTHORIZATION')
            ])->withBody(
                "fields name, cover.url, first_release_date, platforms.abbreviation, aggregated_rating, rating, slug;
                 where cover != null & platforms = (48, 49, 130, 6) & aggregated_rating != null & platforms.abbreviation != null
                 & (first_release_date >= {$before} & first_release_date <= {$after});
                 sort aggregated_rating desc;
                limit 12;",
                'text/plain'
            )->post('https://api.igdb.com/v4/games')
            ->json();
        });

        
        $this->popularGames = $this->formatGames($unformatedGames);

        // dd($this->popularGames);
    }

    public function render()
    {

        return view('livewire.popular-games');
    }

    public function formatGames($games) {
        $gamesWithNewKeys = collect($games);
        return $gamesWithNewKeys->map(function($game) {
            return collect($game)->merge([
                'coverUrl' => isset($game['cover'])? str_replace('thumb', 'cover_big',$game['cover']['url']):"#",
                'routeToSlug' => isset($game['slug'])?  route('games.show', $game['slug']): "",
                'floorAggregatedRating' => isset($game['aggregated_rating']) ? floor($game['aggregated_rating']): 0,
                'platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->implode(', '): [],
            ]);
        })->toArray();
        
    }

}
