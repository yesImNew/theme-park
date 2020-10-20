@extends('layouts.app')
@section('title', 'Bookings')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Buy Tickets</h1>
    </div>

    <form class="lg:w-2/3 w-full mx-auto mb-4 bg-white shadow-md rounded py-8 px-6"
      action="{{ route('ticket-records.store') }}" method="POST">
      @csrf

      <!-- Event -->
      <input type="text" name="scheduled_event_id" hidden value="{{ $event->id }}">

      <!-- Activities -->
      <h1 class="font-medium text-gray-800 mb-1 px-3 text-xl leading-relaxed">Availble Activities</h1>
      <hr>

      <div class="flex flex-wrap mt-3 mb-6 w-full">
      @forelse ($activities as $activity)
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Activity </label>
          <input class="form-input" type="text" value="{{ $activity->name }}" disabled>
        </div>

        <div class="w-full md:w-1/2 flex">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Price </label>
            <input class="form-input" type="text" value="{{ $activity->price }}" disabled>
          </div>

          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Tickets </label>
            <input class="form-input" type="number" name="activities[{{ $activity->id }}][tickets]">
          </div>
        </div>
      @empty
        <span class="text-sm italic font-light px-3">No activities available for booking</span>
      @endforelse
      </div>

      <!-- Submit -->
      <div class="flex items-center mx-3 pt-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">Confirm</button>
        <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block" href="{{ route('home') }}">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
