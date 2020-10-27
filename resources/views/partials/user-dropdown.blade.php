<div class="relative hidden sm:inline-block text-left" x-data="{ 'open' : false }">
  <div>
    <span class="rounded-md shadow-sm">
      <button type="button" class="inline-flex justify-center w-full rounded border border-gray-300 px-4 py-1 bg-gray-200 text-sm hover:bg-gray-300 focus:outline-none
        focus:border-blue-500 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition ease-in-out duration-150"
        x-on:click="open = !open"
      >
        {{ Auth::user()->name }}
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
        <a href="{{ route('users.show', Auth::user())}}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">My Profile</a>
      </div>

      <!-- Logout -->
      <div class="py-1 border-t border-gray-200">
        <a class="block px-4 py-2 text-sm leading-5 text-gray-700 cursor-pointer hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900"
        role="menuitem" x-on:click.prevent="$refs.logout.submit()">Logout</a>

        <form x-ref="logout" action="{{ route('logout') }}" method="POST" class="hidden">
          {{ csrf_field() }}
        </form>
      </div>
    </div>
  </div>
</div>
