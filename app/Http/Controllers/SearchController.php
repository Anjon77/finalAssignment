<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CompanyJob;
use App\Models\Blog;
use App\Models\Category;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query'); // Retrieve the search query from the request

        // Perform separate search queries for each type
        $jobs = CompanyJob::where('job_title', 'like', '%' . $query . '%')
            ->orWhere('job_description', 'like', '%' . $query . '%')
            ->orWhere('company_name', 'like', '%' . $query . '%')
            ->get();

        $blogs = Blog::where('title', 'like', '%' . $query . '%')
            ->orWhere('content', 'like', '%' . $query . '%')
            ->get();

        $categories = Category::where('cat_name', 'like', '%' . $query . '%')
            ->get();

        // Check if any results were found
        if (count($jobs) === 0 && count($blogs) === 0 && count($categories) === 0) {
            return redirect()->route('home')->with('error', 'No results found.');
        }

        // Check if any results were found
        // if (count($jobs) === 0 && count($blogs) === 0 && count($categories) === 0) {
        //     return redirect()->route('home')->with('error', 'No results found.');
        // }

        // Merge the search results from different types into a single array
        // $searchResults = [
        //     'jobs' => $jobs,
        //     'blogs' => $blogs,
        //     'categories' => $categories,
        //     'query' => $query
        // ];

        // Pass the search results to the view
        return view('search.search', [
            'jobs' => $jobs,
            'blogs' => $blogs,
            'categories' => $categories,
            'query' => $query
        ]);
    }
}
