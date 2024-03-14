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
                                {{ ucfirst(Auth::user()->role) }} Plugin Dashboard
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
                            <a href="{{ route('plugins.create') }}" class="btn btn-primary float-right">
                                Create Plugin</li></a>
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
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="width: 10px">SL</th>
                                            <th>Image</th>
                                            <th>Plugin Title</th>
                                            <th>Category</th>
                                            <th>Content</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($plugins as $plugin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('/images/' . $plugin->image) }}" alt=""
                                                        srcset="" width="40"> </td>
                                                <td>{{ $plugin->plugin_title }}</td>
                                                <td>{{ $plugin->category ? $plugin->category->cat_name : 'No Category' }}
                                                </td>
                                                <td>{{ $plugin->plugin_content }}</td>
                                                <td>{{ $plugin->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('plugins.show', $plugin->id) }}"
                                                        class="btn btn-primary btn-sm" role="button">Show</a>

                                                    <a href="{{ route('plugins.edit', $plugin->id) }}"
                                                        class="btn btn-primary btn-sm" role="button">Edit</a>

                                                    <form method="POST"
                                                        action="{{ route('plugins.delete', $plugin->id) }}}"
                                                        class="d-inline-block"
                                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            role="button">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                {{-- {{ $blogs->links() }} --}}
                            </div>

                        </div>
                        <!-- /.card -->


                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
