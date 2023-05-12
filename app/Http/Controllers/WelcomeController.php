<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestJobs = Job::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('welcome', [
        'latestJobs' => $latestJobs
        ]);
    }
}
