@extends('layouts.app')
@section('title', 'Bookings')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Edit Ticket</h1>
    </div>

    <form class="lg:w-2/3 w-full mx-auto mb-4 bg-white shadow-md rounded py-8 px-6"
      action="{{ route('ticket-records.update', $ticket) }}" method="POST">
      @method('PATCH')
      @csrf

      <div class="flex flex-wrap mt-3 mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Activity </label>
          <input class="form-input" type="text" value="{{ $ticket->activity->name }}" readonly>
        </div>

        <div class="w-full md:w-1/2 flex">
          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Price </label>
            <input class="form-input" type="text" value="{{ $ticket->price }}" readonly>
          </div>

          <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"> Tickets </label>
            <input class="form-input {{ $errors->has('tickets') ? 'border-red-500' : '' }}" name="tickets" value="{{ old('tickets', $ticket->tickets) }}">
          </div>
        </div>
      </div>

      <!-- Submit -->
      <div class="flex items-center mx-3 pt-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">Update</button>
        <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block" href="{{ route('home') }}">Cancel</a>
      </div>
    </form>
  </div>
</section>
@endsection
