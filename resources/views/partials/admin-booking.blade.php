<!-- Admin -->
<div class="flex flex-wrap mt-3 mb-6 w-full">
  <div class="w-full px-3">
    <label class="inline-block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Select customer</label>

    <div class="relative">
      <select class="form-input cursor-pointer"
        name="customer_id">
        @foreach ($customers as $customer)
          <option value="{{ $customer->id }}"  {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}, {{ $customer->nid }} </option>
        @endforeach
      </select>
      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
      </div>
    </div>
    @error('customer_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
  </div>
</div>

