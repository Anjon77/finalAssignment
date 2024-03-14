<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    // public function index()
    // {
    //     return view('backend.company.dashboard');
    // }
    public function index()
    {
        $userId = auth()->id();
        $user = User::findOrFail($userId);

        // Retrieve the user's category count
        $categories = Category::all();
        $categoryCount = $user->categories()->count();

        // Retrieve the user's job post count
        $jobCount = $user->jobs()->count();
        return view('backend.company.dashboard', compact('jobCount', 'categoryCount'));
    }

    // public function companyProfile()
    // {
    //     $userId = Auth::id(); // or Auth::user()->id;
    //     $userProfile = User::findOrFail($userId);
    //     return view('company.profile.company_profile', compact('userProfile'));
    // }
}
