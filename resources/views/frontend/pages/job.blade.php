@extends('frontend.layouts.app')
<!-- resources/views/frontend/pages/blog.html -->
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Our Jobs</h3>
        </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">


            {{-- jobs table --}}
            <div class="container-fluid pt-5">
                <div class="container">
                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <span class="px-2"> Job</span>
                        </p>
                        <h1 class="mb-4">Recent All Published Jobs</h1>
                    </div>
                    <div class="text-center pb-2">
                        @foreach ($categoriesJobCounts as $categoriesJobCount)
                            <button type="button" class="btn btn-primary btn-lg my-2">{{ $categoriesJobCount->cat_name }}
                                ({{ $categoriesJobCount->jobs_count }})
                            </button>
                        @endforeach
                    </div>
                    @foreach ($Jobs as $Job)
                        <div class="card my-4 border-dark">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <h2 class="card-title">{{ $Job->job_title }}</h2>
                                </div>
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

                                        <a href="{{ route('single-job', $Job->id) }}"
                                            class="btn btn-primary px-4 mx-auto my-2">Job
                                            Details</a>


                                    </div>
                                </div>

                            </div>
                            {{-- <a href="{{ url('/dashboard/company/job/show', $Job->id) }}"
                                class="btn btn-primary px-4 mx-auto my-2">Job
                                Details</a> --}}

                        </div>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4 mb-5">
                {{ $Jobs->links() }}
            </div>

        </div>
    </div>
    <!-- Blog End -->
@endsection
