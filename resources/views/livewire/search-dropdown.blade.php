<div class="relative mt-3 md:mt-0">
    <input wire:model.debounce.500ms="search" type="text" class="bg-gray-50 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline" placeholder="Search">
    <div class="absolute top-0">
    </div>
    @if(strlen($search) >= 2)
    <div class="absolute bg-white text-sm rounded w-64 mt-4">
        @if ($searchResults->count() > 0)
            <ul>
                @foreach ($searchResults as $result)
                <li class="border-b border-gray-300">
                    <a href="{{ route('item', ['tcin'=>$result['item']['tcin'], 'store_id'=>$result['fulfillment']['store_options']['0']['location_id']]) }}" class="block hover:bg-gray-50 px-3 py-3 flex items-center">
                    @if ($result['item']['enrichment']['images']['primary_image_url'])  
                    <img src="{{ $result['item']['enrichment']['images']['primary_image_url'] }}" alt="img" class="w-10">
                    @else
                     <img src="https://via.placeholder.com/50x75" alt="poster" class="w-10">
                    @endif
                      <span class="ml-4"> {{ $result['item']['product_description']['title'] }} </span>
                    </a>
                </li>
                @endforeach
            </ul>
            @else
            <div class="px-3 py-3">
                No results for "{{ $search }}"
            </div>
        @endif
    </div>
    @endif
</div>