<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class featuredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getLocation(){
         $clientIP = \Request::ip();
         echo $clientIP;

         $getClientLocation = Http::withHeaders([
         'x-rapidapi-host' => 'target1.p.rapidapi.com',
         ])->get('https://find-any-ip-address-or-domain-location-world-wide.p.rapidapi.com/iplocation', [
             'ip' => $clientIP,
             'apikey' => env('RAPID_API_KEY'),
         ])->json()['zipCode'];

         $storeList = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/stores/list', [
           'zipcode' => $getClientLocation,
        ])->json()['0']['locations'];

        
         return view('stores',[
             'clientIP' => $clientIP,
             'getClientLocation' => $getClientLocation,
             'storeList' => $storeList,
         ]);
    }


    public function index()
    {
       
      $featuredItems = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/products/v2/list', [
            'store_id' => '911',
            'category' => '5xt1a',
            'count' => '20',
            'offset' => '0',
            'default_purchasability_filter' => 'true',
            'sort_by' => 'relevance',
        ])->json()['data']['search']['products'];

       $CategoriesRequest = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/categories/list',)
        ->json()['components']['1']['cells']['items'];
    
        $CategoriesCollection = collect($CategoriesRequest);

        $Categories = $CategoriesCollection->whereNotIn('displayText', ['Christmas', 'Gift Ideas', 'What\'s New', 'Pharmacy', 'RedCard', 'Pharmacy', 'Shipping & Order Services']);


        return view('index',[
            'featuredItems' => $featuredItems,
            'Categories' => $Categories,
        ]);
    }
}