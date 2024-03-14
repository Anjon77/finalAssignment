@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            Pages Dashboard
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
                                        {{ __('Log Out') }}
                                    </x-responsive-nav-link>
                                </form>
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>

        @include('includes.messages')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="container pb-3">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 pb-1">
                            <div class="d-flex bg-yellow shadow-sm border-top rounded mb-4" style="padding: 15px">
                                <div class="pl-4">
                                    <h4><a href="{{ route('home') }}">Home</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 pb-1">
                            <div class="d-flex bg-yellow  shadow-sm border-top rounded mb-4" style="padding: 15px">
                                <div class="pl-4">
                                    <h4><a href="{{ route('about') }}">About</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 pb-1">
                            <div class="d-flex bg-yellow  shadow-sm border-top rounded mb-4" style="padding: 15px">
                                <div class="pl-4">
                                    <h4><a href="{{ route('contact') }}">Contact</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 pb-1">
                            <div class="d-flex bg-yellow  shadow-sm border-top rounded mb-4" style="padding: 15px">
                                <div class="pl-4">
                                    <h4><a href="{{ route('blogs') }}">Blogs</a></h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 pb-1">
                            <div class="d-flex bg-yellow  shadow-sm border-top rounded mb-4" style="padding: 15px">
                                <div class="pl-4">
                                    <h4><a href="{{ route('jobs') }}">Jobs</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
