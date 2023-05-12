<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vote;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $jobsQuery = Job::withVotes()
        ->orderBy('created_at', 'DESC');
           
        if ($request->search) {
            $jobsQuery->where('name', 'LIKE', "%{$request->search}%");    
        }
           
        $jobs = $jobsQuery->paginate(20);
       
        return view('jobs/index', [
           'jobs' => $jobs
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'description' => 'required'
    ]);

    $job = new Job;
    $job->user()->associate(Auth::user());
    $job->name = $request->name;
    $job->location = $request->location;
    $job->description = $request->description;
    $job->save();
        
    return redirect()->route('jobs.index')
        ->with('success','Job listing created successfully.');
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.show', [
     		'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
{
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'description' => 'required'
    ]);

    $job->name = $request->name;
    $job->location = $request->location;
    $job->description = $request->description;
    $job->save();

    return redirect()->route('jobs.index')
        ->with('success', 'Job listing updated successfully');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')
            ->with('success', 'Job listing deleted successfully');

    }





    protected function _voteExists($voteData) {
        return Vote::where([
            'job_id' => $voteData['job_id'],
            'user_id' => $voteData['user_id']
        ])->exists();
    }

    public function upVote(Job $job) {
        if ($this->_voteExists([
            'job_id' => $job->id,
            'user_id' => Auth::user()->id
        ])) {
            return redirect()->route('jobs.index')
            ->with('success', 'You have already voted for this job.');
        }

        $job->addUpVote(Auth::user());

        return redirect()->route('jobs.index')
            ->with('success', 'You have recommended this job to others!');
        }

    public function downVote(Job $job) {
        if ($this->_voteExists([
            'job_id' => $job->id,
            'user_id' => Auth::user()->id
        ])) {
            return redirect()->route('jobs.index')
            ->with('success', 'You have already voted for this job.');
        }
        
        $job->addDownVote(Auth::user());

        return redirect()->route('jobs.index')
        ->with('success', 'Job down voted');
    }


    public function search(Request $request)
    {
          $query = $request->get('query');
          $filterResult = User::where('name', 'LIKE', '%'. $query. '%')->get();
          return view()->route($filterResult);
    }


}
