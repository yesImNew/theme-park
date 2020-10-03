@extends('layouts.app')
@section('title', 'Events')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 pt-12 mx-auto">
    <div class="text-center mb-20 ">
      <div class="flex flex-wrap justify-center mb-4">
        <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 px-2">{{ $event->title}}</h1>
        <h1 class="sm:text-xl sm:mb-1 text-lg font-medium title-font text-gray-700 px-2 self-end">{{ date('jS M Y', $event->date) }}</h1>
      </div>

      <div class="text-center my-5">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
          href="{{ route('scheduled-events.edit', $event) }}">Edit</a>

        <form action="{{ route('scheduled-events.destroy', $event) }}" class="inline mx-2" method="POST">
          @csrf @method('DELETE')
          <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline"
          type="submit">Delete</button>
        </form>
      </div>

      <div class="flex justify-center">
        <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
      </div>
    </div>
  </div>

  <div class="xl:w-1/2 md:w-2/3 w-full mx-auto px-10 text-center">
    <p class="leading-relaxed text-lg">{{ $event->comments }}</p>
    {{-- <span class="inline-block h-1 w-10 rounded bg-blue-500 mt-8 mb-6"></span> --}}
    {{-- <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">HOLDEN CAULFIELD</h2>
    <p class="text-gray-500">Senior Product Designer</p> --}}
  </div>

</section>
@endsection
