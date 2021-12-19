@extends('layouts.default', ['myStore' => $myStore])

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
              <th class="px-6 py-3 font-bold whitespace-nowrap"></th>
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
                  <input
                    type="text"
                    name="qty"
                    value="1"
                    class="w-12 text-center bg-gray-100 outline-none"
                  />
                </div>
              </td>
              <td class="p-4 px-6 text-center whitespace-nowrap">{{ $order->price }}</td>
              <td class="p-4 px-6 text-center whitespace-nowrap">
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


@endsection