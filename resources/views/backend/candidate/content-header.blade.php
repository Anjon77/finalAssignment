<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h2 class="m-0 text-dark">
                    @if (Auth::check())
                        {{ ucfirst(Auth::user()->role) }} {{ ucfirst(Auth::user()->first_name) }} Dashboard
                    @endif
                </h2>
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
                    <li class="mr-3 ">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-responsive-nav-link>
                            {{-- <a href="{{ route('logout') }}">Logout</a> --}}
                        </form>
                    </li>


                </ol>
            </div>
        </div>
    </div>
</div>
