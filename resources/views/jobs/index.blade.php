@extends('layouts.app')


@section('title', 'All of our Available Jobs')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    @section('content')

    <form action="{{ route('jobs.index') }}" method="GET">

    <div class="flex items-center justify-center">
    <div class="flex border-2 rounded">
    @csrf

        <input name="search" id="search" placeholder="Search..." class="@error('search') is-invalid @enderror px-4 py-2 w-80 p-2 bg-gray-200 @error('search') is-invalid @enderror" />
        @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <button type="submit"class="flex items-center justify-center px-4 border-l">
            <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24">
                <path
                    d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
            </svg>
        </button>
    </div>
    <a href="/jobs">Back to job list</a>
</div>
</form>

<!-- 
    CSS adapted from -
    https://flowbite.com/docs/components/card/
 -->
    
    @foreach ($jobs as $job)
        <article class="ml-12">


        <div class="relative p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
            <a href="{{ route('jobs.show', $job->id) }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $job->name }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $job->description }}</p>
                <div class="absolute top-0 right-0 mr-4 mt-4 inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-white bg-yellow-300 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                <span>1{{ $job->up_votes }}</span>
                </div>
            <div>
                <form action="{{ route('jobs.upvote', $job->id) }}" method="POST">
                    @csrf
                
                    <button type="submit" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                        <span class="ml-2">Recommend</span>
                    </button>    
                </form>


                @if (Auth::user() && Auth::user()->id === $job->user_id)
                <hr class="mt-5 mb-5">
                <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
                    <a class="btn btn-blue" href="{{ route('jobs.show', $job->id) }}">Show</a>
                    <a class="btn btn-blue" href="{{ route('jobs.edit', $job->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-red">Delete</button>
                </form>
            @endif
       
            </div>
        </div>
        </article>
        
    @endforeach


    
@endsection
