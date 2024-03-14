@extends('frontend.layouts.app')
<!-- resources/views/frontend/pages/blog.html -->
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">job Details</h3>

        </div>
    </div>
    <!-- Header End -->

    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-md-10 offset-1">
                <div class="d-flex flex-column text-left mb-3">
                    <h3 class="section-title pr-5 mb-3">
                        <span class="pr-2">Job Detail</span>
                    </h3>
                    <div class="card ">
                        <h5 class="card-header"><strong>Job Title:</strong> {{ $job->job_title }}</h5>
                        <h5 class="card-header"><strong>Company Name:</strong> {{ $job->company_name }}</h5>
                        <h5 class="card-header"><strong>Job Description:</strong> {{ $job->job_description }}</h5>
                        <h5 class="card-header"><strong>Qualification</strong>: {{ $job->qualification }} </h5>
                        <h5 class="card-header"><strong>Location: </strong>{{ $job->location }}</h5>
                        <h5 class="card-header"><strong>Vacancy: </strong>{{ $job->vacancy }}</h5>
                        <h5 class="card-header"><strong>Category: </strong>{{ $job->category->cat_name }}</h5>
                        <h5 class="card-header"><strong>Job type: </strong>{{ $job->job_type }}</h5>
                        <h5 class="card-header"><strong>Job Status: </strong>{{ $job->status }}</h5>
                        <h5 class="card-header"><strong>Experience: </strong>{{ $job->experience }}</h5>
                        <h5 class="card-header"><strong>Deadline:</strong> {{ $job->deadline }}</h5>
                        <h5 class="card-header"><strong>Salary: </strong>{{ $job->salary }}</h5>
                        <h5 class="card-header"><strong>Created Date:</strong> {{ $job->created_at }} </h5>
                        <div class="card-body">
                            <a href="{{ route('home') }}" class="btn btn-primary">Go
                                Back Home</a>
                            @if (auth()->check())
                                {{-- Check if the user is authenticated --}}
                                <div>
                                    <a href="{{ url('candidate/job-application/form', ['jobId' => $Job->id]) }}"
                                        class="btn btn-primary px-4 mx-auto my-2 float-right">Apply for Job</a>
                                </div>
                            @else
                                <div>
                                    <a href="{{ url('candidate-login') }}"
                                        class="btn btn-primary px-4 mx-auto my-2 float-right">Go login to Apply</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
