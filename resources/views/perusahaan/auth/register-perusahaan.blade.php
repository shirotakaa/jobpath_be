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
                        Daftar
                    </div>
                    <form action="{{ route('perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input name="nama_perusahaan" type="text" class="form-control input-custom"
                                placeholder="Nama Perusahaan" required>
                        </div>
                        <div class="mb-3">
                            <input name="jenis_perusahaan" type="text" class="form-control input-custom"
                                placeholder="Jenis Perusahaan" required>
                        </div>
                        <div class="mb-3">
                            <input name="email" type="email" class="form-control input-custom" placeholder="Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <input name="nomor_telepon" type="tel" class="form-control input-custom"
                                placeholder="Nomor Telepon" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="alamat" class="form-control input-custom" placeholder="Alamat" rows="3"
                                required></textarea>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="logoUpload" class="form-label fs-6">Upload logo perusahaan</label>
                            <input name="logo" type="file" class="form-control input-custom" id="logoUpload"
                                accept="image/*">
                        </div>
                        <div class="mb-3 position-relative">
                            <input name="password" type="password" class="form-control input-custom"
                                placeholder="Password" required>
                            <span class="toggle-password">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="mb-3 position-relative">
                            <input name="password_confirmation" type="password" class="form-control input-custom"
                                placeholder="Konfirmasi Password" required>
                            <span class="toggle-password">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        <button type="submit" class="btn btn-default w-100 mt-3">Daftar</button>

                        {{-- <!-- OR Separator -->
                        <div class="d-flex align-items-center my-3">
                            <hr class="flex-grow-1">
                            <span class="mx-2">OR</span>
                            <hr class="flex-grow-1">
                        </div>

                        <!-- Google Button -->

                        <button type="button"
                            class="btn btn-border w-100 d-flex align-items-center justify-content-center">
                            <img src="assets/user/imgs/google-icon.png" alt="Google Icon"
                                style="width: 20px; height: 20px;" class="me-2">
                            Continue with Google
                        </button> --}}

                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Sudah punya akun -->
                    <div class="text-center mt-3">
                        <span>Sudah punya akun? <a href="{{ route('login-perusahaan') }}" class="text-primary fw-semibold">Masuk di
                                sini</a></span>
                    </div>

                </div>
                <div class="col-md-6 d-none d-md-block p-0">
                    <img src="assets/user/imgs/login-bg.jpg" alt="Login Image"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- SweetAlert for success and error messages -->
    @if(session('success'))
        <script>
            Swal.fire({
                text: "{{ session('success') }}",
                icon: "success",
                buttonsStyling: false,
                showConfirmButton: true,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login-perusahaan') }}";
                }
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                text: "{{ session('error') }}",
                icon: "error",
                buttonsStyling: false,
                showConfirmButton: true,
                confirmButtonText: "OK",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger"
                }
            });
        </script>
    @endif
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