@extends('layouts.app')
@section('title', 'Events')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Upcoming Events</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Create edit and delete scheduled events</p>
    </div>

    <div class="flex pl-4 my-4 lg:w-3/4 w-full mx-auto">
      <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0 hover:text-blue-700"
        href="{{ route('scheduled-events.create') }}">Create New</a>
    </div>

    <div class="lg:w-3/4 w-full mx-auto overflow-auto bg-white shadow-md rounded">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl">Event Title</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Event date</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr text-center" colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($events as $event)
          <tr class="border-b">
            <td class="px-4 py-2">
              <a href="{{ route('scheduled-events.show', $event) }}" class="hover:underline"> {{ $event->title }}</a>
            </td>

            <td class="px-4 py-2">{{ date('jS M Y', $event->date) }}</td>

            <td class="px-4 py-2 text-center">
              <a href="{{ route('scheduled-events.edit', $event) }}" class="px-4 py-1 rounded border border-blue-500 hover:bg-blue-400 hover:text-gray-100 inline-block">Edit</a>
            </td>

            <td class="px-4 py-2 text-center ">
              <form action="{{ route('scheduled-events.destroy', $event) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="px-4 py-1 rounded border border-red-500 hover:bg-red-400 hover:text-gray-100">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr class="border-b">
            <td class="px-4 py-2 text-gray-800 font-thin italic" colspan="3">
              No upcoming events to show
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="lg:w-2/3 w-full mx-auto my-2">
      {{ $events->links() }}
    </div>
  </div>

  <hr>

  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Past Events</h1>
      {{-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Create edit and delete scheduled events</p> --}}
    </div>

    <div class="lg:w-3/4 w-full mx-auto overflow-auto bg-white shadow-md rounded">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl">Event Title</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Event date</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr w-1/2">Comments</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pastEvents as $event)
          <tr class="border-b">
            <td class="px-4 py-2 whitespace-normal md:whitespace-no-wrap">
              <a href="{{ route('scheduled-events.show', $event) }}" class="hover:underline"> {{ $event->title }}</a>
            </td>

            <td class="px-4 py-2">{{ date('jS M Y', $event->date) }}</td>

            <td class="px-4 py-2 whitespace-normal">{{ $event->comments }}</td>
          </tr>
          @empty
          <tr class="border-b">
            <td class="px-4 py-2 text-gray-800 font-thin italic" colspan="3">
              No past events to show
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>

    </div>
  </div>

</section>

@endsection
