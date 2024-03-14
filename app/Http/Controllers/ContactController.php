<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Plugin;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $topCompanies = User::where('role', 'company')
            ->select('id', 'company_name')
            ->withCount('jobs') // Count the number of jobs associated with each company
            ->orderByDesc('jobs_count') // Order by the number of jobs in descending order
            ->take(8) // Retrieve the top 4 companies
            ->get();

        $categories = Category::all();

        $plugins = Plugin::latest()->get();

        return view('frontend.pages.contact', compact('topCompanies', 'categories', 'plugins'));
    }
}
