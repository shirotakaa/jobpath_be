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
    
    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true"
        data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4" style="max-width: 100%; width: 100%;">
                <div class="modal-header border-0">
                    <div class="modal-title w-100 text-center fw-bold" style="font-size: 34px;" id="loginModalLabel">
                        Login
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <p class="text-center text-muted" style="margin-bottom: 16px;">Login dan dapatkan akses ke semua fitur
                    JobPath</p>
                <div class="modal-body">
                    <form action="{{ route('login-siswa') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="nis" class="form-control input-custom"
                                placeholder="Masukkan NIS, Email, atau Nomor Telepon">
                        </div>
                        <div class="mb-3 position-relative">
                            <input type="password" name="password" class="form-control input-custom"
                                placeholder="Password*">
                            <span class="toggle-password">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <a href="#" class="text-primary">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-default w-100 mt-3">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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

    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('login_error'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: '{{ session('login_error') }}',
                    confirmButtonColor: '#3085d6',
                    backdrop: true,
                    allowOutsideClick: false
                });
            });
        </script>
    @endif

    @if (session('login_success'))
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: 'Anda akan diarahkan ke halaman utama',
                    confirmButtonColor: '#3085d6',
                    backdrop: true,
                    allowOutsideClick: false
                }).then(() => {
                    window.location.href = "{{ route('user.index') }}";
                });
            });
        </script>
    @endif


</body>

</html>
