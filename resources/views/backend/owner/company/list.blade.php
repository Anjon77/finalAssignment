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
                                {{ ucfirst(Auth::user()->role) }} Dashboard |
                            @endif
                            Registered Company ({{ $companylists->count() }})
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
                    {{-- <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            <a href="{{ url('/dashboard/owner/category/create') }}" class="btn btn-primary float-right">
                               </li></a>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </div>

        @include('includes.messages')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 offset-3">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>SL</th>
                                            <th>Company Name</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <strong>
                                            @foreach ($companylists as $companylist)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ ucfirst($companylist->company_name) }}</td>
                                                    <td>{{ $companylist->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </strong>
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
