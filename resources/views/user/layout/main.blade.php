<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>JobPath</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="JobPath" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="{{ asset('assets/user/imgs/Logo Dark.png') }}" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/user/imgs/Logo Dark.png') }}" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/user/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/user/css/main.css?v=1.0') }}" />

    <!-- FontAwesome & CKEditor -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />
</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('assets/user/imgs/loading.gif') }}" alt="JobPath" />
                </div>
            </div>
        </div>
    </div>

    @include('user.layout.header')

    @yield('content')

    @include('user.layout.footer')

    <!-- JS Libraries (jQuery + Bootstrap only once) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vendor JS -->
    <script src="{{ asset('assets/user/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/user/js/plugins/leaflet.js') }}"></script>

    <!-- Template JS -->
    <script src="{{ asset('assets/user/js/main.js?v=1.0') }}"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('scripts')

</body>
</html>
