@extends('layouts.app')
@section('title', 'Customers')

@section('content')
<section class="text-gray-700 body-font">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Customers</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Create, edit and delete customer data</p>
    </div>

    <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
      <a class="text-blue-500 inline-flex items-center md:mb-2 lg:mb-0 hover:text-blue-700"
        href="{{ route('customers.create') }}">Create New</a>
    </div>

    <div class="lg:w-2/3 w-full mx-auto overflow-auto bg-white shadow-md rounded">
      <table class="table-auto w-full text-left whitespace-no-wrap">
        <thead>
          <tr>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tl">Customer ID</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Name</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200">Phone number</th>
            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-200 rounded-tr text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($customers as $customer)
          <tr class="border-b">
            <td class="px-4 py-2">
              <a href="{{ route('customers.show', $customer) }}" class="hover:underline"> {{ $customer->nid }}</a>
            </td>

            <td class="px-4 py-2">{{ $customer->name }}</td>

            <td class="px-4 py-2">{{ $customer->phone_no }}</td>

            <!-- Actions -->
            <td class="px-4 py-2 justify-around flex flex-wrap">
              <a href="{{ route('customers.edit', $customer) }}" class="px-4 py-1 mr-1 rounded border border-blue-500 hover:bg-blue-400 hover:text-gray-100 inline-block">Edit</a>

              <form action="{{ route('customers.destroy', $customer) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="px-4 py-1 rounded border border-red-500 hover:bg-red-400 hover:text-gray-100">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr class="border-b">
            <td class="px-4 py-2 text-gray-800 font-thin italic" colspan="3">
              No customers to show
            </td>
          </tr>

          @endforelse
        </tbody>
      </table>

    </div>

    <div class="lg:w-2/3 w-full mx-auto my-2">
      {{ $customers->links() }}
    </div>

  </div>

</section>

@endsection
