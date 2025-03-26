<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>JobPath</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/user/imgs/Logo Dark.png') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user/css/main.css?v=1.0') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="assets/user/imgs/loading.gif" alt="JobPath" />
                </div>
            </div>
        </div>
    </div>


    @include('guest.layout.header')
    @yield('content')
    @include('guest.layout.footer')


    <!-- Bootstrap 5 & FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- End Footer -->
    <!-- Vendor JS -->
    <script src="{{ asset('assets/user/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/swiper-bundle.min.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('assets/user/js/main.js?v=1.0') }}"></script>


</body>

</html>
