@extends('layouts.app')

@section('title', 'Register')

@section('content')
<section class="text-gray-700 relative">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ __('Register') }}</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Create an account</p>
    </div>

    <form class="lg:w-1/2 md:w-2/3 mx-auto mb-24" method="POST" action="{{ route('register') }}">
      @csrf
      <div class="flex flex-wrap -m-2">
        <!-- Name -->
        <div class="w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="name">{{ __('Name') }}</label>

          <input class="form-input shadow border-gray-400 {{ $errors->has('name') ? 'border-red-500' : '' }}"
            type="text" name="name" value="{{ old('name') }}">

          @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->
        <div class="w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="email">{{ __('E-Mail Address') }}</label>

          <input class="form-input shadow border-gray-400 {{ $errors->has('email') ? 'border-red-500' : '' }}"
            type="email" name="email" value="{{ old('email') }}">

          @error('email') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <!-- Password -->
        <div class="w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="password">{{ __('Password') }}</label>

          <input class="form-input shadow border-gray-400 {{ $errors->has('password') ? 'border-red-500' : '' }}"
            type="password" name="password">

          @error('password') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <!-- Password Confirm-->
        <div class="w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="password">{{ __('Confirm Password') }}</label>

          <input class="form-input shadow border-gray-400 {{ $errors->has('password') ? 'border-red-500' : '' }}"
            type="password" name="password_confirmation">

          @error('password_confirmation') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <!-- Submit -->
        <div class="p-2 mx-1 w-full flex justify-between items-center">
          <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">{{ __('Register') }}</button>
        </div>

        @if (Route::has('register'))
        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-300 text-center">
          {{ __('Already have an account?') }}
          <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
            {{ __('Login') }}
          </a>
        </div>
        @endif
      </div>
    </form>
  </div>
</section>
@endsection
