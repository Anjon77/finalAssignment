<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.header_css')
</head>

<body>
    @include('frontend.layouts.navbar')
    @yield('content')
    @include('frontend.layouts.footer')
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>
    @include('frontend.layouts.footer_js')
</body>

</html>
