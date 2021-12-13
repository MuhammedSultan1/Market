<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($catID)
    {
        $categoryItems = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/products/v2/list', [
            'store_id' => '911',
            'category' => $catID,
            'count' => '20',
            'offset' => '0',
            'default_purchasability_filter' => 'true',
            'sort_by' => 'relevance',
        ])->json()['data']['search']['products'];


         return view('category',[
             'categoryItems' => $categoryItems,
         ]);
    
    }

}