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
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="assets/user/imgs/loading.gif" alt="JobPath" />
                </div>
            </div>
        </div>
    </div>
    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo">
                        <a href="{{ route('guest.index') }}" class="d-flex" style="width: 138px; height: 43px;">
                            <img alt="JobPath" src="{{ Storage::url($identitas->logo_dark) }}"
                                style="width: 100%; height: 100%; object-fit: cover;" />
                        </a>
                    </div>
                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <li>
                                    <a class="active" href="{{ route('guest-perusahaan') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('guest-faq-perusahaan') }}">FAQ</a>
                                </li>
                            </ul>
                        </nav>
                        
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <div class="block-signin">
                        <a href="{{ route('login-perusahaan') }}" class="btn btn-default btn-shadow ml-40 hover-up">Login</a>
                        <a href="{{ route('login-perusahaan') }}" class="btn btn-default btn-shadow ml-10 hover-up">Add Job Now</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="user-account">
                    {{-- <img src="assets/user/imgs/avatar/ava_1.png" alt="JobPath" class="w-100 h-100 object-fit-cover"/>
                    <div class="content">
                        <h6 class="user-name">Howdy</h6>
                        <p class="font-xs text-muted">howdy@gmail.com</p>
                    </div> --}}
                </div>
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-menu-wrap mobile-header-border">
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="has-children">
                                    <a class="active" href="{{ route('guest-perusahaan') }}">Home</a>
                                </li>
                                <li class="has-children">
                                    <a href="{{ route('guest-faq-perusahaan') }}">FAQ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="block-signin mt-3 d-flex align-items-center mobile-wrap">
                        <a href="{{ route('login-perusahaan') }}" class="btn btn-default btn-shadow me-2 hover-up btn-login-mobile">Login</a>
                        <a href="{{ route('login-perusahaan') }}" class="btn btn-default btn-shadow hover-up">Add Job Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End header-->
    <!-- Content -->
    <main class="main">
        <section class="section-box">
            <div class="container pt-50">
                <div class="w-50 w-md-100 mx-auto text-center">
                    <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">FAQs</h1>
                    <p class="mb-30 text-muted wow animate__animated animate__fadeInUp font-md">Cek pertanyaan yang sering diajukan di sini sebelum menghubungi kami. Berikut beberapa masalah umum yang mungkin Anda temui saat menggunakan sistem kami.</p>
                </div>
            </div>
        </section>

        <div class="faqs-imgs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row">
                            <div class="col-lg-7">
                                <img class="faqs-1 wow animate__animated animate__fadeIn" data-wow-delay=".1s" src="assets/user/imgs/page/faqs/img-1.png" alt="">
                            </div>
                            <div class="col-lg-5">
                                <img class="faqs-2 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".3s" src="assets/user/imgs/page/faqs/img-2.png" alt="">
                                <img class="faqs-3 wow animate__animated animate__fadeIn" data-wow-delay=".5s" src="assets/user/imgs/page/faqs/img-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-80">
            <div class="container">
                <div class="row align-items-end mb-50">
                    <div class="col-lg-5">
                        <span class="text-blue wow animate__animated animate__fadeInUp">Questions</span>
                        <h3 class="mt-20 wow animate__animated animate__fadeInUp">Frequently Ask Questions</h3>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <p class="text-lg text-muted wow animate__animated animate__fadeInUp">
                            Temukan jawaban atas pertanyaan yang sering diajukan mengenai layanan kami.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Bagaimana cara perusahaan mendaftar dan memasang lowongan pekerjaan di JobPath?
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p class="mb-15">
                                            Perusahaan dapat mendaftar dengan membuat akun di JobPath. Setelah akun diverifikasi, perusahaan bisa langsung memasang lowongan pekerjaan dengan mengisi detail posisi yang dibutuhkan, kualifikasi, dan informasi lainnya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Bagaimana cara perusahaan meninjau lamaran yang masuk?
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Perusahaan dapat melihat semua lamaran yang masuk melalui dashboard. Setiap lamaran dilengkapi dengan CV dan data pelamar untuk memudahkan proses seleksi.
                                    </div>
                                </div>
                            </div>
                    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Apakah ada biaya untuk memasang lowongan pekerjaan?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        JobPath menyediakan opsi gratis dan berbayar untuk memasang lowongan. Opsi berbayar memberikan fitur tambahan seperti peningkatan visibilitas, akses ke database kandidat, dan promosi lowongan.
                                    </div>
                                </div>
                            </div>
                    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        Apakah perusahaan bisa menghubungi pelamar langsung?
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Ya, setelah meninjau lamaran, perusahaan dapat menghubungi pelamar langsung melalui email atau nomor telepon yang disediakan di profil mereka.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="accordionFlushExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne2">
                                        Bagaimana jika perusahaan ingin menghapus atau mengedit lowongan yang telah dipasang?
                                    </button>
                                </h2>
                                <div id="flush-collapseOne2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        <p class="mb-15">
                                            Perusahaan bisa mengelola lowongan yang telah dipasang melalui dashboard akun mereka. Lowongan dapat diperbarui, diperpanjang, atau dihapus kapan saja sesuai kebutuhan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree2" aria-expanded="false" aria-controls="flush-collapseThree2">
                                        Bagaimana cara perusahaan meninjau lamaran yang masuk?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree2" class="accordion-collapse collapse" aria-labelledby="flush-headingThree2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        Perusahaan dapat melihat semua lamaran yang masuk melalui dashboard. Setiap lamaran dilengkapi dengan CV dan data pelamar untuk memudahkan proses seleksi.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree2" aria-expanded="false" aria-controls="flush-collapseThree2">
                                        Apakah perusahaan dapat mengatur jadwal wawancara melalui platform ini?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree2" class="accordion-collapse collapse" aria-labelledby="flush-headingThree2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        Ya, JobPath memiliki fitur penjadwalan wawancara yang memungkinkan perusahaan untuk mengirim undangan wawancara dan mengelola jadwal langsung dari dashboard mereka.
                                    </div>
                                </div>
                            </div>
                    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour2" aria-expanded="false" aria-controls="flush-collapseFour2">
                                        Apa keuntungan bagi perusahaan yang menggunakan JobPath?
                                    </button>
                                </h2>
                                <div id="flush-collapseFour2" class="accordion-collapse collapse show" aria-labelledby="flush-headingFour2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        <p class="mb-15">
                                            JobPath membantu perusahaan dalam proses rekrutmen dengan mempermudah posting lowongan pekerjaan serta menjangkau kandidat yang sesuai dari suatu lembaga pendididkan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>       
    </main>
    <!-- End Content -->
    <!-- Footer -->
    <footer class="footer mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12" >
                    <a href="index.html" >
                        <img alt="JobPath" src="assets/user/imgs/logo-dark.png" style="width: 134px; height: 43px; object-fit: cover;"/>
                    </a>
                    <div class="mt-20 mb-20" style="width: 70%;">Temukan peluang kerja terbaik untuk masa depan Anda. Bangun karier yang sesuai dengan minat dan keahlian Anda.</div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <h6>Navigasi</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Daftar Pekerjaan</a></li>
                        <li><a href="#">Daftar Perusahaan</a></li>
                        <li><a href="#">Jejak Alumni</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-xs-6">
                    <h6>Informasi</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">Landing Page Perusahaan</a></li>
                        <li><a href="#">Form Alumni</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-xs-6">
                    <h6>Bantuan</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Pusat Bantuan</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                        <li><a href="#">Panduan Pengguna</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-xs-6">
                    <h6>Legal</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">Hak Cipta</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat Penggunaan</a></li>
                        <li><a href="#">Laporan Masalah</a></li>
                    </ul>
                </div>
                
                
            </div>
            <div class="footer-bottom mt-50">
                <div class="row">
                    <div class="col-md-6" style="width: 100%;">
                        <div class="footer-social text-center">
                            <a href="#" class="icon-socials icon-facebook"></a>
                            <a href="#" class="icon-socials icon-twitter"></a>
                            <a href="#" class="icon-socials icon-instagram"></a>
                            <a href="#" class="icon-socials icon-linkedin"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Vendor JS-->
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