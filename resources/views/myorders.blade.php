@extends('layouts.default')

@section('content')

  <div class="container p-8 mx-auto mt-12">
      <div class="w-full overflow-x-auto">
        <div class="my-2">
          <h3 class="text-xl font-bold tracking-wider">Shopping Cart 3 item</h3>
        </div>
        <table class="w-full shadow-inner">
          <thead>
            <tr class="bg-gray-100">
              <th class="px-6 py-3 font-bold whitespace-nowrap">Image</th>
              <th class="px-6 py-3 font-bold whitespace-nowrap">Product</th>
              <th class="px-6 py-3 font-bold whitespace-nowrap">Qty</th>
              <th class="px-6 py-3 font-bold whitespace-nowrap">Price</th>
              <th class="px-6 py-3 font-bold whitespace-nowrap">Remove</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($orders as $order)
            <tr>
              <td>
                <div class="flex justify-center">
                  <img
                    src="{{ $order->gallery }}"
                    class="object-cover h-28 w-28 rounded-2xl"
                    alt="image"
                  />
                </div>
              </td>
              <td class="p-4 px-6 text-center whitespace-nowrap">
                <div class="flex flex-col items-center justify-center">
                  <h3>{{ $order->name }}</h3>
                </div>
              </td>
              <td class="p-4 px-6 text-center whitespace-nowrap">
                <div>
                  <button>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="inline-flex w-6 h-6 text-red-600"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </button>
                  <input
                    type="text"
                    name="qty"
                    value="1"
                    class="w-12 text-center bg-gray-100 outline-none"
                  />
                  <button>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="inline-flex w-6 h-6 text-green-600"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
                      />
                    </svg>
                  </button>
                </div>
              </td>
              <td class="p-4 px-6 text-center whitespace-nowrap">{{ $order->price }}</td>
              <td class="p-4 px-6 text-center whitespace-nowrap">
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="mt-4">
          <a class="w-full
              py-2 px-2
              text-center text-white
              bg-red-500
              rounded-md
              shadow
              hover:bg-red-600" href="ordernow">Proceed to checkout
          </a>
          </div>
      </div>
    </div>


@endsection