@extends('layouts.app')
@section('title', 'Activities')

@section('content')
<section class="text-gray-700">
  <div class="container px-5 py-24 sm:py-40 mx-auto">
    <div class="lg:w-1/2 w-full mx-auto">
      <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $activity->name }}</h1>

      <p class="leading-relaxed text-lg">{{ $activity->details }}</p>
      <p class="leading-relaxed my-3">{{ $activity->rules }}</p>

      <div class="mt-6 border-b-2 border-gray-200 mb-5"></div>

      <div class="flex">
        <span class="title-font font-medium text-2xl text-gray-900">MVR {{ $activity->price }}</span>

        <!-- Actions -->
        @can('manage')
        <div class="flex items-center ml-auto">
          <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
            href="{{ route('activities.edit', $activity) }}">Edit</a>

          <form action="{{ route('activities.destroy', $activity) }}" class="mx-2" method="POST">
            @csrf @method('DELETE')
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit">Delete</button>
          </form>
        </div>
        @endcan <!-- Actions end -->
      </div>
    </div>
  </div>
</section>
@endsection

@section('footer')
  @include('layouts.footer')
@endsection
