<div class="sm:hidden ml-auto relative" x-data="{ open : false }">
    <!-- Hamburger -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2 cursor-pointer" width="30" height="30"
      viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round"
      x-on:click="open = true" x-show="!open"
    >
      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
      <line x1="4" y1="6" x2="20" y2="6" />
      <line x1="4" y1="12" x2="20" y2="12" />
      <line x1="4" y1="18" x2="20" y2="18" />
    </svg>

    <!-- Pannel -->
    <div class="fixed h-screen w-full left-0 top-0 z-40 flex" x-show="open" x-cloak>

      <div class="w-3/4 bg-white shadow-md overflow-y-auto"
        x-show="open" x-on:click.away="open = false"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-x-8"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform -translate-x-8"
      >
        <div class="h-full flex flex-col justify-between">
          <div class="px-10 pt-10 border-b">
            <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400 border border-blue-300">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-20 h-20 p-5" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>

            <div class="my-4">
              <p class="font-semibold text-gray-900">{{ Auth::user()->name }}</p>
              <p class="text-gray-600">{{ Auth::user()->email }}</p>

              <a href="{{ route('users.show', Auth::id()) }}" class="rounded border border-blue-500 px-8 py-1 inline-block mt-4 bg-blue-200
                text-sm font-semibold tracking-wider hover:bg-blue-300 focus:outline-none focus:border-blue-500"
              >
                Profile
              </a>
            </div>
          </div>

          {{-- Admin Only --}}
          <nav class="px-10 mt-4 border-b">
            <p>Manage</p>
            <ul class="my-2">
              <li> <a href="#" class="side-nav-link">Users</a> </li>
              <li class="border-b"> <a href="{{ route('customers.index') }}" class="side-nav-link">Customers</a> </li>
              <li> <a href="{{ route('hotels.index') }}" class="side-nav-link">Hotels</a> </li>
              <li> <a href="{{ route('rooms.index') }}" class="side-nav-link">Rooms</a> </li>
              <li class="border-b"> <a href="{{ route('room-types.index') }}" class="side-nav-link">Room Types</a> </li>
              <li> <a href="{{ route('scheduled-events.index') }}" class="side-nav-link">Scheduled Events</a> </li>
              <li class="border-b"> <a href="{{ route('activities.index') }}" class="side-nav-link">Activities</a> </li>
              <li> <a href="{{ route('bookings.index') }}" class="side-nav-link">Booking Records</a> </li>
              <li> <a href="{{ route('ticket-records.index') }}" class="side-nav-link">Ticket Records</a> </li>
            </ul>
          </nav>

          <div class="px-10 pb-10 mt-auto">
            <a class="inline-flex items-center rounded border border-gray-500 px-8 py-1 mt-4 bg-gray-200 cursor-pointer
              text-sm font-semibold tracking-wider hover:bg-gray-300 focus:outline-none focus:border-gray-500"
              role="menuitem" x-on:click.prevent="$refs.logout.submit()">

              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout stroke-current mr-2" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                <path d="M7 12h14l-3 -3m0 6l3 -3" />
              </svg>
              Logout
            </a>

            <form x-ref="logout" action="{{ route('logout') }}" method="POST" class="hidden">
              {{ csrf_field() }}
            </form>
          </div>
        </div>
      </div>

      <!-- Background darken -->
      <div class="w-1/4 bg-gray-800 opacity-25" x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-25"
      ></div>
    </div>
  </div>
