@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="text-gray-700 relative">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ __('Welcome Back') }}</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Enter your credentials to login to your account.</p>
    </div>

    <form class="lg:w-1/2 md:w-2/3 mx-auto" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="flex flex-wrap -m-2">
        <div class="w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="email">{{ __('E-Mail Address') }}</label>

          <input class="form-input shadow border-gray-400 {{ $errors->has('email') ? 'border-red-500' : '' }}"
            type="email" name="email" value="{{ old('email') }}">

          @error('email') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="password">{{ __('Password') }}</label>

          <input class="form-input shadow border-gray-400 {{ $errors->has('password') ? 'border-red-500' : '' }}"
            type="password" name="password">

          @error('password') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="p-2 mx-1 w-full flex justify-between items-center">
          <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">{{ __('Login') }}</button>

          @if (Route::has('password.request'))
          <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
          </a>
          @endif
        </div>

        @if (Route::has('register'))
        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-300 text-center">
          {{ __("Don't have an account?") }}
          <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('register') }}">
            {{ __('Register') }}
          </a>
        </div>
        @endif
      </div>
    </form>
  </div>
</section>
@endsection
