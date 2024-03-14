@extends('frontend.layouts.app')
<!-- resources/views/frontend/pages/blog.html -->
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Blog Details</h3>

        </div>
    </div>
    <!-- Header End -->

    <!-- Detail Start -->
    <div class="container py-5">
        <div class="row pt-5">
            <div class="col-lg-12">
                <div class="d-flex flex-column text-left mb-3">
                    <p class="section-title pr-5">
                        <span class="pr-2">Blog Detail Page</span>
                    </p>
                    <h1 class="mb-3">{{ $blog->title }}</h1>
                    <div class="d-flex">
                        <p class="mr-3"><i class="fa fa-user text-primary"></i>
                            {{ ucfirst($blog->user->first_name) }}
                        </p>
                        <p class="mr-3">
                            <i class="fa fa-folder text-primary"> </i> {{ $blog->category->cat_name }}
                        </p>

                    </div>
                </div>
                <div class="mb-5">
                    <img class="card-img-top mb-2" src="{{ asset('/images/' . $blog->image) }}" alt="" />
                    <p>
                        {{ $blog->content }}
                    </p>
                </div>

                <a href="{{ route('home') }}" class="btn btn-primary px-4 mx-auto my-2">Back Home page</a>
                <a href="{{ route('blogs') }}" class="btn btn-primary px-4 mx-auto my-2">Back Blog page</a>

            </div>

        </div>
    </div>
    <!-- Detail End -->
@endsection
