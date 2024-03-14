@extends('backend.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                        <h1 class="m-0 text-dark">
                            Candidate lists Dashboard |
                            Registered Candidates ({{ $candidates->count() }})
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
                    <div class="col-md-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>SL</th>
                                            <th>Candidate Name</th>
                                            <th>Candidate Email</th>
                                            <th>Created Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidates as $candidate)
                                            <strong>
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $candidate->first_name }} {{ $candidate->last_name }}</td>
                                                    <td>{{ $candidate->email }}</td>
                                                    <td>{{ $candidate->created_at }}</td>

                                                </tr>
                                            </strong>
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
