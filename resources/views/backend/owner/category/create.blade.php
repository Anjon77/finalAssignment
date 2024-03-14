@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('category.list') }}" class="btn btn-primary float-right">
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
                            <h3 class="card-title">Create Form</h3>
                        </div>

                        <form action="{{ url('/owner/dashboard/category/store') }}" method="post" role="form">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="cat_name">Category Name</label>
                                    <input type="text" name="cat_name" value="{{ old('cat_name') }}" class="form-control"
                                        placeholder="Enter Category Name">
                                    <div style="color: red">{{ $errors->first('cat_name') }}</div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
