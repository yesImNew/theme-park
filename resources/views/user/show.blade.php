@extends('layouts.app')
@section('title', 'Hotels')

@section('content')
<section class="text-gray-700 body-font min-h-screen">
  <div class="container px-5 sm:py-24 mx-auto flex flex-col">
    <div class="lg:w-3/4 w-full mx-auto sm:py-0">
      <div class="flex flex-col sm:flex-row">
        <!-- User info -->
        <div class="sm:w-1/3 text-center py-12 sm:pr-8 sm:py-8">
          <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400 border border-blue-300">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>

          @isset($user)
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $user->name }}</h2>
            <div class="w-12 h-1 bg-blue-500 rounded mt-2 mb-4"></div>
            <p class="text-base text-gray-600 mb-4">
              <span class="block">{{ $user->email }}</span>
              <span class="block mb-4"> Joined - {{ $user->created_at->toFormattedDateString() }}</span>
              @if ($user->isCustomer)
              <span class="block">{{ $user->customer->phone_no }}</span>
              <span class="block">{{ $user->customer->nid }}</span>
              @endif
            </p>
            <a class="border-2 border-blue-500 hover:bg-blue-500 hover:text-white text-blue-500 font-bold px-4 rounded focus:outline-none focus:shadow-outline inline-block"
              href="#">Edit Profile</a>
          </div>
          @else
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{ $customer->name }}</h2>
            <div class="w-12 h-1 bg-blue-500 rounded mt-2 mb-4"></div>
            <p class="text-base text-gray-600 mb-4">
              <span class="block mb-4 italic font-light"> Not signed up </span>
              <span class="block">{{ $customer->phone_no }}</span>
              <span class="block">{{ $customer->nid }}</span>
            </p>
          </div>
          @endisset
        </div>

        @isset($bookedEvents)
        <!-- Bookings and tickets -->
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-blue-300 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">

          <div class="py-12 sm:py-0"> <!-- Booking Records -->
            <h2 class="leading-relaxed text-xl mb-4">Booking Records</h2>

            @forelse ($bookedEvents as $event)
            <div class="bg-white shadow rounded-md p-4 mb-4" x-data="{ open : false }">

              <!-- Event info -->
              <div class="text-gray-700 text-left">
                <p class="py-1 border-b border-blue-500 font-semibold flex justify-between items-center">Event
                  <span class="text-sm font-normal px-3 text-red-500">
                    @if ($event->localDate->diffInDays(now()) == 0)
                      Ongoing
                    @else
                      {{ $event->localDate->diffForHumans() }}
                    @endif
                  </span>
                </p>
                <ul class="p-1">
                  <li>Title: {{ $event->title }}</li>
                  <li>Date: {{ $event->date->toFormattedDateString() }}</li>
                </ul>
              </div>

              <!-- Hidden -->
              <div x-show="open" class="text-gray-700 mt-4" x-cloak
                x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                x-transition:enter-start="opacity-50 transform -translate-y-2"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform -translate-y-2"
              >
                <!-- Room and Hotel -->
                @foreach ($event->bookingRecords as $booking)
                <div class="text-gray-700 text-left mb-4">
                  <p class="py-1 border-b border-blue-500 font-semibold flex justify-between items-center">Room
                    <span class="text-sm font-mono px-3">Ref# {{ $booking->reference }}</span>
                  </p>
                  <ul class="p-1">
                    <li>Number: {{ $booking->room->number }}</li>
                    <li>Type: {{ $booking->room->type->name }}</li>
                    <li>Hotel: {{ $booking->room->hotel->name }}</li>
                    <li>MVR {{ $booking->room->price }}</li>
                  </ul>
                </div>
                @endforeach

                <!-- Activities -->
                <div class="text-gray-700 text-left">
                  <p class="py-1 border-b border-blue-500 font-semibold">Tickets</p>
                  @forelse ($event->ticketRecords as $ticketRecord)
                  <ul class="p-2 flex bg-gray-100 my-2 border">
                    <div class="w-3/4">
                      <li>Activity: {{ $ticketRecord->activity->name }}</li>
                      <li>Price: {{ $ticketRecord->price }}</li>
                      <li>Tickets: {{ $ticketRecord->tickets }}</li>
                    </div>

                     @if ($event->date > \Carbon\Carbon::yesterday())
                     <div class="flex flex-col items-center justify-around w-1/4">
                       <form action="{{ route('ticket-records.destroy', $ticketRecord) }}" method="POST">
                         @csrf @method('DELETE')
                         <button type="submit" class="border border-red-600 text-red-600 hover:bg-red-500 hover:text-white text-sm font-semibold px-4 rounded-sm focus:outline-none focus:shadow-outline inline-block">Cancel</button>
                       </form>
                       <a class="border border-blue-600 text-blue-600 hover:bg-blue-500 hover:text-white text-sm font-semibold px-6 rounded-sm focus:outline-none focus:shadow-outline inline-block"
                         href="{{ route('ticket-records.edit', $ticketRecord) }}">Edit</a>
                     </div>
                     @endif
                  </ul>
                  @empty
                  <span class="text-sm italic font-light">No tickets purchased</span>
                  @endforelse
                </div>

                @if ($event->date > \Carbon\Carbon::yesterday())
                <div class="mt-8 mb-3">
                  <a class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold shadow py-1 px-4 rounded-sm focus:outline-none focus:shadow-outline inline-block"
                    href="{{ route('ticket-records.create', ['event' => $event]) }}"
                    onclick="{{ session(['customer' => $customer]) }}">Buy Tickets</a>

                  <a class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold shadow py-1 px-4 rounded-sm focus:outline-none focus:shadow-outline inline-block ml-2"
                    href="{{ route('hotel.booking', ['event' => $event]) }}"">Book Room</a>
                </div>
                @endif

                <!-- Show less -->
                <div class="w-full flex items-center justify-end" x-show="open">
                  <a class="text-blue-500 text-sm cursor-pointer inline-flex items-center" x-on:click="open = false">Show Less
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down w-8 h-8 ml-2" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <polyline points="6 15 12 9 18 15" />
                  </svg>
                  </a>
                </div>
              </div>

              <!-- Show more -->
              <div class="w-full flex items-center justify-end" x-show="!open">
                <a class="text-blue-500 text-sm cursor-pointer inline-flex items-center" x-on:click="open = true">Show More
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down w-8 h-8 ml-2 pt-1" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <polyline points="6 9 12 15 18 9" />
                </svg>
                </a>
              </div>
            </div>
            @empty
            <span class="text-sm italic font-light">No booking records</span>
            @endforelse
          </div>

        </div>
        @endisset
      </div>
    </div>
  </div>
</section>
@endsection

@section('footer')
  @include('layouts.footer')
@endsection

