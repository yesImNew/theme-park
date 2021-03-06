@extends('layouts.app')
@section('title', 'Rooms')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Ticket Records</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">View, Edit and Delete Ticket Records.</p>
    </div>

    <div class="lg:w-3/4 w-full mx-auto overflow-auto bg-white shadow-md rounded">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl">#</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Customer</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Activity</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 hidden sm:table-cell">Event</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Tickets</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr text-center hidden md:table-cell">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($tickets as $ticket)
          <tr class="border-b">
            <td class="px-4 py-2">
              <a href="{{ route('ticket-records.edit', $ticket) }}" class="hover:underline"> {{ $ticket->number }}</a>
            </td>

            <td class="px-4 py-2">
              <a href="{{ route('customers.show', $ticket->customer) }}" class="hover:underline">
                {{ $ticket->customer->name }} <br> {{ $ticket->customer->phone_no }}
              </a>
            </td>

            <td class="px-4 py-2">{{ $ticket->activity->name }} <br> <span class="font-semibold">MVR {{ $ticket->price }}</span></td>
            <td class="px-4 py-2 hidden sm:table-cell">{{ $ticket->event->title }} <br> {{ $ticket->event->date->toFormattedDateString() }}</td>
            <td class="px-4 py-2">{{ $ticket->tickets }}</td>

            <td class="px-4 py-2 justify-center hidden md:flex">
              <a href="{{ route('ticket-records.edit', $ticket) }}" class="px-4 py-1 mr-1 rounded border border-blue-500 hover:bg-blue-400 hover:text-gray-100 inline-block">Edit</a>

              <form action="{{ route('ticket-records.destroy', $ticket) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="px-4 py-1 rounded border border-red-500 hover:bg-red-400 hover:text-gray-100">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr class="border-b">
            <td class="px-4 py-2 text-gray-800 font-thin italic" colspan="6">
              No ticket records to show
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>

    </div>

    <div class="lg:w-2/3 w-full mx-auto my-2">
      {{ $tickets->links() }}
    </div>

  </div>

</section>

@endsection
