
<header class="text-gray-700 body-font hidden sm:block">
  <div class="container mx-auto flex flex-wrap p-5 {{-- flex-col --}} flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-0 {{-- mb-4 md:mb-0 --}}"  href="{{ route('home') }}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-blue-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">{{ config('app.name') }}</span>
    </a>

    <nav class="{{-- md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400 --}} mr-auto ml-4 py-1 pl-4 border-l border-gray-400	flex flex-wrap items-center text-base justify-center">
      @auth
      <a class="focus:outline-none {{ Request::is('/') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('home') }}">Home</a>

      <!-- Admin dropdown -->
      <div class="relative inline-block lg:hidden text-left" x-data="{ 'open' : false }">
        <div>
          <span class="rounded">
            <button class="ml-5 inline-flex justify-center w-full rounded py-1 focus:outline-none {{ Request::is('customers*') ? 'text-blue-500' : 'hover:text-gray-900'}}
            focus:border-blue-500 focus:bg-gray-300 active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
              x-on:click="open = !open"
            >
              Admin
              <svg class="ml-2 h-6 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
          </span>
        </div>

        <div class="origin-top-left absolute left-0 mt-2 ml-5 z-10 w-56 rounded-md shadow-lg"
          x-show="open" x-on:click.away="open = false"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="transform opacity-0 scale-95""
          x-transition:enter-end="transform opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75"
          x-transition:leave-start="transform opacity-100 scale-100"
          x-transition:leave-end="transform opacity-0 scale-95"
        >
          <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Users</a>
            </div>
            <div class="border-t border-gray-200"></div>
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Hotels</a>
              <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Rooms</a>
            </div>
            <div class="border-t border-gray-200"></div>
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Schedule Events</a>
              <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Activities</a>
            </div>

            <!-- Logout -->
            <div class="border-t border-gray-200"></div>
            <div class="py-1">
              <a class="block px-4 py-2 text-sm leading-5 text-gray-700 cursor-pointer hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
              role="menuitem" x-on:click.prevent="$refs.logout.submit()">Logout</a>

              <form x-ref="logout" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden lg:inline-block">
        <a class="ml-5 focus:outline-none {{ Request::is('customers*') ? 'text-blue-500' : 'hover:text-gray-900'}}"  href="{{ route('customers.index') }}">Customers</a>
        <a class="ml-5 focus:outline-none {{ Request::is('hotels*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('hotels.index') }}">Hotels</a>
        <a class="ml-5 focus:outline-none {{ Request::is('rooms*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('rooms.index') }}">Rooms</a>
        <a class="ml-5 focus:outline-none {{ Request::is('activities*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('activities.index') }}">Activities</a>
        <a class="ml-5 focus:outline-none {{ Request::is('scheduled-events*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('scheduled-events.index') }}">Events</a>
        <a class="ml-5 focus:outline-none {{ Request::is('bookings*') ? 'text-blue-500' : 'hover:text-gray-900'}}" href="{{ route('bookings.index') }}">Bookings</a>
      </div>
      @endauth
    </nav>

    @guest
    <div class="flex">
      <a class="bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0" href="{{ route('login') }}">{{ __('Login') }}</a>

      {{-- @if (Route::has('register'))
        <a class="bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0" href="{{ route('register') }}">{{ __('Register') }}</a>
      @endif --}}
    </div>
    @else
    <!-- Dropdown -->
    <div class="relative inline-block text-left" x-data="{ 'open' : false }">
      <div>
        <span class="rounded-md shadow-sm">
          <button type="button" class="inline-flex justify-center w-full rounded border border-gray-300 px-4 py-1 bg-gray-200 text-sm hover:bg-gray-300 focus:outline-none
           focus:border-blue-500 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
            x-on:click="open = !open"
          >
            {{ Auth::user()->name }}
            <!-- Heroicon name: chevron-down -->
            {{-- <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg> --}}
          </button>
        </span>
      </div>

      <div class="origin-top-right absolute right-0 mt-2 z-10 w-56 rounded-md shadow-lg"
        x-show="open" x-on:click.away="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95""
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
      >
        <div class="rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
          <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">My Profile</a>
          </div>
          <div class="border-t border-gray-200"></div>
          <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Bookings</a>
            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Tickets</a>
          </div>
          <div class="border-t border-gray-200"></div>
          <div class="py-1">
            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Payments</a>
            <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">Settings</a>
          </div>

          <!-- Logout -->
          <div class="border-t border-gray-200"></div>
          <div class="py-1">
            <a class="block px-4 py-2 text-sm leading-5 text-gray-700 cursor-pointer hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
            role="menuitem" x-on:click.prevent="$refs.logout.submit()">Logout</a>

            <form x-ref="logout" action="{{ route('logout') }}" method="POST" class="hidden">
              {{ csrf_field() }}
            </form>
          </div>
        </div>
      </div>
    </div>

    @endguest

  </div>
</header>
