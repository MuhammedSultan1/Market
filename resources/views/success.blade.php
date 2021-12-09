@extends('layouts.default')

@section('content')
    <div class="dark:bg-gray-900">
      <section class="mx-auto container w-full py-36">
        <div class="flex flex-col justify-center items-center">
          <div class="md:text-5xl text-4xl font-black text-center text-gray-800 dark:text-white leading-snug lg:w-3/4">
            <h2>Success!</h2>
            <h6>Your items should be ready for you soon.</h6>
          </div>
          <div class="flex justify-center items-center mt-16 ">
            <a href="/home" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-800 hover:opacity-90 w-48 h-11 text-xl pt-1.5 text-white text-center bg-gradient-to-l from-red-500 to-red-600 rounded">Back to home</a>
          </div>
        </div>
      </section> 
    </div>
@endsection