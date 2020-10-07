@extends('layouts.app')

@section('content')
<section class="text-gray-700 relative">
  <div class="container px-5 py-12 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ __('Reset Password') }}</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Send password reset link to your email</p>
    </div>

    @if (session('status'))
    <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
      {{ session('status') }}
    </div>
    @endif

    <form class="lg:w-1/2 md:w-2/3 mx-auto" method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="flex flex-wrap -m-2">
        <div class="w-full px-3 mb-6">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            for="email">{{ __('E-Mail Address') }}</label>

          <input class="form-input shadow border-gray-400 {{ $errors->has('email') ? 'border-red-500' : '' }}"
            type="email" name="email" value="{{ old('email') }}">

          @error('email') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
        </div>

        <div class="p-2 mx-1">
          <button type="submit" class="text-white bg-blue-500 border-0 py-2 px-8 focus:outline-none hover:bg-blue-600 rounded text-lg">
              {{ __('Send Password Reset Link') }}</button>
        </div>
        {{-- TODO: Mailing --}}

        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-300 text-center">
          {{ __("Go back to") }}
          <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
            {{ __('Login') }}
          </a>
        </div>

      </div>
    </form>
  </div>
</section>
@endsection
