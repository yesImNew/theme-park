@extends('layouts.app')
@section('title', 'Rooms')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Create Room</h1>
    </div>

    <form class="lg:w-2/3 w-full mx-auto mb-4 bg-white shadow-md rounded py-8 px-6"
      action="{{ route('rooms.store') }}" method="POST">
      @csrf
      <div class="flex flex-wrap mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="number"> Room Number </label>
          <input class="form-input {{ $errors->has('number') ? 'border-red-500' : '' }}"
            type="text" name="number" placeholder="101" value="{{ old('number') }}">

          @error('number') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>


        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">Room Type</label>
          <div class="relative">
            <select class="form-input cursor-pointer"
             name="room_type_id">
              @foreach ($types as $key => $type)
                <option value="{{ $key }}"  {{ old('room_type_id') == $key ? 'selected' : '' }}>{{ $type }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
          @error('room_type_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="flex flex-wrap mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="price"> Room Price </label>
          <input class="form-input {{ $errors->has('price') ? 'border-red-500' : '' }}"
            type="text" name="price" placeholder="MVR 0.00" value="{{ old('price') }}">

          @error('price') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">Hotel</label>
          <div class="relative">
            <select class="form-input cursor-pointer"
             name="hotel_id">
              @foreach ($hotels as  $key => $hotel)
                <option value="{{ $key }}"  {{ old('hotel_id', $selected) == $key ? 'selected' : '' }}>{{ $hotel }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
      </div>

      <div class="flex items-center pt-4 px-3">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">Create</button>
        <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
          href="{{ url()->previous() == url()->full() ? route('rooms.index') : url()->previous() }}">Back</a>
      </div>

    </form>
  </div>
</section>
@endsection
