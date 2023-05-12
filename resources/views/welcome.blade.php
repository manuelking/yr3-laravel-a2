@extends('layouts.app')



@section('content')
@foreach ($latestJobs as $job)
    <div class="p-4 mb-5 max-w-md bg-white rounded-lg border shadow-md sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center">
        <h3 class="text-xl font-bold leading-none text-gray-900 dark:text-white">@section('title', 'Latest Jobs')</h3>
        <div class="flow-root">
            <h3><a href="{{ route('jobs.show', $job->id) }}">{{ $job->user->name }}</a></h3>
            <p>{{ $job->comments }}</p>
            
</div>
</div>
</div>





    @endforeach
@endsection

