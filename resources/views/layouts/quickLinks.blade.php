 <nav class="border-b border-gray-200 bg-gray-50">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-4">
                <ul class="flex flex-col md:flex-row items-center">
                     <li class="md:ml-16 mt-3 md:mt-0">
                        <a href="{{ url('stores') }}" class="text-gray-500">You are shopping at: {{ $myStore }}</a>
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
                </ul>
            </div>
        </nav>