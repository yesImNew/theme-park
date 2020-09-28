@extends('layouts.app')
@section('title', 'Room Types')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Create Room Type</h1>
    </div>

    <form class="lg:w-2/3 w-full mx-auto mb-4 bg-white shadow-md rounded py-8 px-6"
      action="{{ route('room-types.store') }}" method="POST">
      @csrf
      <div class="flex flex-wrap mb-6 w-full">
        <div class="w-full px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="name"> Room type </label>

          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border {{ $errors->has('name') ? 'border-red-500' : '' }}
            rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            type="text" name="name" placeholder="Ocean view" value="{{ old('name') }}">

          @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="flex items-center pt-4 px-3">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">Create</button>
        <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
          href="{{ route('room-types.index') }}">Back</a>
      </div>

    </form>
  </div>
</section>
@endsection
