@extends('layouts.app')
@section('title', 'Hotels')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="text-center mb-10">
      <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">{{ $hotel->name }}</h1>
      <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">Hotel details, rooms and booking records</p>

      <div class="text-center my-5">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
          href="{{ route('hotels.edit', $hotel) }}">Edit</a>

        <form action="{{ route('hotels.destroy', $hotel) }}" class="inline mx-2" method="POST">
          @csrf @method('DELETE')
          <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline"
          type="submit">Delete</button>
        </form>

        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline mr-2 inline-block"
          href="{{ route('rooms.create', ['hotel' => $hotel]) }}">New Room</a>
      </div>

      <div class="flex justify-center">
        <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
      </div>
    </div>

    <div class="flex justify-center flex-wrap sm:-m-4 -mx-4">
      @forelse ($hotel->rooms as $room)
      <div class="p-4 md:w-1/3 md:mb-2 mb-6 flex flex-col text-center items-center">
        <div class="flex-grow border-b-2 py-5 px-8 shadow-b">
          <h2 class="text-gray-900 text-lg title-font font-medium mb-3">Room {{ $room->number }}</h2>
          <p class="leading-relaxed text-base">{{ $room->type->name }}
            <span class="px-2 font-semibold">MVR {{ $room->price }}</span></p>
          <p class="text-left font-thin ">{{ $room->status }}</p>

          <div class="mt-3">
            <form action="{{ route('rooms.destroy', $room) }}" class="mx-2 inline" method="POST">
              @csrf @method('DELETE')
              <button class="text-red-500 hover:text-red-600">Delete</button>
            </form>

            <a class="text-blue-500 hover:text-blue-600 inline-flex items-center mx-2" href="{{ route('rooms.edit', $room) }}">Edit
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
      @empty
      <div class="p-4 md:w-1/3 md:mb-2 mb-6 flex flex-col text-center items-center">
        <p class="px-4 py-2 text-gray-800 font-thin italic">No rooms to show</p>
      </div>
      @endforelse
    </div>

    <div class="py-12 lg:w-3/4 w-full mx-auto ">
      <h1 class="sm:text-xl text-lg font-medium title-font text-gray-900 mb-4">Hotel booking records</h1>

      <div class="overflow-auto bg-white shadow-md rounded">
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl">Ref #</th>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Customer</th>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Room #</th>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Price</th>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Arrival</th>
              <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr">Departure</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($hotel->bookings as $booking)
            <tr class="border-b">
              <td class="px-4 py-2">
                <a href="{{ route('bookings.show', $booking) }}" class="hover:underline"> {{ $booking->reference }}</a>
              </td>

              <td class="px-4 py-2">
                <a href="{{ route('customers.show', $booking->customer) }}" class="hover:underline"> {{ $booking->customer->name }}</a>
              </td>

              <td class="px-4 py-2">{{ $booking->room->number }}</td>
              <td class="px-4 py-2">{{ $booking->price }}</td>
              <td class="px-4 py-2">{{ $booking->start }}</td>
              <td class="px-4 py-2">{{ $booking->end }}</td>
            </tr>
            @empty
            <tr class="border-b">
              <td class="px-4 py-2 text-gray-800 font-thin italic" colspan="6">
                No booking records for this hotel
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>
</section>
@endsection
