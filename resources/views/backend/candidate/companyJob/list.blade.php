@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0 text-dark">
                            @if (Auth::check())
                                {{ ucfirst(Auth::user()->role) }} Job Dashboard
                            @endif
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
                            <a href="{{ route('companyJobs.create') }}" class="btn btn-primary float-right">
                                Create Job</li></a>
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
                    <div class="col-md-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 10px">SL</th>
                                            <th>Job Title</th>
                                            <th>Category</th>
                                            <th>Company Name</th>
                                            <th>Job type</th>
                                            <th>Location</th>
                                            <th>Job Description</th>
                                            <th>Qualification</th>
                                            <th>Vacancy </th>
                                            <th>Salary</th>
                                            <th>Deadline</th>
                                            <th>Status</th>
                                            <th>Experience</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobs as $job)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $job->job_title }}</td>
                                                <td>{{ $job->category->cat_name }}</td>
                                                <td>{{ $job->company_name }}</td>
                                                <td>{{ $job->job_type }}</td>
                                                <td>{{ $job->location }}</td>
                                                <td>{{ $job->job_description }}</td>
                                                <td>{{ $job->qualification }}</td>
                                                <td>{{ $job->vacancy }}</td>
                                                <td>{{ $job->salary }}</td>
                                                <td>{{ $job->deadline }}</td>
                                                <td>{{ $job->status }}</td>
                                                <td>{{ $job->experience }}</td>
                                                <td>{{ $job->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('companyJobs.show', $job->id) }}"
                                                        class="btn btn-primary btn-sm" role="button">Show</a>

                                                    <a href="{{ route('companyJobs.edit', $job->id) }}"
                                                        class="btn btn-primary btn-sm" role="button">Edit</a>

                                                    <form method="POST"
                                                        action="{{ route('companyJobs.delete', $job->id) }}}"
                                                        class="d-inline-block"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            role="button">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                {{ $jobs->links() }}
                            </div>

                        </div>
                        <!-- /.card -->


                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
