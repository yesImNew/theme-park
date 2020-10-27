<div class="relative inline-block text-left" x-data="{ 'open' : false }">
  <div>
    <span class="rounded">
      <button class="ml-4 inline-flex justify-center w-full rounded py-1 focus:outline-none
        focus:border-blue-500 focus:bg-gray-300 active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
        x-on:click="open = !open"
      >
        Manage
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
        <a href="#" class="nav-link" role="menuitem">Users</a>
        <a href="{{ route('customers.index') }}" class="nav-link" role="menuitem">Customers</a>
      </div>
      <div class="py-1 border-t border-gray-200">
        <a href="{{ route('hotels.index') }}" class="nav-link" role="menuitem">Hotels</a>
        <a href="{{ route('rooms.index') }}" class="nav-link" role="menuitem">Rooms</a>
        <a href="{{ route('room-types.index') }}" class="nav-link" role="menuitem">Room Types</a>
      </div>
      <div class="py-1 border-t border-gray-200">
        <a href="{{ route('scheduled-events.index') }}" class="nav-link" role="menuitem">Schedule Events</a>
        <a href="{{ route('activities.index') }}" class="nav-link" role="menuitem">Activities</a>
      </div>
      <div class="py-1 border-t border-gray-200">
        <a href="{{ route('bookings.index') }}" class="nav-link" role="menuitem">Booking Records</a>
        <a href="{{ route('ticket-records.index') }}" class="nav-link" role="menuitem">Ticket Records</a>
      </div>
    </div>
  </div>
</div>
