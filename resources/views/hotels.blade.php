@extends('layouts.app')
@section('title', 'Hotels')

@section('content')
<section class="text-gray-700 body-font min-h-screen">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Book a Hotel</h1>
    </div>

    <div class="lg:w-2/3 w-full mx-auto rounded">
      <!-- Hotel card -->
      @forelse ($hotels as $hotel)
      <a class="flex mb-5 shadow bg-white rounded-md mx-4 md:mx-auto max-w-md md:max-w-5xl group
        transform hover:-translate-y-2 hover:-translate-x-2 hover:shadow-lg transition duration-300 ease-out"
        href="{{ route('hotels.show', $hotel) }}"
      >
        <div class="p-6 w-full">
          <div class="flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-900 -mt-1 transition-colors duration-150">{{ $hotel->name }}</h2>

            <!-- Rating -->
            <span class="flex items-center">
              @for ($i = 1; $i <= rand(2, 5); $i++)
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              @endfor

              @while ($i++ <= 5)
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-blue-500" viewBox="0 0 24 24">
                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
              </svg>
              @endwhile
              <span class="text-gray-600 ml-3">{{ rand(1, 20) }} Reviews</span>
            </span>
          </div>
          <p class="mt-3 text-gray-700 text-sm">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sunt tempora corrupti consequatur maiores molestias placeat quis, totam molestiae unde sapiente? In officiis maxime molestias numquam expedita dicta quam quaerat molestiae!
          </p>

          <p class="mt-4 text-blue-500 group-hover:text-blue-600 inline-flex items-center">
            Details
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </p>
        </div>
      </a>
      @empty
      <div class="border-b sm:items-center md:w-2/3 mx-auto">
        <p class="px-4 py-2 text-gray-800 font-thin italic">
          Sorry! No hotels registered
        </p>
      </div>
      @endforelse

    </div>

    {{-- <div class="lg:w-2/3 w-full mx-auto my-2">
      {{ $hotels->links() }}
    </div> --}}

  </div>

</section>
@endsection

@section('footer')
  @include('layouts.footer')
@endsection
