@extends('layouts.app')
@section('title', 'Home')

@section('content')
<section class="text-gray-700 pb-24">
  <div class="container mx-auto flex px-5 sm:py-24 py-12 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
      <img class="object-cover object-center rounded shadow-md bg-white p-4" alt="hero" src="{{ asset('img/undraw_park.svg') }}">
    </div>
    <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Once upon a time there was
        <br class="hidden lg:inline-block">a theme park
      </h1>
      <p class="mb-8 leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magni harum iste maxime vitae, commodi expedita eaque corrupti quae numquam quidem laudantium dignissimos fuga distinctio hic eum libero temporibus reprehenderit ea!</p>
      <div class="flex justify-center">
        <a class="inline-flex text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-blue-600 rounded text-lg" href="#events">Events</a>
        <a class="inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg ml-4" href="{{ route('hotel.booking') }}">Hotels</a>
      </div>
    </div>
  </div>

  <div class="container px-5 py-12 mx-auto flex flex-wrap" id="events">
    @forelse ($events as $event)
      <div class="flex relative pb-20 event sm:items-center md:w-4/5 w-full mx-auto">
        <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
          <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        </div>
        <div class="flex-shrink-0 w-6 h-6 rounded-full mt-10 sm:mt-0 inline-flex items-center justify-center bg-blue-500 text-white relative z-10 title-font font-medium text-sm">{{ $loop->index + 1 }}</div>
        <div class="flex-grow md:pl-8 pl-6 flex sm:items-center items-start flex-col sm:flex-row">
          <div class="flex-shrink-0 w-24 h-24 bg-gray-200 border border-blue-500 text-blue-500 font-semibold shadow rounded-full inline-flex items-center justify-center text-center">
            {{ $event->date->format('jS M') }} <br> {{ $event->date->year }}
            <br>
          </div>
          <div class="flex-grow sm:pl-6 mt-6 sm:mt-0">
            <h2 class="font-medium title-font text-gray-900 mb-1 text-xl">
              <a href="{{ route('scheduled-events.show', $event) }}" class="hover:underline">{{ $event->title }}</a>
              <span class="px-4 text-sm text-red-500">
                @if ($event->localDate->diffInMinutes(now(), false) > 0)
                  Ongoing
                @else
                  {{ $event->localDate->diffForHumans() }}
                @endif
              </span>
            </h2>

            <p class="leading-relaxed mb-2">{{ $event->comments }}</p>

            <a class="text-blue-500 hover:text-blue-600 inline-flex items-center" href="{{ route('hotel.booking', ['event' => $event]) }}">
              Book a hotel
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    @empty
      <div class="border-b sm:items-center md:w-2/3 mx-auto">
        <p class="px-4 py-2 text-gray-800 font-thin italic">
          Sorry! No upcomming events
        </p>
      </div>
    @endforelse
  </div>
</section>
@endsection
