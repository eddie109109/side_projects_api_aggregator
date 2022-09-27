<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Cache;

use Carbon\Carbon;


class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated() {
        $after_four_months = Carbon::now()->addMonths(4)->timestamp;

        $current = Carbon::now()->timestamp;
        $unformattedMostAnticipated = Cache::remember('most-anticipated', 100, function() use($current, $after_four_months){
        return Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => env('IGDB_AUTHORIZATION')
        ])->withBody(
            "fields *, cover.url, first_release_date, cover, name, rating;
             where cover != null & (first_release_date >= {$current} & first_release_date <= {$after_four_months});
             sort rating desc;
            limit 4;",
            'text/plain'
        )->post('https://api.igdb.com/v4/games')
        ->json();
        });

        $this->mostAnticipated = $this->formatMostAnticipated($unformattedMostAnticipated);
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }

    public function formatMostAnticipated($mostAnticipated){
        $mostAnticipatedWithNewKeys = collect($mostAnticipated);

        return $mostAnticipatedWithNewKeys->map(function($game){

            return collect($game)->merge([
                'routeToSlug' => isset($game['slug']) ? route('games.show', $game['slug']): "",
                'coverUrl' => isset($game['cover']) ? str_replace('thumb', 'cover_small',$game['cover']['url']): "",
                'first_release_date_formatted' => isset($game['first_release_date']) ? date("F j, Y",$game['first_release_date']) : "",
            ]);
        })->toArray();
    }
}
