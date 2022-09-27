<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $before = Carbon::now()->subMonths(2)->timestamp;

        $after = Carbon::now()->addMonths(2)->timestamp;

        $after_four_months = Carbon::now()->addMonths(4)->timestamp;

        $current = Carbon::now()->timestamp;

        // $popularGames = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => env('IGDB_AUTHORIZATION')
        // ])->withBody(
        //     "fields *, cover.url, first_release_date, platforms.abbreviation, aggregated_rating;
        //      where cover != null & platforms = (48, 49, 130, 6) & aggregated_rating != null & platforms.abbreviation != null
        //      & (first_release_date >= {$before} & first_release_date <= {$after});
        //      sort aggregated_rating desc;
        //     limit 12;",
        //     'text/plain'
        // )->post('https://api.igdb.com/v4/games')
        // ->json();

        // $recentlyReviewed = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => env('IGDB_AUTHORIZATION')
        // ])

        // ->withBody(
        //     "fields *, cover.url, first_release_date, platforms.abbreviation, aggregated_rating, rating_count;
        //      where cover != null & platforms = (48, 49, 130, 6) & aggregated_rating != null & platforms.abbreviation != null
        //      & (first_release_date >= {$before} & first_release_date <= {$current})
        //      & rating_count > 5;
        //      sort aggregated_rating desc;
        //     limit 3;",
        //     'text/plain'
        // )->post('https://api.igdb.com/v4/games')
        // ->json();

        // $mostAnticipated = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => env('IGDB_AUTHORIZATION')
        // ])

        // ->withBody(
        //     "fields *, cover.url, first_release_date, cover, name, rating;
        //      where cover != null & (first_release_date >= {$current} & first_release_date <= {$after_four_months});
        //      sort rating desc;
        //     limit 4;",
        //     'text/plain'
        // )->post('https://api.igdb.com/v4/games')
        // ->json();


        // $comingSoon = Http::withHeaders([
        //     'Client-ID' => env('IGDB_CLIENT_ID'),
        //     'Authorization' => env('IGDB_AUTHORIZATION')
        // ])

        // ->withBody(
        //     "fields *, cover.url, first_release_date, cover, name, rating;
        //      where cover != null & (first_release_date >= {$current} & first_release_date <= {$after});
        //      sort first_release_date asc;
        //     limit 4;",
        //     'text/plain'
        // )->post('https://api.igdb.com/v4/games')
        // ->json();

        // dump($popularGames);

        // dump($recentlyReviewed);

        // dump($mostAnticipated); // dump to show on the front page to check out the info from the api

        return view('index', [
            // 'popularGames' => $popularGames,
            // 'recentlyReviewed' => $recentlyReviewed,
            // 'mostAnticipated' => $mostAnticipated,
            // 'comingSoon' => $comingSoon
        ]);
        // (this 'popularGames' var will be sent to index.blade.php) => $popularGames,
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $unformattedGame =  Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => env('IGDB_AUTHORIZATION')
        ])->withBody(
            "fields *, cover.url, rating, aggregated_rating, genres.name, involved_companies.company.*, 
            similar_games.*, similar_games.slug, similar_games.name, similar_games.cover.url, similar_games.platforms.abbreviation, summary, platforms.abbreviation, videos.*, screenshots.*; where slug=\"{$slug}\";",
            'text/plain'
        )->post('https://api.igdb.com/v4/games')
        ->json();

       

        abort_if(!$unformattedGame, 404); // output 404 to the page when the game slug is wrong


        $game = $this->formatGame($unformattedGame[0]);

        // dump($game);
        return view('show',[
            'game' => $game,
        ]);
    }

    public function formatGame($game) {
        

        return collect($game)->merge([
            'coverUrlBig' => str_replace('thumb', 'cover_big',$game['cover']['url']),
            'formatted_first_release_date' => isset($game['first_release_date'])? date("F j, Y",$game['first_release_date']): "",
            'formatted_rating' => isset($game['rating']) ?  floor($game['rating'])."%" : "0%",
            'formatted_aggregated_rating' => isset($game['aggregated_rating']) ?  floor($game['aggregated_rating'])."%" : "0%",
            'formatted_summary' => isset($game['summary']) ? $game['summary']: "",
            'formatted_genres' => isset($game['genres']) ? collect($game['genres'])->pluck('name')->implode(", ") : "No Genre Info",
            'formatted_involved_companies' => isset($game['involved_companies']) ? collect($game['involved_companies'])->pluck('company')->pluck('name')->implode(", ") : "No Company Info",
            'formatted_platforms' => isset($game['platforms']) ? collect($game['platforms'])->pluck('abbreviation')->implode(', ') : "No Platform Info",
            'formatted_screenshots' => isset($game['screenshots']) ? collect($game['screenshots'])->map(function($item){
                $newItem = $item['url'];
                return collect($item)->merge([
                    'huge'=> str_replace('thumb', 'screenshot_huge',$newItem),
                    'big'=>str_replace('thumb', 'screenshot_big',$newItem),
                ])->toArray();
            }):[],
            'formatted_similar_games' => isset($game['similar_games']) ? collect($game['similar_games'])->map(function($item){
                return collect($item)->merge([
                    'routeToSlug' => route('games.show', $item['slug']),
                    'coverBig' => isset($item['cover'])? str_replace('thumb', 'cover_big',$item['cover']['url']):"",
                    'formatted_aggregated_rating' => isset($item['aggregated_rating'])? strval(floor($item['aggregated_rating']))."%": (isset($item['rating'])?strval(floor($item['rating']))."%": "0%"),
                    'formatted_plateforms' => isset($item['platforms'])? collect($item['platforms'])->pluck('abbreviation')->implode(', '): "No Platform Info",
                ])->toArray();
            }):[],
        ])->toArray();

    //     @if (isset($item['cover']))
    //     <img src={{str_replace('thumb', 'cover_big',$item['cover']['url'])}} alt="gamecovers" class="hover:opacity-75 transition ease-in-out duration-150">
    // @endif 

        // @if (isset($game['screenshots'] ))
        //         @foreach ($game['screenshots'] as $item)
        //             <div class="w-full h-full">
        //                 <a href={{str_replace('thumb', 'screenshot_huge',$item['url'])}}>
        //                     <img class="hover:opacity-75 transition ease-in-out duration-150" src={{str_replace('thumb', 'screenshot_big',$item['url'])}} alt="battlefield">
        //                 </a>
        //             </div>
        //         @endforeach
        //     @else
        //         <div>Screenshots N/A :(</div>
        //     @endif
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
