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
    <link rel="shortcut icon" type="image/x-icon" href="assets/user/imgs/Logo Dark.png" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/user/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/user/css/main.css?v=1.0" />
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
    <section class="section-box">
        <div class="container">
            <div class="col-md-6 d-flex align-items-center w-100">
                <div class="form-section text-center">
                    <a href="company-landing.html">
                        <div class="logo">
                            <img src="assets/user/imgs/logo-dark.png" alt="Crextio Logo" style="width: 100%;">
                        </div>
                    </a>
                    <div class="modal-title w-100 fw-bold mb-4 fs-2">
                        Login
                    </div>
                    <form method="POST" action="{{ route('login-perusahaan.submit') }}">

                        @csrf
                        <div class="mb-3">
                            <input name="email" type="email" class="form-control input-custom"
                                placeholder="Masukkan NIS, Email, atau Nomor Telepon">
                        </div>
                        <div class="mb-3 position-relative">
                            <input name="password" type="password" class="form-control input-custom" placeholder="Password">
                            <span class="toggle-password">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>                            
                        </div>
                        <button type="submit" class="btn btn-default w-100 mt-3">Log in</button>
                    </form>

                    @if ($errors->any())
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            Swal.fire({
                                title: "Login Gagal!",
                                html: "{!! implode('<br>', $errors->all()) !!}",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-danger"
                                }
                            });
                        </script>
                    @endif
                    <div class="text-center mt-3">
                        <span>Belum punya akun? <a href="{{ route('register-perusahaan') }}"
                                class="text-primary fw-semibold">Daftar di sini</a></span>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block p-0">
                    <img src="assets/user/imgs/login-bg.jpg" alt="Login Image"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>
    <script src="assets/user/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/user/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/user/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/user/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/user/js/plugins/waypoints.js"></script>
    <script src="assets/user/js/plugins/wow.js"></script>
    <script src="assets/user/js/plugins/magnific-popup.js"></script>
    <script src="assets/user/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/user/js/plugins/select2.min.js"></script>
    <script src="assets/user/js/plugins/isotope.js"></script>
    <script src="assets/user/js/plugins/scrollup.js"></script>
    <script src="assets/user/js/plugins/swiper-bundle.min.js"></script>
    <!-- Template  JS -->
    <script src="assets/user/js/main.js?v=1.0"></script>
</body>

</html>