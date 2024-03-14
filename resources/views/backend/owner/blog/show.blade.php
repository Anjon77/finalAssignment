@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0 text-dark">
                            {{-- @if (Auth::check())
                                {{ ucfirst(Auth::user()->role) }} Job Dashboard
                            @endif --}}

                            Details
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
                                        {{ __('Logout') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <a href="{{ route('blogs.list') }}" class="btn btn-primary float-right">
                                Back</a>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm ml-2"
                                role="button">Edit</a>
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
                        <div class="col-lg-8">
                            <div class="d-flex flex-column text-left mb-3">
                                <h3 class="section-title pr-5">
                                    <span class="pr-2"> Title: {{ ucfirst($blog->title) }} Details </span>
                                    <hr>
                                </h3>
                                <h1 class="mb-3"></h1>
                                <div class="d-flex">
                                    <p class="mr-3"><i class="fa fa-user text-primary"></i>
                                        @if (Auth::check())
                                            User: {{ ucfirst(Auth::user()->first_name) }}
                                        @endif

                                    </p>
                                    <p class="mr-3">
                                        <i class="fa fa-folder text-primary"></i> Category : {{ $blog->category->cat_name }}
                                    </p>

                                </div>
                            </div>
                            <div class="mb-5">

                                <img class="img-fluid rounded  mb-4" src="{{ asset('/images/' . $blog->image) }}"
                                    alt="Image" width="300" />
                                <p>{{ $blog->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
