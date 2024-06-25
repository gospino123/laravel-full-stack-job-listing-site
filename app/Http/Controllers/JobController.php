<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    //
    public function index() {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
    
        return view('jobs.index', 
            [ 'jobs' => $jobs,
        ]);
    }
    public function create() {
        return view('jobs.create');
    }
    public function show(Job $job) {
        return view('jobs.show', ['job' => $job,]);
    }
    public function store() {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
    
        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
    
        return redirect('/jobs');
    }
    public function edit(Job $job) {
        // $model->can()
        // if (Auth:user()->cannot('edit-job', $job)) {
            // dd('failure');
        // };
        // Gate::authorize('edit-job', $job);
        // versus if Gate::denies('edit-job', $job) {code block for sp. action}

        return view('jobs.edit', ['job' => $job,]);
    }
    public function update(Job $job) {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $job->title = request('title');
        $job->salary = request('salary');
        $job->save();
        return redirect('/jobs/' . $job->id);
    }
    public function destroy(Job $job) {
        $job->delete();
        return redirect('/jobs');
    }
}
