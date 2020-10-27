<header class="text-gray-700 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-row items-center">
    <!-- Name and logo -->
    <a class="flex title-font font-medium items-center text-gray-900 mb-0" href="{{ route('home') }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">{{ config('app.name') }}</span>
    </a>

    <!-- Left side nav -->
    <nav class="hidden mr-auto ml-4 py-1 pl-4 border-l border-gray-400 sm:flex flex-wrap items-center text-base justify-center">
      @auth
      <a class="focus:outline-none {{ Request::is('/') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('home') }}">Home</a>
      <a class="focus:outline-none ml-5 {{ Request::is('home/*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('hotel.booking') }}">Hotels</a>

      <!-- Admin dropdown -->
      @include('partials.admin-dropdown')
      @endauth
    </nav>

    <!-- Right side nav -->
    @guest
    <div class="flex ml-auto">
      <a class="bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-0" href="{{ route('login') }}">{{ __('Login') }}</a>
    </div>
    @else

    <!-- User Dropdown | hidden sm:inline-block -->
    @include('partials.user-dropdown')

    <!-- Side pannel | sm:hidden -->
    @include('partials.side-pannel')

    @endguest

  </div>
</header>
