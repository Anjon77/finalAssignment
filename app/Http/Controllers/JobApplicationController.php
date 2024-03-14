<?php

namespace App\Http\Controllers;

use App\Models\CompanyJob;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{

    public function jobApplicationList()
    {
        // $applications = JobApplication::where('user_id', Auth::id())->get();
        $user_id = auth()->id();
        // Retrieve categories associated with the authenticated user's ID
        $applications = JobApplication::where('user_id', $user_id)->get();
        $jobs = CompanyJob::all();

        // Pass data to the view
        return view('backend.candidate.job_application.list', [
            'applications' => $applications,
            'jobs' => $jobs
        ]);
    }



    public function jobApplicationCreate($jobId)
    {
        $jobId = CompanyJob::findOrFail($jobId);
        $job_title = $jobId->job_title;
        return view('backend.candidate.job_application.create', compact('jobId', 'job_title'));
    }
    // public function jobApplicationStore(Request $request)
    // {
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'cover_letter' => 'required|string',
    //         'resume' => 'required|file|mimes:pdf,doc,docx',
    //         'job_id' => 'required|exists:company_jobs,id', // Update validation rule for job_id
    //         'status' => 'required',
    //     ]);

    //     // Handle resume file upload
    //     if ($request->hasFile('resume')) {
    //         $resume = $request->file('resume');
    //         $filename = time() . '.' . $resume->getClientOriginalExtension();
    //         $resume->move(public_path('resume'), $filename);
    //     } else {
    //         // Handle case where resume file is not uploaded
    //         return redirect()->back()->with('error', 'Resume file is required.');
    //     }

    //     // Save the job application
    //     $jobApplication = new JobApplication();
    //     $jobApplication->user_id = auth()->id(); // Assuming the user is authenticated
    //     $jobApplication->job_id = $validatedData['job_id'];
    //     $jobApplication->cover_letter = $validatedData['cover_letter'];
    //     $jobApplication->resume = $filename; // Store the uploaded resume file
    //     $jobApplication->status = $validatedData['status'];
    //     $jobApplication->save();

    //     // Redirect the user to the job application list page with success message
    //     return redirect()->route('backend.candidate.job_application.list')->with('success', 'Job application submitted successfully!');
    // }

    // public function jobApplicationStore(Request $request)
    // {
    //     // dd($request->all());
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'cover_letter' => 'required|string',
    //         'resume' => 'required|file|mimes:pdf,doc,docx',
    //         'company_job_id' => 'required|exists:company_jobs,id', // Updated validation rule for company_job_id
    //         'status' => 'required',
    //     ]);

    //     // Handle resume file upload
    //     if ($request->hasFile('resume')) {
    //         $resume = $request->file('resume');
    //         $filename = time() . '.' . $resume->getClientOriginalExtension();
    //         $resume->move(public_path('resume'), $filename);
    //     } else {
    //         // Handle case where resume file is not uploaded
    //         return redirect()->back()->with('error', 'Resume file is required.');
    //     }

    //     // Save the job application
    //     $jobApplication = new JobApplication();
    //     $jobApplication->user_id = auth()->id(); // Assuming the user is authenticated
    //     $jobApplication->company_job_id = $validatedData['company_job_id']; // Updated property name
    //     $jobApplication->cover_letter = $validatedData['cover_letter'];
    //     $jobApplication->resume = $filename; // Store the uploaded resume file
    //     $jobApplication->status = $validatedData['status'];
    //     $jobApplication->save();

    //     // Redirect the user to the job application list page with success message
    //     return redirect()->route('applicationsJobs.list')->with('success', 'Job application submitted successfully!');
    // }

    // public function jobApplicationEdit($jobId)
    // {
    //     $jobId = CompanyJob::findOrFail($jobId);
    //     $job_title = $jobId->job_title;

    //     $application = JobApplication::findOrFail($jobId);

    //     return view('backend.candidate.job_application.edit', [
    //         'application' => $application,
    //         'job_title' => $job_title,
    //         'jobId' => $jobId

    //     ]);
    // }

    public function jobApplicationEdit($jobId)
    {
        // Retrieve the CompanyJob object based on the $jobId
        $job = CompanyJob::findOrFail($jobId);
        $job_title = $job->job_title;

        // Retrieve the JobApplication object based on the job ID
        $application = JobApplication::findOrFail($job->id);

        return view('backend.candidate.job_application.edit', [
            'application' => $application,
            'job_title' => $job_title,
            'jobId' => $job
        ]);
    }


    // public function jobApplicationUpdate(Request $request, $jobId)
    // {
    //     dd($request->all());
    //     // Validate the form data
    //     $validatedData = $request->validate([
    //         'cover_letter' => 'required|string',
    //         'resume' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    //         'company_job_id' => 'required|exists:company_jobs,id', // Updated validation rule for company_job_id
    //         'status' => 'required',
    //     ]);

    //     // Handle resume file upload
    //     if ($request->hasFile('resume')) {
    //         $resume = $request->file('resume');
    //         $filename = time() . '.' . $resume->getClientOriginalExtension();
    //         $resume->move(public_path('resume'), $filename);
    //     } else {
    //         // Handle case where resume file is not uploaded
    //         return redirect()->back()->with('error', 'Resume file is required.');
    //     }

    //     // Save the job application
    //     $jobApplication = JobApplication::firndOrFail($jobId);
    //     $jobApplication->user_id = auth()->id(); // Assuming the user is authenticated
    //     $jobApplication->company_job_id = $validatedData['company_job_id']; // Updated property name
    //     $jobApplication->cover_letter = $validatedData['cover_letter'];
    //     $jobApplication->resume = $filename; // Store the uploaded resume file
    //     $jobApplication->status = $validatedData['status'];
    //     $jobApplication->save();

    //     // Redirect the user to the job application list page with success message
    //     return redirect()->route('applicationsJobs.list')->with('success', 'Job application submitted successfully!');
    // }

    public function jobApplicationStore(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'cover_letter' => 'required|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'company_job_id' => 'required|exists:company_jobs,id',
            'status' => 'required',
        ]);

        // Handle resume file upload
        if ($request->hasFile('resume')) {
            $resume = $request->file('resume');
            $filename = time() . '.' . $resume->getClientOriginalExtension();
            $resume->move(public_path('resume'), $filename);
        } else {
            // Handle case where resume file is not uploaded
            return redirect()->back()->with('error', 'Resume file is required.');
        }

        // Save the job application
        $jobApplication = new JobApplication();
        $jobApplication->user_id = auth()->id(); // Assuming the user is authenticated
        $jobApplication->company_job_id = $validatedData['company_job_id'];
        $jobApplication->cover_letter = $validatedData['cover_letter'];
        $jobApplication->resume = $filename;
        $jobApplication->status = $validatedData['status'];
        $jobApplication->save();

        // Redirect the user to the job application list page with success message
        return redirect()->route('applicationsJobs.list')->with('success', 'Job application submitted successfully!');
    }
}
