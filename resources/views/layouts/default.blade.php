<?php 
use App\Http\Controllers\ProductController;
$total = 0;
if(Session::has('user'))
{
    $total = ProductController::cartItem();
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Market</title>

        <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @livewireStyles
    </head>
    <body class="font-sans text-gray-700">

        {{-- Navbar Begins --}}
        

        <nav class="border-b border-gray-400 bg-red-600">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
                <ul class="flex flex-col md:flex-row items-center">
                    <li>
                        <a href="{{ url('/') }}" class="text-white">Market</a>
                    </li>
                    <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="{{ url('/') }}" class="text-white">Home</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('cart') }}" class="text-white">Cart</a>
                    </li>
                    @if(Session::has('user'))
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('logout') }}" class="text-white">Log Out</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('myorders') }}" class="text-white">My Orders</a>
                    </li>
                       <li class="md:ml-6 mt-3 md:mt-0">
                        <span class="text-white">{{ Session::get('user')['name'] }}</span>
                    </li>
                    @else
                     <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('login') }}" class="text-white">Log In</a>
                    </li>
                    @endif
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('register') }}" class="text-white">Sign Up</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('about') }}" class="text-white">About This Project</a>
                    </li>
                </ul>
                <livewire:search-dropdown>
            </div>
        </nav>

      
      {{-- Navbar Ends --}}
    
      {{-- Quick Links Begins --}}

       <nav class="border-b border-gray-200 bg-gray-50">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-4">
                <ul class="flex flex-col md:flex-row items-center">
                     <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="{{ url('stores') }}" class="text-gray-500">You are shopping at:</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{!! route('category', ['category'=>'5q0ga']) !!}" class="text-gray-500">Clearance</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{!! route('category', ['category'=>'4xw74']) !!}" class="text-gray-500">Top Deals</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{!! route('category', ['category'=>'5xsxu']) !!}" class="text-gray-500">Gift Cards</a>
                    </li>
                    <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('stores') }}" class="text-gray-500">Find Stores</a>
                    </li>
                     <li class="md:ml-6 mt-3 md:mt-0">
                        <a href="{{ url('cart') }}" class="text-gray-500">Items in the cart: {{ $total }}</a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Quick Links Ends --}}




        @yield('content')



        {{-- Footer Begins --}}

        <div class="mx-auto container xl:px-20 lg:px-12 sm:px-6 px-4 px-4 py-12">
            <div class="flex flex-col items-center justify-center">
                <div class="flex flex-wrap sm:gap-10 gap-8 items-center justify-center mt-8">
                    <a href="{{ url('about') }}" class="focus:underline focus:outline-none hover:text-gray-500 text-base cursor-pointer leading-4 text-gray-800 dark:text-gray-400 dark:hover:text-white">About</a>
                    <a href="javascript:void(0)" class="focus:underline focus:outline-none hover:text-gray-500 text-base cursor-pointer leading-4 text-gray-800 dark:text-gray-400 dark:hover:text-white">Pricing</a>
                    <a href="javascript:void(0)" class="focus:underline focus:outline-none hover:text-gray-500 text-base cursor-pointer leading-4 text-gray-800 dark:text-gray-400 dark:hover:text-white">Terms of Service</a>
                    <a href="javascript:void(0)" class="focus:underline focus:outline-none hover:text-gray-500 text-base cursor-pointer leading-4 text-gray-800 dark:text-gray-400 dark:hover:text-white">Privacy Policy</a>
                </div>
                <div class="flex items-center gap-x-8 mt-6">
                    <a href="https://github.com/MuhammedSultan1">
                    <button aria-label="My GitHub" class="p-3 rounded-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5 fill-current">
                            <path d="M16 0.396c-8.839 0-16 7.167-16 16 0 7.073 4.584 13.068 10.937 15.183 0.803 0.151 1.093-0.344 1.093-0.772 0-0.38-0.009-1.385-0.015-2.719-4.453 0.964-5.391-2.151-5.391-2.151-0.729-1.844-1.781-2.339-1.781-2.339-1.448-0.989 0.115-0.968 0.115-0.968 1.604 0.109 2.448 1.645 2.448 1.645 1.427 2.448 3.744 1.74 4.661 1.328 0.14-1.031 0.557-1.74 1.011-2.135-3.552-0.401-7.287-1.776-7.287-7.907 0-1.751 0.62-3.177 1.645-4.297-0.177-0.401-0.719-2.031 0.141-4.235 0 0 1.339-0.427 4.4 1.641 1.281-0.355 2.641-0.532 4-0.541 1.36 0.009 2.719 0.187 4 0.541 3.043-2.068 4.381-1.641 4.381-1.641 0.859 2.204 0.317 3.833 0.161 4.235 1.015 1.12 1.635 2.547 1.635 4.297 0 6.145-3.74 7.5-7.296 7.891 0.556 0.479 1.077 1.464 1.077 2.959 0 2.14-0.020 3.864-0.020 4.385 0 0.416 0.28 0.916 1.104 0.755 6.4-2.093 10.979-8.093 10.979-15.156 0-8.833-7.161-16-16-16z"></path>
                        </svg>
                    </button>
                    </a>
                </div>
                <div class="flex items-center mt-6">
                    <p class="text-base leading-4 text-gray-800 dark:text-gray-400">2021 <span class="font-semibold">Market</span></p>
                    <div class="border-l border-gray-800 pl-2 ml-2">
                        <p class="text-base leading-4 text-gray-800 dark:text-gray-400">Built with Laravel.</p>
                    </div>
                </div>
            </div>
        </div>
    
        {{-- Footer Ends --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>
        @livewireScripts
    </body>
</html>
