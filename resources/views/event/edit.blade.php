@extends('layouts.app')
@section('title', 'Events')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Update Scheduled Event</h1>
    </div>

    <form class="lg:w-2/3 w-full mx-auto mb-4 bg-white shadow-md rounded py-8 px-6"
      action="{{ route('scheduled-events.update', $event) }}" method="POST">
      @csrf @method('PATCH')
      <div class="flex flex-wrap mb-6 w-full">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="title"> Event Title </label>
          <input class="form-input {{ $errors->has('title') ? 'border-red-500' : '' }}"
            type="text" name="title" placeholder="Eid al-Fitr" value="{{ old('title', $event->title) }}">

          @error('title') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="date"> Date </label>
          <x-datepicker name="date" :default="$event->date" />

          @error('date') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="flex flex-wrap mb-6 w-full">
        <div class="w-full px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="comments"> Comments </label>

          <textarea name="comments" rows="2" placeholder="About the event"
            class="form-input whitespace-normal {{ $errors->has('comments') ? 'border-red-500' : '' }}">
            {{ old('comments', $event->comments) }}
          </textarea>

          @error('comments') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="flex items-center pt-4 px-3">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2" type="submit">Update</button>
      <a class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block"
        href="{{ url()->previous() == url()->current() ? route('activities.index') : url()->previous() }}">Back</a>
      </div>

    </form>
  </div>
</section>
@endsection
