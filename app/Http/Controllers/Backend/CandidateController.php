<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    // public function index()
    // {
    //     return view('backend.candidate.dashboard');
    // }
    public function index()
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);

        // $job_applications = JobApplication::all();

        $AppliedJobsCount = $user->jobApplications()->count();
        $AppliedJobsPending = $user->jobApplications()->where('status', 'pending')->count();
        $AppliedJobsApproved = $user->jobApplications()->where('status', 'approved')->count();
        $AppliedJobsRejected = $user->jobApplications()->where('status', 'rejected')->count();

        return view('backend.candidate.dashboard', [
            'AppliedJobsCount' => $AppliedJobsCount,
            'AppliedJobsPending' => $AppliedJobsPending,
            'AppliedJobsApproved' => $AppliedJobsApproved,
            'AppliedJobsRejected' => $AppliedJobsRejected
        ]);
    }
}
