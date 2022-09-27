<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

use Illuminate\Support\Facades\Cache;


class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon() {

        $after = Carbon::now()->addMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $unformattedComingSoon = Cache::remember('coming-soon', 100, function() use($current, $after){
            return  Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => env('IGDB_AUTHORIZATION')
        ])->withBody(
            "fields *, cover.url, first_release_date, cover, name, rating;
             where cover != null & (first_release_date >= {$current} & first_release_date <= {$after});
             sort first_release_date asc;
            limit 4;",
            'text/plain'
        )->post('https://api.igdb.com/v4/games')
        ->json();

        });

        $this->comingSoon = $this->formatComingSoon($unformattedComingSoon);

        // dd($this->comingSoon);
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }

    public function formatComingSoon($comingSoon){
        $comingSoonWithNewKeys = collect($comingSoon);

        return $comingSoonWithNewKeys->map(function($game){
            return collect($game)->merge([
                'routeToSlug' => isset($game['slug']) ? route('games.show', $game['slug']): "",
                'coverUrl' => isset($game['cover']) ? str_replace('thumb', 'cover_small',$game['cover']['url']): "",
                'first_release_date_formatted' => isset($game['first_release_date']) ? date("F j, Y",$game['first_release_date']) : "",
            ]);
        })->toArray();
    }
}
