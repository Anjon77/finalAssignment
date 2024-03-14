<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\CompanyJob;
use Illuminate\Http\Request;

class CompanyJobController extends Controller
{

    public function jobPage_index()
    {
        // Get the categories and category wise job counts
        $categoriesJobCounts = Category::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->distinct()
            ->get();

        $uniqueCategories = $categoriesJobCounts->groupBy('id');

        $Jobs = CompanyJob::latest()->paginate(6);

        return view('frontend.pages.job', [
            'uniqueCategories' => $uniqueCategories,
            'Jobs' => $Jobs,
            'categoriesJobCounts' => $categoriesJobCounts
        ]);
    } // End of jobPage_index

    public function singleJob($id)
    {
        $job = CompanyJob::findOrFail($id);
        $categories = Category::all();
        return view('frontend.pages.singleJob', compact('job', 'categories'));
    }

    //
    public function index()
    {
        $user_id = auth()->id();
        // Retrieve categories associated with the authenticated user's ID
        $jobs = CompanyJob::where('user_id', $user_id)->paginate(5);
        $categories = Category::all();
        return view(
            'backend.company.companyJob.list',
            [
                'jobs' => $jobs,
                'categories' => $categories,
            ]
        );

        // $user_id = auth()->id();
        // $user = User::find($user_id);
        // if ($user && $user->company_name) {
        //     $company_name = $user->company_name;
        //     $jobs = CompanyJob::where('company_name', $company_name)->paginate(5);
        //     $categories = Category::all();
        //     return view('backend.company.companyJob.list', [
        //         'jobs' => $jobs,
        //         'categories' => $categories,
        //         'company_name' => $company_name,
        //     ]);
        // } else {
        //     abort(404, 'Company not found');
        // }
    }

    public function create()
    {
        $categories = Category::all();
        return view('backend.company.companyJob.create', compact('categories'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'job_title' => 'required|min:2|max:50',
            'category_id' => 'required',
            'company_name' => 'required|min:2|max:50',
            'location' => 'required|min:2|max:50',
            'job_description' => 'required',
            'qualification' => 'required',
            'vacancy' => 'required|integer',
            'salary' => 'required',
            'deadline' => 'required|date',
            'status' => 'required',
            'job_type' => 'required',
            'experience' => 'required',

        ]);

        $job = new CompanyJob();
        $job->job_title = $request->job_title;
        $job->category_id = $request->category_id;
        $job->company_name = $request->company_name;
        $job->location = $request->location;
        $job->job_description = $request->job_description;
        $job->qualification = $request->qualification;
        $job->vacancy = $request->vacancy;
        $job->salary = $request->salary;
        $job->deadline = $request->deadline;
        $job->status = $request->status;
        $job->job_type = $request->job_type;
        $job->experience = $request->experience;
        $job->user_id = auth()->id();
        $job->save();

        return redirect()->route('companyJobs.list')->with('success', 'Job created successfully!');
    }

    public function edit($id)
    {
        $job = CompanyJob::findOrFail($id);
        $categories = Category::all();
        return view('backend.company.companyJob.edit', compact('job', 'categories'));
    }

    public function update(Request $request, $id)
    {

        // dd($request->all());
        $request->validate([
            'job_title' => 'required|min:2|max:50',
            'category_id' => 'required',
            'company_name' => 'required|min:2|max:50',
            'location' => 'required|min:2|max:50',
            'job_description' => 'required',
            'qualification' => 'required',
            'vacancy' => 'required|integer',
            'salary' => 'required',
            'deadline' => 'required|date',
            'status' => 'required',
            'job_type' => 'required',
            'experience' => 'required',

        ]);

        $job = CompanyJob::findOrFail($id);
        $job->job_title = $request->job_title;
        $job->category_id = $request->category_id;
        $job->company_name = $request->company_name;
        $job->location = $request->location;
        $job->job_description = $request->job_description;
        $job->qualification = $request->qualification;
        $job->vacancy = $request->vacancy;
        $job->salary = $request->salary;
        $job->deadline = $request->deadline;
        $job->status = $request->status;
        $job->job_type = $request->job_type;
        $job->experience = $request->experience;
        $job->user_id = auth()->id();
        $job->save();

        return redirect()->route('companyJobs.list')->with('success', 'Job Updated successfully!');
    }

    public function show($id)
    {
        $job = CompanyJob::findOrFail($id);
        $categories = Category::all();
        return view('backend.company.companyJob.show', compact('job', 'categories'));
    }

    public function destroy($id)
    {
        $job = CompanyJob::findOrFail($id);
        $job->delete();
        return redirect()->route('companyJobs.list')->with('success', 'Job deleted successfully!');
    }
}
