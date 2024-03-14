@extends('frontend.layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">

        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Seach Result</h3>
        </div>



    </div>
    <div class="container ">
        <div class="row align-items-center">
            <div class="col-lg-12">

                {{-- {{ route('search') }} --}}
                <div class="container bg-white mb-5 mt-5">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <input type="search" name="query" class="form-control rounded" placeholder="Search here..."
                                aria-label="Search" aria-describedby="search-addon" style="padding:10px" />
                            <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Search</button>
                        </div>
                    </form>
                </div>

                <h1>Search Results for : "{{ $query }}"</h1>
                <hr>

                @switch(true)
                    @case($jobs->isNotEmpty())
                        <ul>
                            @foreach ($jobs as $job)
                                <li>{{ $job->job_title }} </li>
                                <li>{{ $job->company_name }} </li>

                                <!-- Display more job details as needed -->
                            @endforeach
                        </ul>
                    @break

                    @case($blogs->isNotEmpty())
                        <ul>
                            @foreach ($blogs as $blog)
                                <h3> Title: {{ $blog->title }}</h3>
                                <h4>Category: {{ $blog->category->cat_name }}</h4>

                                <!-- Display more blog details as needed -->
                            @endforeach
                        </ul>
                    @break

                    @case($categories->isNotEmpty())
                        <ul>
                            @foreach ($categories as $category)
                                <li>{{ $category->cat_name }}</li>
                                <!-- Display more category details as needed -->
                            @endforeach
                        </ul>
                    @break

                    @default
                        <h4>No data found.</h4>
                @endswitch

            </div>
        </div>
    </div>
@endsection
