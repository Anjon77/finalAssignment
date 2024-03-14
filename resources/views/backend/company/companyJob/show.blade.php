@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0 text-dark">
                            {{-- @if (Auth::check())
                                {{ ucfirst(Auth::user()->role) }} Job Dashboard
                            @endif --}}

                            {{ $job->job_title }} Details
                        </h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="mr-3">
                                <a href="#">
                                    @if (Auth::check())
                                        {{ strtoupper(Auth::user()->first_name) }}
                                    @endif
                                </a>
                            </li>
                            <li class="mr-3">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <a href="{{ route('companyJobs.list') }}" class="btn btn-primary float-right">
                                Back</a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('includes.messages')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 offset-2">
                        <div class="d-flex flex-column text-left mb-3">
                            <h3 class="section-title pr-5">
                                <span class="pr-2">Job Detail</span>
                            </h3>
                            <h1 class="mb-3">Diam dolor est ipsum clita lorem</h1>
                            {{-- <div class="d-flex">
                                <p class="mr-3"><i class="fa fa-user text-primary"></i> Admin</p>
                                <p class="mr-3">
                                    <i class="fa fa-folder text-primary"></i> Web Design
                                </p>
                                <p class="mr-3"><i class="fa fa-comments text-primary"></i> 15</p>
                            </div> --}}
                            <div class="card">
                                <h5 class="card-header"><strong>Job Title:</strong> {{ $job->job_title }}
                                </h5>
                                <h5 class="card-header"><strong>Company Name:</strong> {{ $job->company_name }}
                                </h5>
                                <h5 class="card-header"><strong>Job Description:</strong> {{ $job->job_description }}
                                </h5>
                                <h5 class="card-header"><strong>Qualification</strong>: {{ $job->qualification }}
                                </h5>
                                <h5 class="card-header"><strong>Location: </strong>{{ $job->location }}
                                </h5>
                                <h5 class="card-header"><strong>Vacancy: </strong>{{ $job->vacancy }}
                                </h5>
                                <h5 class="card-header"><strong>Category: </strong>{{ $job->category->cat_name }}
                                </h5>
                                <h5 class="card-header"><strong>Job type: </strong>{{ $job->job_type }}
                                    <h5 class="card-header"><strong>Job Status: </strong>{{ $job->status }}
                                    </h5>
                                    <h5 class="card-header"><strong>Experience: </strong>{{ $job->experience }}
                                    </h5>
                                    <h5 class="card-header"><strong>Deadline:</strong> {{ $job->deadline }}
                                    </h5>
                                    <h5 class="card-header"><strong>Salary: </strong>{{ $job->salary }}
                                    </h5>
                                    <h5 class="card-header"><strong>Created Date:</strong> {{ $job->created_at }}
                                    </h5>
                                    <div class="card-body">
                                        <a href="{{ route('companyJobs.list') }}" class="btn btn-primary">Go
                                            Back</a>
                                    </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
