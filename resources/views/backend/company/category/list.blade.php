@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0 text-dark">
                            @if (Auth::check())
                                {{ ucfirst(Auth::user()->role) }} Category Dashboard
                            @endif
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
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <a href="{{ url('/dashboard/company/category/create') }}" class="btn btn-primary float-right">
                                Create Category</li></a>
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
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">SL</th>
                                            <th>ID</th>
                                            <th>Category Name</th>
                                            <th>Created Category By Owner/Company</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->cat_name }}</td>

                                                <td>{{ auth()->user()->company_name }}</td>

                                                <td>{{ $category->created_at }}</td>
                                                <td>
                                                    <a href="{{ url('/dashboard/company/category/edit/' . $category->id) }}"
                                                        class="btn btn-primary">Edit</a>


                                                    <form method="POST"
                                                        action="{{ url('/dashboard/company/category/delete/' . $category->id) }}}"
                                                        class="d-inline-block"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger ">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.card -->


                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
