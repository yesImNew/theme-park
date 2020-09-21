@extends('layouts.app')
@section('title', 'Hotels')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Create Hotel</h1>
    </div>

    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
          action="{{ route('hotels.store') }}" method="POST">
          @csrf
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="name">Hotel Name</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              name="name" id="name" type="text" placeholder="name" value="{{ old('name') }}">
          </div>

          <div class="flex items-center pt-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">Create</button>
            <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block" href="{{ route('hotels.index') }}">Cancel</a>
          </div>
        </form>
    </div>
  </div>
</section>
@endsection
