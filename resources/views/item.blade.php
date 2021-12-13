@extends('layouts.default')

@section('content')
    
        <div class="md:flex items-start justify-center py-12 2xl:px-20 md:px-6 px-4">
            <div class="xl:w-2/6 lg:w-2/5 w-80">
                <img class="w-full" alt="Product Image" src="{{ $itemDetails['item']['enrichment']['images']['primary_image_url'] }}" />
              <a href="{{ $itemDetails['item']['enrichment']['videos']['0']['video_files']['0']['video_url'] ?? '' }}" class="text">
                <img class="mt-6 w-full" src="{{ $itemDetails['item']['enrichment']['videos']['0']['video_poster_image'] ?? '' }}"/>   
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-40 mt-10">
                    Watch Video   
                </button>
                </a>
            </div>
            <div class="xl:w-2/5 md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6">
                <div class="border-b border-gray-200 pb-6">
                    <p class="text-sm leading-none text-gray-600 pb-4">{{ $itemDetails['item']['product_classification']['product_type_name'] }}</p>
                    <span class="text-sm leading-none text-gray-600 pt-8">{{ $itemDetails['taxonomy']['breadcrumbs']['1']['name'] }} <i class="fas fa-chevron-right"></i></span>
                    <span class="text-sm leading-none text-yellow-600 pt-8">
                        <a href="{!! route('subCategory', ['subCategory'=> $subCategory]) !!}"> 
                            {{ $itemDetails['taxonomy']['breadcrumbs']['2']['name'] }} 
                        </a>
                    </span>
                     <div class="text-sm leading-none text-gray-600 pt-8">{{ $itemDetails['ratings_and_reviews']['statistics']['question_count'] ?? '' }} Questions</div>
                     <div class="text-sm leading-none text-gray-600 pt-8">
                         Rating:
                          @for ($i = 0; $i < 5; $i++)
                            @if ($i < $itemDetails['ratings_and_reviews']['statistics']['rating']['average'] ?? '')
                                <i class="fas fa-star text-yellow-400"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                            @endfor
                        <span class="text-sm leading-none text-gray-600 underline">{{ $itemDetails['ratings_and_reviews']['statistics']['rating']['count'] ?? '' }}</span>
                     </div>
                    <p class="lg:text-4xl text-4xl font-semibold lg:leading-relaxed leading-relaxed text-gray-800 dark:text-white mt-8">{{ $itemDetails['item']['product_description']['title'] }}</p>
                    <p class="text-red-600 lg:text-2xl texl-2xl font-semibold my-6">{{ $itemDetails['price']['formatted_current_price'] }}</p>
                </div>
                <form action="/add_to_cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $itemDetails['tcin']}}">
                    <input type="hidden" name="name" value="{{ $itemDetails['item']['product_description']['title'] }}">
                    <input type="hidden" name="price" value="{{ $itemDetails['price']['current_retail'] ?? $itemDetails['price']['current_retail_min'] }}">
                    <input type="hidden" name="category" value="{{ $itemDetails['item']['product_classification']['product_type_name'] }}">
                    <input type="hidden" name="gallery" value="{{ $itemDetails['item']['enrichment']['images']['primary_image_url'] }}">
                         <button class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
                             Add to cart
                        </button>
                </form>
                <div>
                    <p class="xl:pr-48 text-base lg:leading-relaxed leading-relaxed text-gray-600 mt-7">{{ $itemDetails['item']['product_description']['downstream_description'] ?? ''}}</p>
                    @php
                    $detail = str_replace( array("<B>", "</B>", "<br />"), '', $itemDetails['item']['product_description']['bullet_descriptions']);  
                    @endphp
                    @foreach ($detail as $bulletPoints)
                    <p class="text-base leading-4 mt-7 text-gray-600">{{ $bulletPoints ?? '' }}</p>
                    @endforeach
                    <p class="md:w-96 text-base leading-normal text-gray-600 font-bold mt-4">Returns: {{ $itemDetails['item']['return_policies_guest_message'] ?? ''}}</p>                    
                </div>
            </div>
        </div>

        {{-- Recommended Items Section Begins --}}
        <div class="container mx-auto px-4 pt-16">
    <div class="featured-items">
        <h2 class="uppercase tracking-wider text-red-600 text-lg font-semibold">Recommended Items</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            @foreach ($Recommended as $recommendedItems)
                  <div class="mt-8">
                <a href="{!! route('item', ['tcin'=>$recommendedItems['tcin'], 'store_id'=>$itemDetails['fulfillment']['store_options']['0']['location_id'] ?? '911']) !!}">
                    <img src="{{ $recommendedItems['primary_image_url'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="" class="text-lg mt-2 hover:text-gray:300">{{ $recommendedItems['title'] }}</a>
                    <div class="flex items-center text-gray-500">
                        <span class="ml-1">Ratings: {{ $item['ratings_and_reviews']['statistics']['rating']['count'] ?? ''}}</span>
                        <span class="mx-2">|</span>
                        <span class="text-green-600"> 
                        @php
                        if(isset($recommendedItems['availability_status'])){
                            $availability = str_replace("_", ' ', $recommendedItems['availability_status']);  
                        }
                        @endphp
                        {{ $availability }} </span>
                    </div>
                    <div class="text-red-600">
                    {{ $recommendedItems['price']['formatted_current_price'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Reviews Section Begins --}}
       <div class="py-12 px-4 md:px-6 2xl:px-0 2xl:container 2xl:mx-auto flex justify-center items-center">
            <div class="flex flex-col justify-start items-start w-full space-y-8">
                <div class="flex justify-start items-start">
                    <p class="text-3xl lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800 dark:text-white ">Reviews</p>
                </div>
                @foreach ($Reviews as $ReviewDetail)
                <div class="w-full flex justify-start items-start flex-col bg-gray-50 dark:bg-gray-800 p-8">
                    <div class="flex flex-col md:flex-row justify-between w-full">
                        <div class="flex flex-row justify-between items-start">
                            <button onclick="showMenu(true)" class="ml-4 md:hidden">
                                <svg id="closeIcon" class="hidden" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 12.5L10 7.5L5 12.5" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg id="openIcon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 7.5L10 12.5L15 7.5" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                        <div class="cursor-pointer mt-2 md:mt-0">
                            @for ($i = 0; $i < 5; $i++)
                            @if ($i < $ReviewDetail['Rating'])
                                <i class="fas fa-star text-yellow-400"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                            @endfor
                        </div>
                    </div>
                    <div id="menu" class="md:block">
                        <p class="mt-3 text-base leading-normal text-gray-600 dark:text-white w-full md:w-9/12 xl:w-5/6">{{ $ReviewDetail['text'] }}</p>
                        <div class="mt-6 flex justify-start items-center flex-row space-x-2.5">
                            <div class="flex flex-col justify-start items-start space-y-2">
                                <p class="text-base font-medium leading-none text-gray-800 dark:text-white">{{ $ReviewDetail['author']['nickname'] ?? ''}}</p>
                                @php
                                $submitted_at = date('Y-m-d', strtotime($ReviewDetail['submitted_at']));   
                                @endphp
                                <p class="text-sm leading-none text-gray-600 dark:text-white">{{ $submitted_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      
    
@endsection