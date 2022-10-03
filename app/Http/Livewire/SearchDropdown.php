<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SearchDropdown extends Component
{
    public $search = "";
    public $searchResult = [];


    public function render()
    {
        if (strlen($this->search) > 20) {
            $this->search = substr($this->search,0, 20);
        }
        $this->search = filter_var($this->search, FILTER_SANITIZE_SPECIAL_CHARS);
        if (strlen($this->search) > 0) {
            $this->searchResult =  Http::withHeaders([
                'Client-ID' => env('IGDB_CLIENT_ID'),
                'Authorization' => env('IGDB_AUTHORIZATION')
            ])->withBody(
                "search \"{$this->search}\";
                fields name, cover.url, slug;
                where cover != null;
               limit 10;",
               'text/plain'
            )->post('https://api.igdb.com/v4/games')
            ->json();
        } else {
            $this->searchResult = [];
        }
        
    
        // $this->searchResult = $searchResult;
        return view('livewire.search-dropdown');
    }
}
