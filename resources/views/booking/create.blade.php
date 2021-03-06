@extends('layouts.app')
@section('title', 'Bookings')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Booking Information</h1>
    </div>

    <form class="lg:w-2/3 w-full mx-auto mb-4 bg-white shadow-md rounded py-8 px-6"
      action="{{ route('booking-records.store') }}" method="POST">
      @csrf

      <h1 class="font-medium text-gray-800 mb-1 px-3 text-xl leading-relaxed">User Information</h1>
      <hr>



      @includeWhen(Auth::user()->isAdmin, 'partials.admin-booking')

      @if (Auth::user()->isCustomer)
        <!-- Normal Users / Customers -->
        <input type="text" hidden name="customer_id" value="{{ $customer->id }}">
        <div class="flex flex-wrap mt-3 mb-6 w-full">
          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Name </label>
            <input class="form-input" type="text" value="{{ $customer->name }}" disabled>
          </div>

          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> NID </label>
            <input class="form-input" type="text" value="{{ $customer->nid }}" disabled>
          </div>

          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Phone Number </label>
            <input class="form-input" type="text" value="{{ $customer->phone_no }}" disabled>
          </div>
        </div>
      @endif

      <!-- Event -->
      <h1 class="font-medium text-gray-800 mb-1 px-3 text-xl leading-relaxed">Event Information</h1>
      <hr>

      <input type="text" name="scheduled_event_id" hidden value="{{ $event->id }}">
      <div class="flex flex-wrap mt-3 mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Event Title </label>
          <input class="form-input" type="text" value="{{ $event->title }}" disabled>
        </div>

        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Date </label>
          <input class="form-input" type="text" value="{{ $event->date->toFormattedDateString() }}" disabled>
        </div>
      </div>

      <!-- Hotel and Room -->
      <h1 class="font-medium text-gray-800 mb-1 px-3 text-xl leading-relaxed">Room Booking Information</h1>
      <hr>

      <input type="text" name="room_id" hidden value="{{ $room->id }}">
      <input type="text" name="price" hidden value="{{ $room->price }}">
      <div class="flex flex-wrap mt-3 mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Hotel </label>
          <input class="form-input" type="text" value="{{ $room->hotel->name }}" disabled>
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Room Number </label>
          <input class="form-input" type="text" value="{{ $room->number }}" disabled>
        </div>
      </div>

      <div class="flex flex-wrap mt-3 mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Room type </label>
          <input class="form-input" type="text" value="{{ $room->type->name }}" disabled>
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Room Price </label>
          <input class="form-input" type="text" value="{{ $room->price }}" disabled>
        </div>
      </div>

      <!-- Submit -->
      <div class="flex items-center mx-3 pt-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">Confirm</button>
        <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
          {{-- onclick="{{ session()->forget(['room', 'event']) }}"  --}} href="{{ route('home') }}">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
