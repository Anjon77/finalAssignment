@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Plugin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('blogs.list') }}" class="btn btn-primary float-right">
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
                            <h3 class="card-title">Create Plugin</h3>
                        </div>

                        <form action="{{ route('plugins.store') }}" method="post" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- title --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="plugin_title">Plugin Title</label>
                                    <input type="text" name="plugin_title" value="{{ old('plugin_title') }}"
                                        class="form-control" placeholder="Enter Plugin title">
                                    <div style="color: red">{{ $errors->first('plugin_title') }}</div>
                                </div>
                            </div>

                            {{-- content --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="plugin_content"> Content</label>
                                    <textarea type="text" name="plugin_content" id="" rows="10" placeholder="Enter Plugin Content"
                                        class="form-control">{{ old('plugin_content') }}</textarea>
                                    <div style="color: red">{{ $errors->first('plugin_content') }}</div>
                                </div>
                            </div>

                            {{-- category --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">Plugin Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Plugin Category</option>
                                        <!-- Move this outside the loop -->
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                        @endforeach
                                    </select>
                                    <div style="color: red">{{ $errors->first('category_id') }}</div>
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">Plugin Images</label>
                                    <input type="file" name="image" class="form-control" placeholder="Upload Image"
                                        value="{{ old('image') }}">
                                    <div style="color: red">{{ $errors->first('image') }}</div>
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
