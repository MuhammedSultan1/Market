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


{{-- More ways to save begins  --}}

        <div class="2xl:container 2xl:mx-auto lg:px-20 md:py-12 md:px-6 py-9 px-4">
            <h2 class="uppercase tracking-wider text-gray-900 text-4xl font-semibold text-center mb-16">More ways to save</h2>
            <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 lg:gap-8 gap-6">
                <!-- Top Deals Grid Card -->
                <div class="p-6 bg-red-700 dark:bg-gray-800">
                    <svg class="text-white dark:text-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 21H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M3 7V8C3 8.79565 3.31607 9.55871 3.87868 10.1213C4.44129 10.6839 5.20435 11 6 11C6.79565 11 7.55871 10.6839 8.12132 10.1213C8.68393 9.55871 9 7.79565 9 7M3 7H9M3 7H21M3 7L5 3H19L21 7M9 7C9 7.79565 9.31607 9.55871 9.87868 10.1213C10.4413 10.6839 11.2044 11 12 11C12.7956 11 13.5587 10.6839 14.1213 10.1213C14.6839 9.55871 15 8.79565 15 8M9 7H15V8M15 8C15 8.79565 15.3161 9.55871 15.8787 10.1213C16.4413 10.6839 17.2044 11 18 11C18.7956 11 19.5587 10.6839 20.1213 10.1213C20.6839 9.55871 21 8.79565 21 8V7"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                        <path d="M5 20.9996V10.8496" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19 20.9996V10.8496" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 21V17C9 16.4696 9.21071 15.9609 9.58579 15.5858C9.96086 15.2107 10.4696 15 11 15H13C13.5304 15 14.0391 15.2107 14.4142 15.5858C14.7893 15.9609 15 16.4696 15 17V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-5xl text-white dark:text-white font-semibold leading-5 mt-6 mb-6">Top Deals</p>
                    <p class="font-normal text-base leading-6 dark:text-gray-300 text-white my-4">Check out our best deals.</p>
                    <a class="cursor-pointer text-base dark:text-white leading-4 dark:border-white font-medium text-white border-b-2 border-gray-800 hover:text-gray-50">Learn More</a>
                </div>

                    <!-- Clearance Grid Card -->
                <div class="p-6 bg-yellow-300 dark:bg-gray-800">
                    <svg class="text-gray-800 dark:text-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 17C14.7614 17 17 14.7614 17 12C17 9.23858 14.7614 7 12 7C9.23858 7 7 9.23858 7 12C7 14.7614 9.23858 17 12 17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11 3H13M12 7V3V7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17.6569 4.92871L19.0711 6.34292M15.5355 8.46424L18.364 5.63582L15.5355 8.46424Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M21 11V13M17 12H21H17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M19.071 17.6572L17.6568 19.0714M15.5355 15.5359L18.3639 18.3643L15.5355 15.5359Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M13 21H11M12 17V21V17Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M6.34314 19.0713L4.92893 17.6571M8.46446 15.5358L5.63603 18.3642L8.46446 15.5358Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M3 13L3 11M7 12H3H7Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M4.92896 6.34277L6.34317 4.92856M8.46449 8.46409L5.63606 5.63567L8.46449 8.46409Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="text-5xl text-gray-800 dark:text-white font-semibold leading-5 mt-6 mb-6">Clearance</p>
                    <p class="font-normal text-base leading-6 dark:text-gray-300 text-gray-800 my-4">View our products that are on clearance.</p>
                    <a class="cursor-pointer text-base dark:text-white leading-4 dark:border-white font-medium text-gray-800 border-b-2 border-gray-800 hover:text-gray-600">Learn More</a>
                </div>
            </div>
        </div>
    
{{-- More ways to save ends --}}
@endsection

