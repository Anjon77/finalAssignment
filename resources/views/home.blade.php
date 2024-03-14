@extends('frontend.layouts.app')

@section('content')
    <!-- Header Start px-0 px-md-5 mb-5-->
    <div class="container-fluid bg-primary" style="padding: 50px">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h4 class="text-white mb-4 mt-5 mt-lg-0">Welcome to Our Job Pulse</h4>
                <h1 class="display-3 font-weight-bold text-white">
                    New Approach to Finding Your Dream Job
                </h1>
                <p class="text-white mb-4">
                    Sea ipsum kasd eirmod kasd magna, est sea et diam ipsum est amet sed
                    sit. Ipsum dolor no justo dolor et, lorem ut dolor erat dolore sed
                    ipsum at ipsum nonumy amet. Clita lorem dolore sed stet et est justo
                    dolore.
                </p>
                <a href="{{ url('/about') }}" class="btn btn-secondary mt-1 py-3 px-5">Learn More About Us</a>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="{{ asset('img/header.png') }}" alt="" />
            </div>
        </div>
    </div>
    <!-- Header End -->
    {{-- {{ route('search') }} --}}
    <div class="container bg-white mb-5 mt-5">
        <form action="{{ route('search') }}" method="GET">
            @csrf
            <div class="input-group">
                <input type="search" name="query" class="form-control rounded" placeholder="Search here..."
                    aria-label="Search" aria-describedby="search-addon" style="padding:10px" />
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Search</button>
            </div>
        </form>
    </div>





    {{-- Top companies --}}
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Our Top Company Partners</span>
                </p>
                <h1 class="mb-4">Top Companies</h1>
            </div>
            <div class="row pb-3">
                @foreach ($topCompanies as $topCompany)
                    <div class="col-lg-3 mb-4">
                        <div class="card text-white bg-info mb-3">

                            <div class="card-body ">
                                <h3 class="card-title mb-0">{{ ucfirst($topCompany->company_name) }}</h3>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- categories --}}

    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Our Category</span>
                </p>
                <h1 class="mb-4">Categories</h1>
            </div>
            <div class="row">
                @foreach ($categories as $item)
                    <div class="col-lg-3 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 15px">

                            <div class="pl-4">
                                <h4> {{ $item->cat_name }}</h4>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    {{-- Our Jobs --}}
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2"> Job</span>
                </p>
                <h1 class="mb-4">Recent Published Job</h1>
            </div>
            <div class="text-center pb-2">
                {{-- @foreach ($categoriesJobCounts as $categoriesJobCount)
                    <button type="button" class="btn btn-primary btn-lg my-2">{{ $categoriesJobCount->cat_name }}
                        ({{ $categoriesJobCount->jobs_count }})
                    </button>
                @endforeach --}}
            </div>
            {{-- @foreach ($Jobs as $Job)
                <div class="card my-4 border-dark">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary">Category -
                            {{ $Job->category->cat_name }}</button>
                    </div>
                    <div class="card-body card-header">
                        <h2 class="card-title">{{ $Job->job_title }}</h2>
                        <p class="card-text">Description - {{ $Job->job_description }}</p>
                        <div class=" overflow-auto">
                            <div class="float-left">
                                <button type="button" class="btn btn-primary">Deadline -
                                    {{ $Job->deadline }}</button>
                                <button type="button" class="btn btn-primary">Vacancy -
                                    {{ $Job->vacancy }}</button>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-primary"><strong>BD Tk - {{ $Job->salary }}
                                    </strong></button>
                                <a href="{{ url('candidate/job-application/form', ['jobId' => $Job->id]) }}"
                                    class="btn btn-primary px-4 mx-auto my-2">Apply for
                                    Job</a>


                            </div>
                        </div>

                    </div>
                </div>
            @endforeach --}}
            @foreach ($Jobs as $Job)
                <div class="card my-4 border-dark">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h2 class="card-title">{{ $Job->job_title }}</h2>
                        </div>
                        {{-- <div><a href="{{ url('candidate/job-application/form', ['jobId' => $Job->id]) }}"
                                class="btn btn-primary px-4 mx-auto my-2 float-right">Apply for
                                Job</a></div> --}}
                        @if (auth()->check())
                            {{-- Check if the user is authenticated --}}
                            <div>
                                <a href="{{ route('applicationsJobs.create', ['jobId' => $Job->id]) }}"
                                    class="btn btn-primary px-4 mx-auto my-2 float-right">Apply for Job</a>
                            </div>
                        @else
                            <div>
                                <a href="{{ url('candidate-login') }}"
                                    class="btn btn-primary px-4 mx-auto my-2 float-right">Go login to Apply</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-body card-header">

                        <p class="card-text"><strong>Description</strong> - {{ $Job->job_description }}</p>
                        <div>
                            <button type="button" class="btn btn-primary mb-2">Company Name -
                                {{ $Job->company_name }}</button>

                            <button type="button" class="btn btn-primary mb-2">Category -
                                {{ $Job->category->cat_name }}</button>
                        </div>

                        <div class=" overflow-auto">
                            <div class="float-left">
                                <button type="button" class="btn btn-primary">Deadline -
                                    {{ $Job->deadline }}</button>
                                <button type="button" class="btn btn-primary">Vacancy -
                                    {{ $Job->vacancy }}</button>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-primary"><strong>BD Tk
                                        -{{ $Job->salary }}
                                    </strong></button>

                                <a href="{{ route('single-job', $Job->id) }}" class="btn btn-primary px-4 mx-auto my-2">Job
                                    Details</a>


                            </div>
                        </div>

                    </div>
                    {{-- <a href="{{ url('/dashboard/company/job/show', $Job->id) }}"
                                class="btn btn-primary px-4 mx-auto my-2">Job
                                Details</a> --}}

                </div>
            @endforeach
            <div>
                <a href="{{ url('/jobs') }}" class="btn btn-primary ml-4">View All Job</a>
            </div>
        </div>
    </div>
    {{-- Our blog --}}
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Our blogs</span>
                </p>
                <h1 class="mb-4">Our Blogs</h1>
            </div>

            <div class="row pb-3">
                @foreach ($blogs as $blog)
                    <div class="col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="{{ asset('/images/' . $blog->image) }}" alt="" />

                            <div class="card-body bg-light text-center p-4">
                                <h4 class="">{{ $blog->title }}</h4>
                                <div class="d-flex justify-content-center mb-3">
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i>

                                        @auth
                                            {{ ucfirst(Auth::user()->first_name) }}
                                        @endauth

                                    </small>
                                    <small class="mr-3"><i class="fa fa-folder text-primary"></i>
                                        {{ $blog->category ? $blog->category->cat_name : 'No Category' }}</small>

                                </div>
                                <p>
                                    {{ $blog_content_limit[$blog->id] }}...
                                </p>
                                <a href="{{ url('blogs/show', $blog->id) }}"
                                    class="btn btn-primary px-4 mx-auto my-2">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div>
                    <a href="{{ url('/blogs') }}" class="btn btn-primary ml-4">View All Blogs</a>
                </div>
            </div>

        </div>
    </div>
@endsection
