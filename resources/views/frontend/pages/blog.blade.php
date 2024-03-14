@extends('frontend.layouts.app')
<!-- resources/views/frontend/pages/blog.html -->
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Our Blog</h3>

        </div>
    </div>
    <!-- Header End -->

    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Our blogs</span>
                </p>
                <h1 class="mb-4">Our Blogs</h1>
            </div>

            <div class="row pb-3">
                @foreach ($blogs as $blog)
                    <div class="col-lg-3 mb-4">
                        <div class="card border-0 shadow-sm mb-2">
                            <img class="card-img-top mb-2" src="{{ asset('/images/' . $blog->image) }}" alt="" />

                            <div class="card-body bg-light text-center p-4">
                                <h4 class="">{{ $blog->title }}</h4>
                                <div class="d-flex justify-content-center mb-3">

                                    <small class="mr-3"><i class="fa fa-user text-primary"></i>
                                        {{ ucfirst($blog->user->first_name) }}
                                    </small>


                                    <small class="mr-3"><i class="fa fa-folder text-primary"> </i>
                                        {{ $blog->category ? $blog->category->cat_name : 'No Category' }}</small>
                                </div>
                                <p>
                                    {{ $blog_content_limit[$blog->id] }}...
                                </p>
                                <a href="{{ url('blogs/show', $blog->id) }}" class="btn btn-primary px-4 mx-auto my-2">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                {{ $blogs->links() }}
            </div>

        </div>
    </div>
    <!-- Blog End -->
@endsection
