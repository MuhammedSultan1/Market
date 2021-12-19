@extends('layouts.default')

@section('content')

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ $storeInfo['location_names']['0']['name'] }}</h1>
      <h4 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ $storeInfo['address']['address_line1'] ?? '' }}, {{ $storeInfo['address']['city'] ?? '' }}, {{ $storeInfo['address']['state'] ?? '' }}, {{ $storeInfo['address']['postal_code'] ?? '' }} </h4>
      <h4 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ $storeInfo['contact_information']['0']['telephone_number'] ?? '' }}</h4>
      <h4 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-green-900">This store is currently {{ $storeInfo['status'] ?? '' }}</h4>
      <a href="store-info" class="lg:w-1/2 w-full leading-relaxed underline text-yellow-500">Find another store</a>
      <a href="#"> <button class="flex mx-auto mt-16 text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">Make this my store</button></a>
    </div>
  </div>
</section>
@include('layouts.moreSpace')
@endsection