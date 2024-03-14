@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('backend.candidate.content-header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header mb-3">
                            <h3 class="card-title">Edit Your Job Application Form</h3>
                        </div>

                        <div class="">
                            <h5 class="text-normal p-2"><strong>Job Title:</strong> {{ $jobId->job_title }}</h5>
                            <hr>
                        </div>

                        <form action="{{ url('candidate/job-application/update', $jobId->id) }}" method="post"
                            role="form" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <!-- User ID (Hidden Field) -->
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                            <!-- Job ID (Hidden Field) -->
                            <input type="hidden" name="company_job_id" value="{{ $jobId->id }}">
                            <!-- Status (Hidden Field with Default Value) -->
                            <input type="hidden" name="status" value="pending">


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cover_letter">Cover Letter</label>
                                    <textarea type="text" class="form-control" id="cover_letter" name="cover_letter" rows="4"
                                        placeholder="Enter your cover letter here">{{ old('cover_letter', $application->cover_letter) }}</textarea>
                                    <div style="color: red">{{ $errors->first('cover_letter') }}</div>
                                </div>
                            </div>

                            {{-- File/Image --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="resume">Resume</label>
                                    <input type="file" class="form-control-file" id="resume" name="resume"
                                        accept=".pdf,.doc,.docx" value="{{ old('resume', $appliedJob->resume) }}">
                                    <div style="color: red">{{ $errors->first('resume') }}</div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
