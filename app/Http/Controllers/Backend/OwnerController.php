<?php

namespace App\Http\Controllers\Backend;

use App\Models\Job;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Models\CompanyJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function index()
    {


        $activeCompany = User::where('role', 'company')->where('status', 'active')->count();
        $inactiveCompany = User::where('role', 'company')->where('status', 'inactive')->count();

        $activeCandidate = User::where('role', 'candidate')->where('status', 'active')->count();
        $inactiveCandidate = User::where('role', 'candidate')->where('status', 'inactive')->count();

        $companyRole = User::where('role', 'company')->first();
        $candidateRole = User::where('role', 'candidate')->first();

        $companyCount = User::where('role', 'company')->count();
        $candidateCount = User::where('role', 'candidate')->count();

        $user = Auth::user();
        // Retrieve categories created by the user
        $categories = $user->categories;

        $ownerDashboardCategories = Category::all();
        $categoryCount = Category::count();

        $jobCount = CompanyJob::count();
        $jobs = CompanyJob::latest()->paginate(4);
        $OwnerDashboardJobs = CompanyJob::latest()->get();

        $blogPostCount = Blog::count();

        $user = Auth::user();
        $companylists = User::where('role', 'company')->get();

        return view('backend.owner.dashboard', [
            'companylists' => $companylists,
            'user' => $user,
            'OwnerDashboardJobs' => $OwnerDashboardJobs,
            'jobs' => $jobs,
            'ownerDashboardCategories' => $ownerDashboardCategories,
            'activeCompany' => $activeCompany,
            'inactiveCompany' => $inactiveCompany,
            'activeCandidate' => $activeCandidate,
            'inactiveCandidate' => $inactiveCandidate,
            'companyCount' => $companyCount,
            'candidateCount' => $candidateCount,
            'categoryCount' => $categoryCount,
            'jobCount' => $jobCount,
            'blogPostCount' => $blogPostCount
        ]);
    }

    public function ownerJobsList_index()
    {
        $jobs = CompanyJob::latest()->paginate(10);
        return view('owner.jobs.list', [
            'jobs' => $jobs
        ]);
    }

    public function ownerCategoryList_index()
    {
        $user = Auth::user();
        // Retrieve categories created by the user
        $categories = $user->categories;
        // Loop through the categories to get their names
        $ownerDashboardcategories = Category::latest()->get();

        return view('owner.category.list', [
            'ownerDashboardcategories' => $ownerDashboardcategories,
            'categories' => $categories
        ]);
    }

    public function ownerComapnayList_index()
    {
        $users = User::all();
        $companies = $users->where('role', 'company');

        return view('owner.company.list', [
            'companies' => $companies
        ]);
    }

    public function ownerCandidateList_index()
    {
        $users = User::all();
        $candidates = $users->where('role', 'candidate');

        return view('owner.candidate.list', [
            'candidates' => $candidates
        ]);
    }
    // public function index()
    // {
    //     $user = Auth::user();
    //     $companylists = User::where('role', 'company')->get();
    //     return view('backend.owner.dashboard', [
    //         'companylists' => $companylists,
    //         'user' => $user
    //     ]);
    // }
    public function companylists()
    {
        $user = Auth::user();
        $companylists = User::where('role', 'company')->get();

        return view('backend.owner.company.list', [
            'companylists' => $companylists,
            'user' => $user
        ]);
    }

    public function companyJobs()
    {
        // $jobs = CompanyJob::all();
        $jobs = CompanyJob::latest()->paginate(10);
        return view('backend.owner.jobs.list', [
            'jobs' => $jobs,
        ]);
    }

    public function candidateList()
    {
        $candidates = User::where('role', 'candidate')->get();
        return view('backend.owner.candidate.list', [
            'candidates' => $candidates
        ]);
    }

    public function ownerDashboardPages()
    {
        $candidates = User::where('role', 'candidate')->get();
        return view('backend.owner.pages', [
            'candidates' => $candidates
        ]);
    }
}
