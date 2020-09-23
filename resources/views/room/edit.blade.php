@extends('layouts.app')
@section('title', 'Hotels')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Edit Room {{ $room->number }}</h1>
    </div>

    <form class="lg:w-2/3 w-full mx-auto mb-4 bg-white shadow-md rounded py-8 px-6"
      action="{{ route('rooms.update', $room) }}" method="POST">
      @csrf @method('PATCH')
      <div class="flex flex-wrap mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block up percase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="number"> Room Number </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border {{ $errors->has('number') ? 'border-red-500' : '' }}
            rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            type="text" name="number" placeholder="Single" value="{{ old('number', $room->number) }}">

          @error('number') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="price"> Room Price </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border {{ $errors->has('price') ? 'border-red-500' : '' }}
            rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            type="text" name="price" placeholder="MVR 0.00" value="{{ old('price', $room->price) }}">

          @error('price') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="flex flex-wrap mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block up percase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="type"> Room Type </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border {{ $errors->has('type') ? 'border-red-500' : '' }}
            rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            type="text" name="type" placeholder="Single" value="{{ old('type', $room->type) }}">

          @error('type') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">Status</label>
          <div class="relative">
            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
              name="status">
              <option value="available" {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>Available for booking</option>
              <option value="occupied" {{ old('status', $room->status) == 'occupied' ? 'selected' : '' }}>Currently occupied</option>
              <option value="booked"{{ old('status', $room->status) == 'booked' ? 'selected' : '' }}>Room Booked</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-wrap mb-6 w-full">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">Hotel</label>
          <div class="relative">
            <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
             name="hotel_id">
              @foreach ($hotels as  $key => $hotel)
                <option value="{{ $key }}"  {{ old('hotel_id', $room->hotel_id) == $key ? 'selected' : '' }}>{{ $hotel }}</option>
              @endforeach
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
          </div>
        </div>
      </div>

      <div class="flex items-center pt-4 px-3">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">Update</button>
        <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
          href="{{ url()->previous() == url()->current() ? route('rooms.index') : url()->previous() }}">Back</a>
      </div>
    </form>
  </div>
</section>
@endsection
