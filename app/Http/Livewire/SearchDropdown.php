<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class SearchDropdown extends Component
{
    public $search = '';
    
    public function render()
    {
        $searchResults = [];

        if(strlen($this->search) >= 2){
            $searchResults = Http::withHeaders([
            'x-rapidapi-host' => 'target1.p.rapidapi.com',
            'x-rapidapi-key' => env('RAPID_API_KEY'),
            ])->get('https://target1.p.rapidapi.com/products/v2/list', [
                'store_id' => '911',
                'keyword' => $this->search,
                'count' => '20',
                'offset' => '0',
                'default_purchasability_filter' => 'true',
                'sort_by' => 'relevance',
            ])->json()['data']['search']['products'];
        }



        return view('livewire.search-dropdown',[
            'searchResults' => collect($searchResults)->take(7),
        ]);
    }
}