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

    public function getLocation(Request $request){

         if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            }
            $client  = @$_SERVER['HTTP_CLIENT_IP'];
            $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            $remote  = $_SERVER['REMOTE_ADDR'];

            if(filter_var($client, FILTER_VALIDATE_IP)){
                $clientIp = $client;
            }
            elseif(filter_var($forward, FILTER_VALIDATE_IP)){
                $clientIp = $forward;
            }
            else{
                $clientIp = $remote;
            }

            //dump($clientIp);
        
          $zipcode = Http::withHeaders([
            'x-rapidapi-host' => 'target1.p.rapidapi.com',
            'x-rapidapi-key' => env('RAPID_API_KEY'),])
            ->get('https://ip-geolocation-and-threat-detection.p.rapidapi.com/'.$clientIp)
            ->json()['location']['postal'];

            dump($zipcode);

          $storeList = Http::withHeaders([
         'x-rapidapi-host' => 'target1.p.rapidapi.com',
         'x-rapidapi-key' => env('RAPID_API_KEY'),
         ])->get('https://target1.p.rapidapi.com/stores/list', [
            'zipcode' => $zipcode,
         ])->json()['0']['locations'];


        
         return view('stores',[
             'clientIp' => $clientIp,
             'zipcode' => $zipcode,
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