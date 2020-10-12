@extends('layouts.app')
@section('title', 'Bookings')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Booking Records</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
    </div>

    <div class="flex pl-4 my-4 lg:w-3/4 w-full mx-auto">
      <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0 hover:text-blue-700 mr-5"
        href="{{ route('bookings.create') }}">Create New</a>
    </div>

    <div class="lg:w-3/4 w-full mx-auto overflow-auto bg-white shadow-md rounded">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl">Reference</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Customer</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Event</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 hidden sm:table-cell">Room</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Price</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr text-center hidden md:table-cell">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($bookings as $booking)
          <tr class="border-b">
            <td class="px-4 py-2">
              <a href="{{ route('bookings.edit', $booking) }}" class="hover:underline"> {{ $booking->reference }}</a>
            </td>

            <td class="px-4 py-2">{{ $booking->customer->name }}</td>
            <td class="px-4 py-2">{{ $booking->event->title }} <br> {{ $booking->date }}</td>
            <td class="px-4 py-2">{{ $booking->room->number }} <br> {{ $booking->room->type->name }}</td>
            <td class="px-4 py-2">{{ $booking->price }}</td>

            <td class="px-4 py-2 justify-center hidden md:flex">
              <a href="{{ route('bookings.edit', $booking) }}" class="px-4 py-1 mr-1 rounded border border-blue-500 hover:bg-blue-400 hover:text-gray-100 inline-block">Edit</a>

              <form action="{{ route('bookings.destroy', $booking) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="px-4 py-1 rounded border border-red-500 hover:bg-red-400 hover:text-gray-100">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr class="border-b">
            <td class="px-4 py-2 text-gray-800 font-thin italic" colspan="6">
              No bookings to show
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>

    </div>

    <div class="lg:w-2/3 w-full mx-auto my-2">
      {{ $bookings->links() }}
    </div>

  </div>

</section>

@endsection
