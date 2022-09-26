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
        return view('show');
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
