@extends('frontend.layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">About Us</h3>

        </div>
    </div>
    <!-- Header End -->
    {{-- {{ route('search') }} --}}
    <div class="row">
        <div class="container bg-white mb-5 mt-5 ">
            <form action="{{ route('search') }}" method="GET">
                @csrf
                <div class="input-group">
                    <input type="search" name="query" class="form-control rounded" placeholder="Search here..."
                        aria-label="Search" aria-describedby="search-addon" style="padding:10px" />
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Search</button>
                </div>
            </form>
        </div>
    </div>

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12">
                    <p class="section-title pr-5">
                        <span class="pr-2">Learn About Mission</span>
                    </p>
                    <h1 class="mb-4">Our Mission</h1>
                    <p>
                        Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
                        dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
                        Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor
                        Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
                        dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
                        Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor
                        Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
                        dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
                        Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor
                    </p>
                    <div class="row pt-2 pb-4">
                        <div class="col-8 col-md-2">
                            <img class="img-fluid rounded" src="img/about-2.jpg" alt="" />
                        </div>
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Labore eos amet
                                    dolor amet diam
                                </li>
                                <li class="py-2 border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Etsea et sit
                                    dolor amet ipsum
                                </li>
                                <li class="py-2 border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Diam dolor diam
                                    elitripsum vero.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row align-items-center">

                <div class="col-lg-12">
                    <p class="section-title pr-5">
                        <span class="pr-2">Learn About Vission</span>
                    </p>
                    <h1 class="mb-4">Our Vission</h1>
                    <p>
                        Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
                        dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
                        Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor
                        Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
                        dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
                        Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor
                        Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
                        dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
                        Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor
                    </p>
                    <div class="row pt-2 pb-4">
                        <div class="col-8 col-md-2">
                            <img class="img-fluid rounded" src="img/about-2.jpg" alt="" />
                        </div>
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Labore eos amet
                                    dolor amet diam
                                </li>
                                <li class="py-2 border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Etsea et sit
                                    dolor amet ipsum
                                </li>
                                <li class="py-2 border-bottom">
                                    <i class="fa fa-check text-primary mr-3"></i>Diam dolor diam
                                    elitripsum vero.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- to company partnar-->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Our Top Company Partners</span>
                </p>
                <h1 class="mb-4">Top Companies</h1>
            </div>
            <div class="row pb-3">
                @foreach ($topCompanies as $topCompany)
                    <div class="col-lg-3 mb-4">
                        <div class="card text-white bg-info mb-3">

                            <div class="card-body ">
                                <h3 class="card-title mb-0">{{ $topCompany->company_name }}</h3>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- categories --}}

    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Our Category</span>
                </p>
                <h1 class="mb-4">Categories</h1>
            </div>
            <div class="row">
                @foreach ($categories as $item)
                    <div class="col-lg-3 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 15px">

                            <div class="pl-4">
                                <h4> {{ $item->cat_name }}</h4>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Plugins</span>
                </p>
                <h1 class="mb-4">Plugins</h1>
            </div>
            <div class="row">
                @foreach ($plugins as $item)
                    <div class="col-lg-3 col-md-6 pb-1">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 15px">
                            <div class="pl-4">
                                <h4> {{ $item->plugin_title }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
