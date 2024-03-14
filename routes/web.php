<?php

use App\Models\Plugin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PluginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyJobController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Backend\OwnerController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\CandidateController;


//Home page
Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/single-blog', [HomeController::class, 'singleBlog'])->name('single-blog');

    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('contact', [ContactController::class, 'index'])->name('contact');
    Route::get('jobs', [CompanyJobController::class, 'jobPage_index'])->name('jobs');
    Route::get('jobs/show/{id}', [CompanyJobController::class, 'singleJob'])->name('single-job');

    Route::get('blogs', [BlogController::class, 'blogPage_index'])->name('blogs');
    Route::get('blogs/show/{id}', [BlogController::class, 'blogPage_show'])->name('blogs.single-blog');
});

//search
Route::get('/search', [SearchController::class, 'search'])->name('search');

//custom auth routes
Route::get('/login-page', [CustomAuthController::class, 'CustomLoginPage']);
Route::get('/register-page', [CustomAuthController::class, 'CustomRegisterPage']);
Route::get('/candidate-login', [CustomAuthController::class, 'CustomCandidateLoginPage']);
Route::get('/company-login', [CustomAuthController::class, 'CustomCompanyLoginPage']);
Route::get('/candidate-register', [CustomAuthController::class, 'CustomCandidateRegisterPage']);
Route::get('/company-register', [CustomAuthController::class, 'CustomCompanyRegisterPage']);

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/owner/dashboard', function () {
//     return view('backend.owner.dashboard');
// });


// dashboard
Route::get('/dashboard', function () {
    if (Auth::check()) {
        switch (Auth::user()->role) {
            case 'owner':
                return redirect('/owner/dashboard');
                break;
            case 'company':
                return redirect('/company/dashboard');
                break;
            case 'candidate':
                return redirect('/candidate/dashboard');
                break;
            default:
                return redirect('/');
                break;
        }
    }
    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// owner
Route::group(['middleware' => 'owner'], function () {
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');

    Route::get('/owner/dashboard/company-lists', [OwnerController::class, 'companylists'])->name('owner.dashboard.company-lists');
    Route::get('/owner/dashboard/company-jobs', [OwnerController::class, 'companyJobs'])->name('company-jobs-lists');
    Route::get('/owner/dashboard/candidate-lists', [OwnerController::class, 'candidateList'])->name('owner.dashboard.candidate-lists');
    Route::get('/owner/dashboard/pages', [OwnerController::class, 'ownerDashboardPages'])->name('ownerDashboardPages');
    Route::get('/owner/dashboard/candidates', [OwnerController::class, 'candidateList'])->name('owner.dashboard.candidate.list');
    Route::get('/company/dashboard/category-lists', [OwnerController::class, 'categirylists'])->name('owner.dashboard.category-lists');



    // plugins
    Route::get('/owner/dashboard/plugins', [PluginController::class, 'index'])->name('plugins.list');
    Route::get('/owner/dashboard/plugins/create', [PluginController::class, 'create'])->name('plugins.create');
    Route::post('/owner/dashboard/plugins/store', [PluginController::class, 'store'])->name('plugins.store');
    Route::get('/owner/dashboard/plugins/show/{id}', [PluginController::class, 'show'])->name('plugins.show');
    Route::get('/owner/dashboard/plugins/edit/{id}', [PluginController::class, 'edit'])->name('plugins.edit');
    Route::put('/owner/dashboard/plugins/update/{id}', [PluginController::class, 'update'])->name('plugins.update');
    Route::delete('/owner/dashboard/plugins/delete/{id}', [PluginController::class, 'destroy'])->name('plugins.delete');

    //  blogs
    Route::get('/owner/dashboard/blogs', [BlogController::class, 'index'])->name('blogs.list');
    Route::get('/owner/dashboard/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/owner/dashboard/blogs/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/owner/dashboard/blogs/show/{id}', [BlogController::class, 'show'])->name('blogs.show');
    Route::get('/owner/dashboard/blogs/edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/owner/dashboard/blogs/update/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/owner/dashboard/blogs/delete/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');


    //category route
    Route::get('/owner/dashboard/category', [CategoryController::class, 'index'])->name('category.list');
    Route::get('/owner/dashboard/category/create', [CategoryController::class, 'categoryCreate'])->name('category.create');
    Route::post('/owner/dashboard/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/owner/dashboard/category/edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::put('/owner/dashboard/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::delete('/owner/dashboard/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
});

// Company
Route::group(['middleware' => 'company'], function () {
    Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.dashboard');




    //Job
    Route::get('company/dashboard/companyJobs', [CompanyJobController::class, 'index'])->name('companyJobs.list');
    Route::get('company/dashboard/companyJobs/create', [CompanyJobController::class, 'create'])->name('companyJobs.create');
    Route::post('company/dashboard/companyJobs/store', [CompanyJobController::class, 'store'])->name('companyJobs.store');
    Route::get('company/dashboard/companyJobs/show/{id}', [CompanyJobController::class, 'show'])->name('companyJobs.show');
    Route::get('company/dashboard/companyJobs/edit/{id}', [CompanyJobController::class, 'edit'])->name('companyJobs.edit');
    Route::put('company/dashboard/companyJobs/update/{id}', [CompanyJobController::class, 'update'])->name('companyJobs.update');
    Route::delete('company/dashboard/companyJobs/delete/{id}', [CompanyJobController::class, 'destroy'])->name('companyJobs.delete');
});

// Candidate
Route::group(['middleware' => 'candidate'], function () {
    Route::get('/candidate/dashboard', [CandidateController::class, 'index'])->name('candidate.dashboard');

    //Job Application routes
    Route::get('/candidate/job-applications', [JobApplicationController::class, 'jobApplicationList'])->name('applicationsJobs.list');
    Route::get('/candidate/job-application/create/{jobId}', [JobApplicationController::class, 'jobApplicationCreate'])->name('applicationsJobs.create');
    Route::post('/candidate/job-application/store', [JobApplicationController::class, 'jobApplicationStore'])->name('applicationsJobs.store');

    Route::get('candidate/job-application/{jobId}/edit', [JobApplicationController::class, 'jobApplicationEdit'])->name('jobApplication.edit');


    // Route::get('/candidate/job-application/edit/{id}', [JobApplicationController::class, 'jobApplicationEdit'])->name('applicationsJobs.edit');
    Route::put('/candidate/job-application/update', [JobApplicationController::class, 'jobApplicationUpdate'])->name('applicationsJobs.update');
    Route::delete('/candidate/job-application/delete/{id}', [JobApplicationController::class, 'jobApplicationDelete'])->name('applicationsJobs.delete');
});
