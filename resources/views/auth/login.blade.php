
@extends('layouts.app')

@section('content')

<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-16 w-auto" src="https://user-images.githubusercontent.com/79155600/148837539-8c83a2c4-1cf4-4630-8e52-6bd7c61ecd12.png" alt="Workflow">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Login to your account
      </h2>
    </div>

    @if (Auth::guest())
    <form class="mt-8 space-y-6" action="{{ route('authenticate') }}" method="POST">        
      <input type="hidden" name="remember" value="true">
      @csrf

            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p class="mt-2 text-center text-lg text-gray-600">{{ $message }}</p>
                </div>
            @endif
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
        <label for="email" class="sr-only">Email</label>
        <input type="text" name="email" id="email" placeholder="Email Address" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm @error('email') is-invalid @enderror" />
            @error('email')
            <div class="alert alert-danger appearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none">
            <p class="text-red-500 text-md italic">{{ $message }}</p>
</div>
            @enderror
        </div>
        <div>
            <label for="password" class="sr-only">Password</label>
            <input name="password" id="password" placeholder="Password" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm @error('password') is-invalid @enderror" />

            @error('password')
                <div class="alert alert-danger bappearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none">                     
                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                </div>
            @enderror
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
          <label for="remember-me" class="ml-2 block text-sm text-gray-900">
            Remember me
          </label>
        </div>

        <div class="text-sm">
          <a href="#" class="font-medium text-blue-600 hover:text-blue-500">
            Forgot your password?
          </a>
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Sign in
        </button>
      </div>

      <p class="mt-2 text-center text-sm text-gray-600">
        Or login using
      </p>

      <div>       
        <a href="{{ url('auth/redirect') }}" class="btn group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <svg class="h-5 w-5 text-blue-500 group-hover:text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
        Login with GitHub
        </a>
      </div>

            

    </form>
  </div>
</div>

        </form>
    @else
        <p>You are already logged in!</p>
    @endif
@endsection
