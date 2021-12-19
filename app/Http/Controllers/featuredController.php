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

            $zipcode = Http::get('http://ip-api.com/json/'.$clientIp)->json()['zip'];
            


             $storeList = Http::withHeaders([
            'x-rapidapi-host' => 'target1.p.rapidapi.com',
            'x-rapidapi-key' => env('RAPID_API_KEY'),
            ])->get('https://target1.p.rapidapi.com/stores/list', [
               'zipcode' => $zipcode,
            ])->json()['0']['locations'];




            //storeList variables
            foreach($storeList as $store):
                $beginTime = $store['rolling_operating_hours']['regular_event_hours']['days']['0']['hours']['0']['begin_time'];
                $openingTime = date('h:i A', strtotime($beginTime));

                $endTime = $store['rolling_operating_hours']['regular_event_hours']['days']['0']['hours']['0']['end_time'];
                $closingTime = date('h:i A', strtotime($endTime));

                $phoneNumber = $store['contact_information']['telephone_number'];

                $openStatus = $store['status'];

                $location_id = $store['location_id'];
            endforeach;
        
            
         return view('stores',[
             'clientIp' => $clientIp,
             'zipcode' => $zipcode,
             'storeList' => $storeList,
             'beginTime' => $beginTime,
             'openingTime' => $openingTime,
             'endTime' => $endTime,
            'closingTime' => $closingTime,
            'phoneNumber' => $phoneNumber,
            'openStatus' => $openStatus,
            'location_id' => $location_id,
         ]);
    }

    public function youAreShoppingAt($location_id){

        $myStore = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/stores/get-details', [
            'location_id' => $location_id,
        ])->json()['0']['location_names']['0']['name'];

         return view('layouts.default',[
             'myStore' => $myStore,
             'location_id' => $location_id,
         ]);
    }

    public function getStoreInfo($location_id){

        $storeInfo = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/stores/get-details', [
            'location_id' => $location_id,
        ])->json()['0'];

         return view('store-info',[
             'storeInfo' => $storeInfo,
             'location_id' => $location_id,
         ]);
    }


    public function index($location_id)
    {

        //pass the location_id into the 'store_id', but if there is no location_id passed in, then set it to '911'
        if(isset($location_id)){
            $store_id = $location_id;
        }else{
            $store_id = '911';
        }

      $featuredItems = Http::withHeaders([
        'x-rapidapi-host' => 'target1.p.rapidapi.com',
        'x-rapidapi-key' => env('RAPID_API_KEY'),
        ])->get('https://target1.p.rapidapi.com/products/v2/list', [
            'store_id' => $store_id,
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
            '$store_id' => $store_id,
            'Categories' => $Categories,
        ]);
    }
}