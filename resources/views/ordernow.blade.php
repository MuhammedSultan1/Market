@extends('layouts.default')

@section('content')

        <div class="flex justify-center items-center 2xl:container 2xl:mx-auto lg:py-16 md:py-12 py-9 px-4 md:px-6 lg:px-20 xl:px-44">
            <div class="flex w-full sm:w-9/12 lg:w-full flex-col lg:flex-row justify-center items-center lg:space-x-10 2xl:space-x-36 space-y-12 lg:space-y-0">
                <div class="flex w-full flex-col justify-start items-start">
                    <div class="">
                        <p class="text-3xl lg:text-4xl dark:text-white font-semibold leading-7 lg:leading-9 text-gray-800">Check out</p>
                    </div>
                    <div class="mt-2">
                        <a href="javascript:void(0)" class="text-base dark:text-gray-400 leading-4 underline hover:text-gray-800 text-gray-600">Back to my bag</a>
                    </div>
                    <div class="mt-12">
                        <p class="text-xl font-semibold dark:text-white leading-5 text-gray-800">Shipping Details</p>
                    </div>
                    <form action="/orderplace" method="POST">
                        @csrf
                    <div class="mt-8 flex flex-col justify-start items-start w-full space-y-8">
                        <input class="px-2 focus:outline-none dark:bg-transparent dark:text-gray-400 dark:placeholder-gray-400 focus:ring-2 focus:ring-gray-500 border-b border-gray-200 leading-4 text-base placeholder-gray-600 py-4 w-full" type="text" placeholder="First Name" />
                        <input class="px-2 focus:outline-none  dark:bg-transparent dark:text-gray-400 dark:placeholder-gray-400 focus:ring-2 focus:ring-gray-500 border-b border-gray-200 leading-4 text-base placeholder-gray-600 py-4 w-full" type="text" placeholder="Last Name" />
                        <input class="px-2 focus:outline-none dark:bg-transparent dark:text-gray-400 dark:placeholder-gray-400 focus:ring-2 focus:ring-gray-500 border-b border-gray-200 leading-4 text-base placeholder-gray-600 py-4 w-full" type="text" placeholder="Address" />
                        <input class="px-2 focus:outline-none dark:bg-transparent dark:text-gray-400 dark:placeholder-gray-400 focus:ring-2 focus:ring-gray-500 border-b border-gray-200 leading-4 text-base placeholder-gray-600 py-4 w-full" type="text" placeholder="Address (line 02)" />
                        <div class="flex justify-between flex-col sm:flex-row w-full items-start space-y-8 sm:space-y-0 sm:space-x-8">
                            <div class="relative w-full">
                                <input type="text" id="city" class="px-2 border-b dark:text-gray-400 border-gray-200 text-left leading-4 text-base placeholder-gray-600 py-4 w-full" placeholder="City"/>
                                <button onclick="showMenu1(true)" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-2 focus:ring-gray-500 rounded-full cursor-pointer absolute bottom-4 right-0">
                                    <svg id="close" class="" width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6L8 10L4 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg id="open" class="hidden transform rotate-180" width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6L8 10L4 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div id="menu" class="shadow absolute z-10 bg-white top-10 w-full mt-3 hidden">
                                    <div class="flex flex-col w-full">
                                        <p tabindex="0" onclick="changeButton1('London')" class="focus:outline-none dark:bg-gray-800 dark:text-white cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">London</p>
                                        <p tabindex="0" onclick="changeButton1('New York')" class="focus:outline-none dark:bg-gray-800 dark:text-white cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">New York</p>
                                        <p tabindex="0" onclick="changeButton1('Dubai')" class="focus:outline-none dark:bg-gray-800 dark:text-white cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">Dubai</p>
                                    </div>
                                </div>
                            </div>
    
                            <div class="relative w-full">
                                <input type="text" id="State" class="px-2 border-b dark:text-gray-400 border-gray-200 text-left leading-4 text-base placeholder-gray-600 py-4 w-full" placeholder="State"/>
                                <button onclick="showMenu2(true)" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-2 focus:ring-gray-500 rounded-full cursor-pointer absolute bottom-4 right-0">
                                    <svg id="close2" class="" width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6L8 10L4 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg id="open2" class="hidden transform rotate-180" width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6L8 10L4 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div id="menu2" class="absolute z-10 bg-white top-10 shadow w-full mt-3 hidden">
                                    <div class="flex flex-col w-full">
                                        <p tabindex="0" onclick="changeButton2('London')" class="dark:bg-gray-800 dark:text-white focus:outline-none cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">London</p>
                                        <p tabindex="0" onclick="changeButton2('New York')" class="dark:bg-gray-800 dark:text-white focus:outline-none cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">New York</p>
                                        <p tabindex="0" onclick="changeButton2('Dubai')" class="dark:bg-gray-800 dark:text-white focus:outline-none cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">Dubai</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between flex-col sm:flex-row w-full items-start space-y-8 sm:space-y-0 sm:space-x-8">
                            <div class="relative w-full">
                                <input type="text" id="button3" class="px-2 border-b dark:text-gray-400 border-gray-200 text-left leading-4 text-base placeholder-gray-600 py-4 w-full" placeholder="Country"/>
                                <button onclick="showMenu3(true)" class="text-gray-600 dark:text-gray-400 focus:outline-none focus:ring-2 focus:ring-2 focus:ring-gray-500 rounded-full cursor-pointer absolute bottom-4 right-0">
                                    <svg id="close3" class="" width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6L8 10L4 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <svg id="open3" class="hidden transform rotate-180" width="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 6L8 10L4 6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <div id="menu3" class="absolute z-10 bg-white top-10 shadow w-full mt-3 hidden">
                                    <div class="flex flex-col w-full">
                                        <p tabindex="0 " onclick="changeButton3('USA')" class=" dark:text-white dark:bg-gray-800 focus:outline-none cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">USA</p>
                                        <p tabindex="0 " onclick="changeButton3('UK')" class=" dark:text-white dark:bg-gray-800 focus:outline-none cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">UK</p>
                                        <p tabindex="0 " onclick="changeButton3('Russia')" class=" dark:text-white dark:bg-gray-800 focus:outline-none cursor-pointer px-3 hover:text-white hover:bg-gray-800 focus:bg-gray-800 focus:text-white text-left text-base text-gray-600 py-2 w-full">Russia</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full">
                                <input class="focus:outline-none dark:text-gray-400 dark:bg-transparent dark:placeholder-gray-400 focus:ring-2 focus:ring-gray-500 px-2 border-b border-gray-200 leading-4 text-base placeholder-gray-600 pt-4 pb-3 w-full" type="text" placeholder="Zip Code" />
                            </div>
                        </div>
                        <textarea name="address" class="focus:outline-none dark:text-gray-400 dark:bg-transparent dark:placeholder-gray-400 focus:ring-2 focus:ring-gray-500 px-2 border-b border-gray-200 leading-4 text-base placeholder-gray-600 py-4 w-full" type="email" placeholder="Email">Your Email</textarea>
                    </div>

            <div role="radiogroup" class="mx-auto py-12 flex justify-center">
                <!-- Code block starts -->
                <div class="flex items-center">
                    <div class="bg-white dark:bg-gray-100 rounded-full w-4 h-4 flex flex-shrink-0 justify-center items-center relative">
                        <input aria-labelledby="label1" checked type="radio" value="Pay Online" name="payment" class="checkbox appearance-none focus:opacity-100 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none border rounded-full border-gray-400 absolute cursor-pointer w-full h-full checked:border-none" />
                        <div class="check-icon hidden border-4 border-indigo-700 rounded-full w-full h-full z-1"></div>
                    </div>
                    <label id="label1" class="ml-2 text-sm leading-4 font-normal text-gray-800 dark:text-gray-100">Pay Online</label>
                </div>
                <!-- Code block ends -->
                <!-- Code block starts -->
                <div class="flex items-center ml-6">
                    <div class="bg-white dark:bg-gray-100 rounded-full w-4 h-4 flex flex-shrink-0 justify-center items-center relative">
                        <input aria-labelledby="label2" type="radio" value="Payment on delivery" name="payment" class="checkbox appearance-none focus:opacity-100 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none border rounded-full border-gray-400 absolute cursor-pointer w-full h-full checked:border-none" />
                        <div class="check-icon hidden border-4 border-indigo-700 rounded-full w-full h-full z-1"></div>
                    </div>
                    <label id="label2" class="ml-2 text-sm leading-4 font-normal text-gray-800 dark:text-gray-100">Payment on delivery</label>
                </div>
                <!-- Code block ends -->
                <style>
                    .checkbox:checked {
                        border: none;
                    }
                    .checkbox:checked + .check-icon {
                        display: flex;
                    }
                </style>
            </div>

                @foreach ($product as $item)
                <input type="hidden" name="product_id" value="{{ $item['tcin']}}">
                <input type="hidden" name="name" value="{{ $item['item']['product_description']['title'] }}">
                <input type="hidden" name="price" value="{{ $item['price']['current_retail'] }}">
                <input type="hidden" name="category" value="{{ $item['item']['product_classification']['product_type_name'] }}">
                <input type="hidden" name="gallery" value="{{ $item['item']['enrichment']['images']['primary_image_url'] }}">
                @endforeach
                    <button type="submit" class="focus:outline-none focus:ring-2 dark:bg-gray-800 dark:text-white focus:ring-gray-500 focus:ring-offset-2 mt-8 text-base font-medium focus:ring-2 focus:ring-ocus:ring-gray-800 leading-4 hover:bg-black py-4 w-full md:w-4/12 lg:w-full text-white bg-gray-800">Proceed to payment</button>
                    </form>
                    <div class="mt-4 flex justify-start items-center w-full">
                        <a href="cart" class="text-base leading-4 dark:text-gray-400 hover:underline focus:outline-none focus:text-gray-500 hover:text-gray-800 text-gray-600">Back to my bag</a>
                    </div>
                </div>
    
                <div class="flex flex-col justify-start items-start bg-gray-50 dark:bg-gray-800 w-full p-6 md:p-14">
                    <div>
                        <h1 class="text-2xl  dark:text-white font-semibold leading-6 text-gray-800">Order Summary</h1>
                    </div>
                    <div class="flex mt-7 flex-col items-end w-full space-y-6">
                        <div class="flex justify-between w-full items-center">
                            <p class="text-lg dark:text-gray-300 leading-4 text-gray-600">Total items</p>
                            <p class="text-lg dark:text-gray-300 font-semibold leading-4 text-gray-600">{{ $count }}</p>
                        </div>
                        <div class="flex justify-between w-full items-center">
                            <p class="text-lg dark:text-gray-300 leading-4 text-gray-600">Total Charges</p>
                            <p class="text-lg dark:text-gray-300 font-semibold leading-4 text-gray-600">${{ $total }}</p>
                        </div>
                        <div class="flex justify-between w-full items-center">
                            <p class="text-lg dark:text-gray-300 leading-4 text-gray-600">Shipping charges</p>
                            <p class="text-lg dark:text-gray-300 font-semibold leading-4 text-gray-600">Free</p>
                        </div>
                    </div>
                    <div class="flex justify-between w-full items-center mt-32">
                        <p class="text-xl dark:text-white font-semibold leading-4 text-gray-800">Total</p>
                        <p class="text-lg dark:text-white font-semibold leading-4 text-gray-800">${{ $total }}</p>
                    </div>
                </div>
            </div>
        </div>
      
    @endsection