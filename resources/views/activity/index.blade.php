@extends('layouts.app')
@section('title', 'Activities')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Activities</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Create, edit and delete activities.</p>
    </div>

    <div class="flex pl-4 my-4 lg:w-3/4 w-full mx-auto">
      <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0 hover:text-blue-700"
        href="{{ route('activities.create') }}">Create New</a>
    </div>

    <div class="lg:w-3/4 w-full mx-auto overflow-auto bg-white shadow-md rounded">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl">#</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Name</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Details</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Price</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr text-center hidden md:table-cell">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($activities as $activity)
          <tr class="border-b">
            <td class="px-4 py-2">
              <a href="{{ route('activities.show', $activity) }}" class="hover:underline"> {{ $activity->number }}</a>
            </td>

            <td class="px-4 py-2">
              <a href="{{ route('activities.show', $activity) }}" class="hover:underline whitespace-normal"> {{ $activity->name }}</a>
            </td>

            <td class="px-4 py-2 whitespace-normal">{{ $activity->details }}</td>
            <td class="px-4 py-2 hidden sm:table-cell">{{ $activity->price }}</td>

            <td class="px-4 py-2 hidden md:flex flex-wrap justify-center">
              <a href="{{ route('activities.edit', $activity) }}"
                class="px-4 py-1 mr-1 mb-1 rounded border border-blue-500 hover:bg-blue-400 hover:text-gray-100 inline-block">Edit</a>

              <form action="{{ route('activities.destroy', $activity) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="px-4 py-1 rounded border border-red-500 hover:bg-red-400 hover:text-gray-100">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr class="border-b">
            <td class="px-4 py-2 text-gray-800 font-thin italic" colspan="6">
              No activities to show
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>

    </div>

    <div class="lg:w-2/3 w-full mx-auto my-2">
      {{ $activities->links() }}
    </div>

  </div>

</section>

@endsection
