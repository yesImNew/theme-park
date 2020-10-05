
<header class="text-gray-700 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0"  href="{{ route('home') }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">{{ config('app.name') }}</span>
    </a>

    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
      @auth
      <a class="focus:outline-none {{ Request::is('/') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('home') }}">Home</a>

      <a class="ml-5 focus:outline-none {{ Request::is('customers*') ? 'text-blue-500' : 'hover:text-gray-900'}}"  href="{{ route('customers.index') }}">Customers</a>
      <a class="ml-5 focus:outline-none {{ Request::is('hotels*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('hotels.index') }}">Hotels</a>
      <a class="ml-5 focus:outline-none {{ Request::is('rooms*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('rooms.index') }}">Rooms</a>
      <a class="ml-5 focus:outline-none {{ Request::is('activities*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('activities.index') }}">Activities</a>
      <a class="ml-5 focus:outline-none {{ Request::is('scheduled-events*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('scheduled-events.index') }}">Events</a>
      @endauth
    </nav>

    {{-- TODO: Dropdown nav for small screens --}}

    @guest
    <div class="flex">
      <a class="bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0" href="{{ route('login') }}">{{ __('Login') }}</a>

      {{-- @if (Route::has('register'))
        <a class="bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0" href="{{ route('register') }}">{{ __('Register') }}</a>
      @endif --}}
    </div>
    @else
    <div>
      <span class="pr-4">{{ Auth::user()->name }}</span>
      {{-- TODO: User profile --}}

      <a href="{{ route('logout') }}"
      class="bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        {{ csrf_field() }}
      </form>
    </div>
    @endguest

  </div>
</header>
