@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Submitted Application</h1>
                    </div>
                    <div class="col-sm-6">
                        {{-- <ol class="breadcrumb float-sm-right">
                            <a href="{{ url('/dashboard/owner/blogs/list') }}" class="btn btn-primary float-right">
                                Back</li></a>
                        </ol> --}}
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        @include('includes.messages')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>job title</th>
                                            <th>Comapny Name</th>
                                            <th>Category</th>
                                            <th>Cover Letter</th>

                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applications as $application)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $application->companyJob->job_title }}</td>
                                                <td>{{ $application->companyJob->company_name }}</td>
                                                <td>{{ $application->companyJob->category->cat_name }}</td>
                                                <td>{{ $application->cover_letter }}</td>
                                                <td>{{ $application->status }}</td>
                                                {{-- <td>
                                                   
                                                    <iframe src="{{ asset('resume/' . $application->resume) }}"
                                                        width="40px" height="40px"></iframe>
                                                </td>  --}}


                                                {{-- <td>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('applicationsJobs.edit', $application->id) }}">Edit</a>

                                                    <form method="POST"
                                                        action="{{ route('applicationsJobs.delete', $application->id) }}}"
                                                        class="d-inline-block"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            role="button">Delete</button>
                                                    </form>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
