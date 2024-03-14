<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    @if (Auth::check())
                        {{ ucfirst(Auth::user()->role) }} Dashboard
                    @endif
                </h1>
            </div>
            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">
                    <li class="mr-3">
                        <a href="#">
                            @if (Auth::check())
                                {{ ucfirst(Auth::user()->first_name) }}
                            @endif
                        </a>
                    </li>
                    <li class="mr-3">
                        {{-- <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-responsive-nav-link> --}}

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Logut') }}
                            </x-responsive-nav-link>
                        </form>
                    </li>


                </ol>


            </div>
        </div>
    </div>
</div>
