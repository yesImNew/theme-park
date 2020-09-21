@if (session()->has($key))
<div
  class="border items-center px-4 py-3 rounded fixed bottom-0 right-0 flex {{ 'flash-'.$key }}"
  role="alert"
  style="bottom: 2rem; right: 2rem"
  x-data="{open : true}"
  x-init=" setTimeout(function () { open = false; }, 3000);"
  @hide="open = false"
  x-show="open"
  x-transition:leave="ease-in duration-200 transform"
  x-transition:leave-start="opacity-100 translate-x-0"
  x-transition:leave-end="opacity-0 translate-x-6"
>
  <strong class="font-bold mr-2 capitalize">{{ session($key)[0] }}</strong>
  <span class="block sm:inline">{{ session($key)[1] }}</span>
  <span class="ml-4" @click="open = false">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x stroke-current h-6 w-6 cursor-pointer" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path stroke="none" d="M0 0h24v24H0z"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" />
    </svg>
  </span>
</div>
@endif
