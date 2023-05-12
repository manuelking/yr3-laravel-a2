@extends('layouts.app')

@section('title')

@section('content')
    


    <div class="min-h-screen p-0 sm:p-12">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">

            <h1 class="text-2xl font-bold mb-8">New User</h1>

            <form action="{{ route('register.store') }}" method="POST" id="form">
            @csrf

            <div class="relative z-0 w-full mb-5">
                <label for="name"></label>
                <textarea type="text" name="name" placeholder="Name" required class=" @error('name') is-invalid @enderror h-12 pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"></textarea>
    
                @error('name')
                <div class="alert alert-danger bappearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none">                     
                    <p class="text-blue-500 text-md italic">{{ $message }}</p>
                </div>
                @enderror
            </div>



            <div class="relative z-0 w-full mb-5">
                <label for="email"></label>
                <textarea type="text" name="email" placeholder="Email" required class=" @error('email') is-invalid @enderror h-12 pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 "></textarea>
    
                @error('email')
                <div class="alert alert-danger bappearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none">                     
                    <p class="text-blue-500 text-md italic">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5">
                <label for="password"></label>
                <textarea type="text" name="password" placeholder="Password" required class=" @error('password') is-invalid @enderror h-12 pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200 "></textarea>
    
                @error('password')
                <div class="alert alert-danger bappearance-none rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none">                     
                    <p class="text-blue-500 text-md italic">{{ $message }}</p>
                </div>
                @enderror
            </div>


      <button type="submit" class="btn w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none">Register</button>
    </form>
  </div>
</div>


@endsection
