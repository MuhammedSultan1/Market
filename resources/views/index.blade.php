@extends('layouts.default')

@section('content')
{{-- Featured Items Section Begins --}}
<div class="container mx-auto px-4 pt-16">
    <div class="featured-items">
        <h2 class="uppercase tracking-wider text-red-600 text-lg font-semibold">Featured Items</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            @foreach ($featuredItems as $item)
                  <div class="mt-8">
                <a href="{!! route('item', ['tcin'=>$item['item']['tcin'], 'store_id'=>$item['fulfillment']['store_options']['0']['location_id']]) !!}">
                    <img src="{{ $item['item']['enrichment']['images']['primary_image_url'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="" class="text-lg mt-2 hover:text-gray:300">{{ $item['item']['product_description']['title'] }}</a>
                    <div class="flex items-center text-gray-500">
                        <span class="text-red-600">
                       ${{ $item['price']['current_retail'] }}
                       </span>
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

{{-- Categories Section Begins --}}
<div class="container mx-auto px-4 pt-16">
    <div class="featured-items">
        <h2 class="uppercase tracking-wider text-gray-900 text-4xl font-semibold text-center">Featured Categories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            @foreach ($Categories as $Category)
                  <div class="mt-8">
                       @php
                      $catID = str_replace("target://landing/custom?category=", '', $Category['actions']['0']['target']);
                      @endphp
                <a href="{!! route('category', ['category'=>$catID]) !!}">
                    <img src="{{ $Category['image']['uri'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150 w-36 h-36">
                </a>
                <div class="mt-2">
                    <a href="" class="text-lg mt-2 hover:text-gray:300"></a>
                    <div class="text-gray-700">
                    {{ $Category['displayText'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- Categories Section Ends --}}

{{-- Shop easily section begins --}}

<div class="pb-12 pt-32	bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="lg:text-center">
      <h2 class="text-base text-red-600 font-semibold tracking-wide uppercase">Why shop with us?</h2>
      <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
        A better way to spend money
      </p>
      <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
        When you shop with us, your overall exeperience will be better compared to when you shop with our competitors.
      </p>
    </div>

    <div class="mt-10">
      <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
              <!-- Heroicon name: outline/globe-alt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">High quality products</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            All of our products are of the best quality. We will never sell low quality items.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
              <!-- Heroicon name: outline/scale -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">No hidden fees</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            Our goal is to remain completely transparent with our customers. You will never have to worry about hidden fees when shopping with us.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
              <!-- Heroicon name: outline/lightning-bolt -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Free shipping</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            We provide free shipping on orders that are $500 or more.
          </dd>
        </div>

        <div class="relative">
          <dt>
            <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-red-500 text-white">
              <!-- Heroicon name: outline/annotation -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
              </svg>
            </div>
            <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Mobile notifications</p>
          </dt>
          <dd class="mt-2 ml-16 text-base text-gray-500">
            We will let you know when your order is ready to be picked up from our store. We also send notifications when your items are being delivered to your home.
          </dd>
        </div>
      </dl>
    </div>
  </div>
</div>

{{-- Shop easily section ends --}}
@include('layouts.moreSpace')
@endsection

