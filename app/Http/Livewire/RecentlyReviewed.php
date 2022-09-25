<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Http;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed() {

        $before = Carbon::now()->subMonths(2)->timestamp;

        $current = Carbon::now()->timestamp;

        $this->recentlyReviewed = Cache::remember('recently-reviewed', 100, function() use($current, $before){
            return Http::withHeaders([
                'Client-ID' => env('IGDB_CLIENT_ID'),
                'Authorization' => env('IGDB_AUTHORIZATION')
            ])->withBody(
                "fields *, cover.url, first_release_date, platforms.abbreviation, aggregated_rating, rating_count;
                where cover != null & platforms = (48, 49, 130, 6) & aggregated_rating != null & platforms.abbreviation != null
                & (first_release_date >= {$before} & first_release_date <= {$current})
                & rating_count > 5;
                sort aggregated_rating desc;
                limit 3;",
                'text/plain'
            )->post('https://api.igdb.com/v4/games')
            ->json();
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
