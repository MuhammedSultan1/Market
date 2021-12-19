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