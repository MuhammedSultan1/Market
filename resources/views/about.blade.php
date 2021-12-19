@extends('layouts.default', ['myStore' => $myStore])

@section('content')
{{-- <div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 h-screen">
      <div class="flex bg-white p-10">
        <div class="mb-auto mt-auto max-w-lg">
          <h1 class="text-3xl uppercase">Muhammed Sultan</h1>
          <p class="font-semibold mb-5">Web Developer</p>
          <p>This project was built using Laravel. It uses the Target API from RapidAPI.com along with an IP address API.</p>
          <button class="bg-black rounded-md py-3 px-7 mt-6 text-white">Email Me</button>
        </div>
      </div>
    </div>
  </div> --}}
  <article class="px-4 py-24 mx-auto max-w-7xl" itemid="#" itemscope itemtype="http://schema.org/BlogPosting">
  <div class="w-full mx-auto mb-12 text-center md:w-2/3">
    <p class="mb-3 text-xs font-semibold tracking-wider text-gray-500 uppercase">Development</p>
    <h1 class="mb-3 text-4xl font-bold text-gray-900 md:leading-tight md:text-5xl" itemprop="headline" title="Rise of Tailwind - A Utility First CSS Framework">
        About this project
    </h1>
    <p class="text-gray-700">
        Muhammed Sultan
    </p>
  </div>

  <div class="mx-auto prose">
    <h4 class="font-semibold pb-4">Basic information about this project</h4>
    <p>
      This project was built with the Target API along with an IP address API. The purpose of this project was to build up my confidence in working with Laravel.
    </p>
    <h4 class="font-semibold pt-8">What did I learn from building this project?</h4>
    <p class="pt-4">
        I learned how to use the MVC design pattern. I learned about blade templates, routes, authenticating users with Laravel, database migrations, database seeders, middleware, and how to use Livewire.
    </p>
    <h4 class="font-semibold pt-8">Challenges that I faced and how I solved them</h4>
    <p class="pt-4">
        I was finding it difficult to...
    </p>
  </div>
</article>

@endsection