<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Blog;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\CompanyJob;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {


        $user_id = auth()->id();
        $Jobs = CompanyJob::latest()->limit(4)->get();


        // Get the categories
        $categoriesByUser = Category::where('user_id', $user_id)->get();
        $categories = Category::all();

        $categoriesJobCounts = Category::withCount('jobs')->get();

        $topCompanies = User::where('role', 'company')
            ->select('id', 'company_name')
            ->withCount('jobs') // Count the number of jobs associated with each company
            ->orderByDesc('jobs_count') // Order by the number of jobs in descending order
            ->take(8) // Retrieve the top 4 companies
            ->get();


        $jobs = CompanyJob::all();

        //  blog posts
        $blogs = Blog::latest()->limit(4)->get();

        $blog_content_limit = [];
        foreach ($blogs as $blog) {
            $blog_content_limit[$blog->id] = Str::limit($blog->content, 20, '...');
        }

        // Pass the data to the view
        return view('home', [

            // 'companyApplications' => $companyApplications,
            'user_id' => $user_id,
            'categoriesJobCounts' => $categoriesJobCounts,
            'Jobs' => $Jobs,
            'categoriesByUser' => $categoriesByUser,
            'categories' => $categories,
            'topCompanies' => $topCompanies,
            'jobs' => $jobs,
            'blogs' => $blogs,
            'blog_content_limit' => $blog_content_limit
        ]);
    }
}
