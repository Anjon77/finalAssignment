<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ url('/') }}" class="brand-link text-uppercase font-weight-bold text-center">
        <span class="brand-text font-weight-light">Job Pulse</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        @if (Auth::check() && Auth::user()->role == 'owner')
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ url('owner/dashboard') }}" class="d-block">
                        @if (Auth::check())
                            {{ Str::ucfirst(Auth::user()->role) }} Dashboard
                        @endif
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ route('blogs.list') }}" class="d-block">
                        Blogs
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ route('company-jobs-lists') }}" class="d-block">
                        Company Jobs
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ route('category.list') }}" class="d-block">
                        Category List
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="{{ route('owner.dashboard.company-lists') }}" class="d-block">
                        All Company
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ route('plugins.list') }}" class="d-block">
                        Plugins
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="{{ route('owner.dashboard.candidate.list') }}" class="d-block">
                        All Candidate
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="{{ route('ownerDashboardPages') }}" class="d-block">
                        All Pages
                    </a>
                </div>
            </div>
        @elseif(Auth::check() && Auth::user()->role == 'company')
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ route('company.dashboard') }}" class="d-block">

                        {{ ucfirst(Auth::user()->role) }} Dashboard
                        {{-- {{ auth()->user()->company_name }} --}}

                    </a>
                </div>
            </div>



            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ route('companyJobs.list') }}" class="d-block">
                        All Jobs
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ url('dashboard/company/category/list') }}" class="d-block">
                        Category
                    </a>
                </div>
            </div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <a href="{{ route('blogs') }}" class="d-block">
                        Blogs
                    </a>
                </div>
            </div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    {{-- <a href="{{ url('dashboard/company/profile') }}" class="d-block">Profile Settings</a> --}}

                    <a href="{{ route('profile.edit') }}">Profile</a>
                </div>
            </div>
        @elseif(Auth::check() && Auth::user()->role == 'candidate')
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ url('/candidate/dashboard') }}" class="d-block">
                        {{ ucfirst(Auth::user()->role) }} Dashboard
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ url('/jobs') }}" class="d-block">
                        All Jobs
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">

                    <a href="{{ route('applicationsJobs.list') }}" class="d-block">
                        Applied Jobs
                    </a>
                </div>
            </div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    {{-- <a href="{{ url('/candidate/dashboard/profile') }}" class="d-block">
                        Profile
                    </a> --}}
                    {{-- <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link> --}}
                    <a href="{{ route('profile.edit') }}">Profile</a>
                </div>
            </div>

        @endif





    </div>

</aside>
