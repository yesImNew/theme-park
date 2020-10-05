<div class="relative">

  <input type="text" name="{{ $name }}"
    class="form-input cursor-pointer {{ $errors->has($name) ? 'border-red-500' : '' }}"
    placeholder="Choose a date"
    x-data="{}"
    x-init="
      flatpickr($el, {
        altInput: true,
        altFormat: 'M j, Y',
        dateFormat: 'Y-m-d',
        defaultDate: '{{ $default ?? '' }}',
        minDate: 'today',
        mode: '{{ $mode ?? 'single' }}',
        monthSelectorType: 'static',
        maxDate: new Date().fp_incr(90),
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
