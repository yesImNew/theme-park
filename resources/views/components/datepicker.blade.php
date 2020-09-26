<div class="relative">

  <input type="text" name="{{ $name }}"
    class="appearance-none block w-full bg-gray-200 text-gray-700 border
    hover:border-gray-600 {{ $errors->has('from') ? 'border-red-500' : '' }}
    rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white cursor-pointer"
    placeholder="Choose a date or a range"
    x-data="{}"
    x-init="
      flatpickr($el, {
        altInput: true,
        altFormat: 'M j, Y',
        dateFormat: 'Y-m-d',
        minDate: 'today',
        mode: 'range',
        monthSelectorType: 'static',
        maxDate: new Date().fp_incr(90),
        disable: [
          {
              from: '2020-10-05',
              to: '2020-10-07'
          },
        ],
      });
    "
    value=""
  >

  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
       d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
  </div>
</div>
