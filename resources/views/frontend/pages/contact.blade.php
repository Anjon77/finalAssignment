@extends('frontend.layouts.app')

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Contact Us</h3>

        </div>
    </div>
    <!-- Header End -->
    {{-- {{ route('search') }} --}}
    <div class="container bg-white mb-5 mt-5">
        <form action="{{ route('search') }}" method="GET">
            @csrf
            <div class="input-group">
                <input type="search" name="query" class="form-control rounded" placeholder="Search here..."
                    aria-label="Search" aria-describedby="search-addon" style="padding:10px" />
                <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Search</button>
            </div>
        </form>
    </div>
    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Get In Touch</span>
                </p>
                <h1 class="mb-4">Contact Us For Any Query</h1>
            </div>
            <div class="row">
                <div class="col-lg-7 mb-5">
                    <div class="contact-form">
                        <div id="success"></div>

                        <form action="{{ url('send-email-to-owner') }}" method="post" id="contactForm"
                            novalidate="novalidate">
                            @csrf

                            <div class="control-group">
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Your Name" required="required"
                                    data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Your Email" required="required"
                                    data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" name="subject" class="form-control" id="subject"
                                    placeholder="Subject" required="required"
                                    data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" name="message" rows="6" id="message" placeholder="Message" required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                {{-- <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">
                                    Send Message
                                </button> --}}
                                <a class="btn btn-primary py-2 px-4" type="submit" href="">Send Message</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-5">

                    <div class="d-flex">
                        <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Address</h5>
                            <p>Chunarughat, Habiganj, 3320</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Email</h5>
                            <p>akd.chandana@gmail.com</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Phone</h5>
                            <p>+880 1712 774371</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle"
                            style="width: 45px; height: 45px"></i>
                        <div class="pl-3">
                            <h5>Opening Hours</h5>
                            <strong>Sunday - Friday:</strong>
                            <p class="m-0">08:00 AM - 05:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
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
