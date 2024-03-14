@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Job</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ url('/dashboard/company/category/list') }}" class="btn btn-primary float-right">
                                Back</li></a>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-md-8 offset-2">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Form</h3>
                        </div>

                        <form action="{{ route('companyJobs.update', $job->id) }}" method="post" role="form">
                            @csrf
                            @method('PUT')
                            {{-- job title --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" name="job_title" value="{{ old('job_title', $job->job_title) }}"
                                        class="form-control" placeholder="Enter Job title">
                                    <div style="color: red">{{ $errors->first('job_title') }}</div>
                                </div>
                            </div>


                            <!-- Job Category -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">Job Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Job Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $job->category_id ? 'selected' : '' }}>
                                                {{ $category->cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div style="color: red">{{ $errors->first('category_id') }}</div>
                                </div>
                            </div>

                            {{-- deadline --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="deadline">Job Deadline</label>
                                    <input type="date" name="deadline" value="{{ old('deadline', $job->deadline) }}"
                                        class="form-control" placeholder="Enter Job deadline Name">
                                    <div style="color: red">{{ $errors->first('deadline') }}</div>
                                </div>
                            </div>


                            {{-- job company name --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="company_name">Job Company Name</label>
                                    <input type="text" name="company_name"
                                        value="{{ old('company_name', $job->company_name) }}" class="form-control"
                                        placeholder="Enter Job Comapany Name">
                                    <div style="color: red">{{ $errors->first('company_name') }}</div>
                                </div>
                            </div>

                            {{-- Job Type --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="job_type">Job Type</label>
                                    <select name="job_type" class="form-control">
                                        <option value="">Select Job Type</option>
                                        <option value="full_time" {{ $job->job_type == 'full_time' ? 'selected' : '' }}>
                                            Full-time</option>
                                        <option value="part_time" {{ $job->job_type == 'part_time' ? 'selected' : '' }}>
                                            Part-time</option>
                                        <option value="internship" {{ $job->job_type == 'internship' ? 'selected' : '' }}>
                                            Internship</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <div style="color: red">{{ $errors->first('job_type') }}</div>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select Job Status</option>
                                        <option value="Active" {{ $job->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="Inactive" {{ $job->status == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <div style="color: red">{{ $errors->first('status') }}</div>
                                </div>
                            </div>

                            {{-- Experience --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <select name="experience" class="form-control">
                                        <option value="">Select Job Experience</option>
                                        <option value="Below_1_year"
                                            {{ $job->experience == 'Below_1_year' ? 'selected' : '' }}>Below 1 year
                                        </option>
                                        <option value="Above_1_year"
                                            {{ $job->experience == 'Above_1_year' ? 'selected' : '' }}>Above 1 year
                                        </option>
                                        <option value="2_years" {{ $job->experience == '2_years' ? 'selected' : '' }}>2
                                            years</option>
                                        <option value="Above_2_years"
                                            {{ $job->experience == 'Above_2_years' ? 'selected' : '' }}>Above 2 years
                                        </option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <div style="color: red">{{ $errors->first('experience') }}</div>
                                </div>
                            </div>


                            {{-- job type --}}
                            {{-- <div class="card-body">
                                <div class="form-group">
                                    <label for="job_type">Job Type</label>
                                    <select name="job_type" class="form-control">
                                        <option value="">Select Job Type</option>
                                        <option value="full_time" {{ old('job_type') == 'full_time' ? 'selected' : '' }}>
                                            Full-time</option>
                                        <option value="part_time" {{ old('job_type') == 'part_time' ? 'selected' : '' }}>
                                            Part-time</option>
                                        <option value="internship" {{ old('job_type') == 'internship' ? 'selected' : '' }}>
                                            Internship</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <div style="color: red">{{ $errors->first('job_type') }}</div>
                                </div>
                            </div> --}}
                            {{-- //Status --}}
                            {{-- <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="">Select Job Status</option>
                                        <option value="Active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="Inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                    <div style="color: red">{{ $errors->first('status') }}</div>
                                </div>
                            </div> --}}
                            {{-- // Experience --}}
                            {{-- <div class="card-body">
                                <div class="form-group">
                                    <label for="experience">Status</label>
                                    <select name="experience" class="form-control">
                                        <option value="">Select Job Experience</option>
                                        <option value="Below_1_year"
                                            {{ old('experience') == 'Below_1_year' ? 'selected' : '' }}> Below 1 year
                                        </option>
                                        <option value="Above_1_year"
                                            {{ old('experience') == 'Above_1_year' ? 'selected' : '' }}> Above 1 year
                                        </option>
                                        <option value="2_years" {{ old('experience') == '2_years' ? 'selected' : '' }}>
                                            2 years</option>

                                        <option value="Above_2_years"
                                            {{ old('experience') == 'Above_2_years' ? 'selected' : '' }}> Above 2 years
                                        </option>


                                    </select>
                                    <div style="color: red">{{ $errors->first('experience') }}</div>
                                </div>
                            </div> --}}
                            {{-- Location --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="location">Job Location</label>
                                    <input type="text" name="location" value="{{ old('location', $job->location) }}"
                                        class="form-control" placeholder="Enter Job location Name">
                                    <div style="color: red">{{ $errors->first('location') }}</div>
                                </div>
                            </div>

                            {{-- Job Description --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="job_description">Job Description</label>
                                    <input type="text" name="job_description"
                                        value="{{ old('job_description', $job->job_description) }}" class="form-control"
                                        placeholder="Enter Job description Name">
                                    <div style="color: red">{{ $errors->first('job_description') }}</div>
                                </div>
                            </div>

                            {{-- // Job Qualification --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="qualification">Job qualification</label>
                                    <input type="text" name="qualification"
                                        value="{{ old('qualification', $job->qualification) }}" class="form-control"
                                        placeholder="Enter Job qualification Name">
                                    <div style="color: red">{{ $errors->first('qualification') }}</div>
                                </div>
                            </div>

                            {{-- //Vacancy --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="vacancy">Job vacancy</label>
                                    <input type="number" name="vacancy" value="{{ old('vacancy', $job->vacancy) }}"
                                        class="form-control" placeholder="Enter Job vacancy Name">
                                    <div style="color: red">{{ $errors->first('vacancy') }}</div>
                                </div>
                            </div>

                            {{-- //Salary --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="salary">Job salary</label>
                                    <input type="text" name="salary" value="{{ old('salary', $job->salary) }}"
                                        class="form-control" placeholder="Enter Job salary Name">
                                    <div style="color: red">{{ $errors->first('salary') }}</div>
                                </div>
                            </div>


                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
