@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ url('/dashboard/owner/blogs/list') }}" class="btn btn-primary float-right">
                                Back</li>
                            </a>
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
                            <h3 class="card-title">Edit Blog</h3>
                        </div>

                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- job title --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Blog Title</label>
                                    <input type="text" name="title" value="{{ old('title', $blog->title) }}"
                                        class="form-control" placeholder="Enter blog title">
                                    <div style="color: red">{{ $errors->first('title') }}</div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="content">Blog Content</label>
                                    <textarea type="text" name="content" id="" cols="30" rows="10" placeholder="Enter blog Content"
                                        class="form-control">{{ old('content', $blog->content) }}</textarea>
                                    <div style="color: red">{{ $errors->first('content') }}</div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="category_id">Blog Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Blog Category</option>
                                        <!-- Move this outside the loop -->
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $blog->category_id ? 'selected' : '' }}>
                                                {{ $category->cat_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div style="color: red">{{ $errors->first('category_id') }}</div>
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">Blog Images</label>


                                    <input type="file" name="image" class="form-control" placeholder="Upload Image">
                                    <br><br>
                                    <img src="{{ asset('/images/' . $blog->image) }}" alt="" srcset=""
                                        width="40">
                                    <div style="color: red">{{ $errors->first('image') }}</div>
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
