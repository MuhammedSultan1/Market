@extends('layouts.default', ['myStore' => $myStore])

@section('content')
{{-- Featured Items Section Begins --}}
<div class="container mx-auto px-4 pt-16">
    <div class="featured-items">
        <h2 class="uppercase tracking-wider text-red-600 text-lg font-semibold">Featured Items</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            @foreach ($categoryItems as $item)
                  <div class="mt-8">
                <a href="{!! route('item', ['tcin'=>$item['item']['tcin'], 'store_id'=>$item['fulfillment']['store_options']['0']['location_id']]) !!}">
                    <img src="{{ $item['item']['enrichment']['images']['primary_image_url'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="" class="text-lg mt-2 hover:text-gray:300">{{ $item['item']['product_description']['title'] }}</a>
                    <div class="flex items-center text-gray-500">
                        <span class="ml-1 text-red-600"> ${{ $item['price']['current_retail'] }}</span>
                        <span class="mx-2">|</span>
                        <span class="text-green-600"> 
                        @php
                        $availability = str_replace("_", ' ', $item['fulfillment']['store_options']['0']['in_store_only']['availability_status']);  
                        @endphp
                        {{ $availability }} </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- Featured Items Section Ends --}}
@include('layouts.moreSpace')
@endsection



