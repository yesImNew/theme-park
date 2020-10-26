@extends('layouts.app')
@section('title', 'Hotels')

@section('content')
<section class="text-gray-700">
  <header class="container px-5 py-24 mx-auto flex flex-wrap">
    {{-- TODO: Hotel description, rating --}}
    <div class="flex flex-wrap -mx-4 mt-auto mb-auto lg:w-1/2 sm:w-2/3 content-start sm:pr-10">
      <div class="w-full sm:p-4 px-4 mb-6"> <!-- Content -->
        <h1 class="title-font font-medium text-3xl mb-2 text-gray-900">{{ $hotel->name }}</h1>
        <div class="leading-relaxed mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam blanditiis enim molestiae eaque. Quidem, ipsa accusantium velit nobis debitis laudantium voluptate, natus cumque error delectus ipsum neque ea enim perferendis!</div>

        <!-- Rating -->
        <div class="flex mb-4">
          <span class="flex items-center">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24">
              <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
            </svg>
            <span class="text-gray-600 ml-3">4 Reviews</span>
          </span>
          <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-2 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
              </svg>
            </a>
          </span>
        </div> <!-- Rating end -->
      </div> <!-- Content end -->
    </div>

    <!-- Image -->
    <div class="lg:w-1/2 sm:w-1/3 w-full rounded-lg overflow-hidden mt-6 sm:mt-0 shadow-lg" style="max-height: 50vh">
        <img class="object-cover object-center w-full h-full"
          src="{{ $hotel->image->url ?? asset('img/hotel_placeholder' . rand(1,3). '.svg') }}" alt="Hotel image">
    </div>

    <!-- Actions -->
    <div class="text-center mt-6 sm:mt-0">
      <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
        href="{{ route('hotels.edit', $hotel) }}">Edit</a>

      <form action="{{ route('hotels.destroy', $hotel) }}" class="inline mx-2" method="POST">
        @csrf @method('DELETE')
        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit">Delete</button>
      </form>

      <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline mr-2 inline-block"
        href="{{ route('rooms.create', ['hotel' => $hotel]) }}">New Room</a>
    </div> <!-- Actions end -->
  </header>

  <!-- Rooms -->
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-wrap -m-4">
      @forelse ($hotel->rooms as $room)
      <div class="p-4 w-full md:w-1/2 lg:w-1/3">
        <div class="h-full bg-gray-200 group shadow-md border px-8 py-10 md:py-16 rounded-lg overflow-hidden text-center
          {{ $room->bookings->isEmpty() ? 'border-blue-500' : 'border-gray-500' }}">

          <h2 class="tracking-widest uppercase text-xs title-font font-medium mb-2
            {{ $room->bookings->isEmpty() ? 'text-green-500' : 'text-gray-500' }}"
          >
            {{ $room->bookings->isEmpty() ? 'available' : 'booked' }}
          </h2>

          <div class="inline-flex flex-col items-start mb-5">
            <h1 class="sm:text-2xl text-xl font-medium text-gray-900">Room {{ $room->number }}
            <span class="px-5 font-semibold text-gray-700">${{ $room->price }}</span>
            </h1>
            <p class="leading-relaxed mb-3 text-left">{{ $room->type->name }}</p>
          </div>

          <div>
            <a class="text-blue-500 hover:text-blue-600 inline-flex items-center px-2" href="{{ route('rooms.edit', $room) }}">Edit</a>

            <form action="{{ route('rooms.destroy', $room) }}" class="px-2 inline" method="POST">
              @csrf @method('DELETE')
              <button class="text-red-500 hover:text-red-600">Delete</button>
            </form>

            @if ($room->bookings->isEmpty())
            <a class="text-blue-500 hover:text-blue-600 inline-flex items-center px-2" href="{{ route('bookings.create', ['room' => $room]) }}">Book now
              <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
              </svg>
            </a>
            @endif
          </div>
        </div>
      </div>
      @empty
      <div class="border-b sm:items-center md:w-2/3">
        <p class="px-4 py-2 text-gray-800 font-thin italic">
          No rooms to display for this hotel
        </p>
      </div>
      @endforelse
    </div>
  </div> <!-- Rooms end -->

</section>
@endsection
