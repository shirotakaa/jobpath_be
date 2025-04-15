<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Metadata dasar -->
    <meta charset="utf-8" />
    <title>JobPath</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Metadata Open Graph untuk preview saat dibagikan ke media sosial -->
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <!-- Favicon website -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/user/imgs/Logo Dark.png" />

    <!-- Link CSS eksternal -->
    <link rel="stylesheet" href="assets/user/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="assets/user/css/main.css?v=1.0" />
</head>

<body>
    <!-- Preloader (animasi loading saat halaman dibuka) -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="assets/user/imgs/loading.gif" alt="JobPath" />
                </div>
            </div>
        </div>
    </div>

    <!-- Header utama -->
    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <!-- Logo Website -->
                    <div class="header-logo">
                        <a href="{{ route('guest.index') }}" class="d-flex" style="width: 138px; height: 43px;">
                            <img alt="JobPath" src="{{ Storage::url($identitas->logo_dark) }}"
                                style="width: 100%; height: 100%; object-fit: cover;" />
                        </a>
                    </div>

                    <!-- Navigasi utama desktop -->
                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <li><a class="active" href="{{ route('guest-perusahaan') }}">Home</a></li>
                                <li><a href="{{ route('guest-faq-perusahaan') }}">FAQ</a></li>
                            </ul>
                        </nav>

                        <!-- Ikon burger untuk mobile -->
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>

                <!-- Tombol Login dan Add Job -->
                <div class="header-right">
                    <div class="block-signin">
                        <a href="{{ route('login-perusahaan') }}" class="btn btn-default btn-shadow ml-40 hover-up">Login</a>
                        <a href="{{ route('login-perusahaan') }}" class="btn btn-default btn-shadow ml-10 hover-up">Tambah Pekerjaan</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Header versi mobile (tampil ketika layar kecil) -->
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <!-- Ikon burger close -->
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>

            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <!-- Menu navigasi versi mobile -->
                    <div class="mobile-menu-wrap mobile-header-border">
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="has-children"><a class="active" href="{{ route('guest-perusahaan') }}">Home</a></li>
                                <li class="has-children"><a href="{{ route('guest-faq-perusahaan') }}">FAQ</a></li>
                            </ul>
                        </nav>
                    </div>

                    <!-- Tombol login untuk mobile -->
                    <div class="block-signin mt-3 d-flex align-items-center mobile-wrap">
                        <a href="{{ route('login-perusahaan') }}" class="btn btn-default btn-shadow me-2 hover-up btn-login-mobile">Login</a>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten utama -->
    <main class="main">
        <!-- Judul FAQ -->
        <section class="section-box">
            <div class="container pt-50">
                <div class="w-50 w-md-100 mx-auto text-center">
                    <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">FAQs</h1>
                    <p class="mb-30 text-muted wow animate__animated animate__fadeInUp font-md">
                        Cek pertanyaan yang sering diajukan di sini sebelum menghubungi kami.
                    </p>
                </div>
            </div>
        </section>

        <!-- Gambar tambahan di halaman FAQ -->
        <div class="faqs-imgs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row">
                            <div class="col-lg-7 fag-image-large mb-30 hide-on-mobile" style="padding-right: 20px">
                                <img class="faqs-1 wow animate__animated animate__fadeIn img-full-cover" data-wow-delay=".1s"
                                    src="{{ asset($faqContent) && $faqContent->asset_1 ? asset('storage/' . $faqContent->asset_1) : asset('assets/admin/media/svg/blank.svg') }}"
                                    alt="FAQ Image 1">
                            </div>
                            <div class="col-lg-5">
                                <div class="faq-image-small custom-margin-faq">
                                    <img class="faqs-2 mb-15 wow animate__animated animate__fadeIn img-full-cover" data-wow-delay=".3s"
                                    src="{{ asset($faqContent) && $faqContent->asset_2 ? asset('storage/' . $faqContent->asset_2) : asset('assets/admin/media/svg/blank.svg') }}"
                                    alt="FAQ Image 2">
                                </div>
                                <div class="faq-image-small hide-on-mobile">
                                    <img class="faqs-3 wow animate__animated animate__fadeIn img-full-cover" data-wow-delay=".5s"
                                    src="{{ asset($faqContent) && $faqContent->asset_3 ? asset('storage/' . $faqContent->asset_3) : asset('assets/admin/media/svg/blank.svg') }}"
                                    alt="FAQ Image 3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Accordion FAQ -->
        <section class="mt-80">
            <div class="container">
                <!-- Header teks FAQ -->
                <div class="row align-items-end mb-50">
                    <div class="col-lg-5">
                        <span class="text-blue wow animate__animated animate__fadeInUp">Questions</span>
                        <h3 class="mt-20 wow animate__animated animate__fadeInUp">Frequently Asked Questions</h3>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <p class="text-lg text-muted wow animate__animated animate__fadeInUp">
                            Temukan jawaban atas pertanyaan yang sering diajukan mengenai layanan kami.
                        </p>
                    </div>
                </div>

                <!-- Konten pertanyaan dan jawaban -->
                <div class="row">
                    {{-- Membagi FAQ menjadi 2 kolom --}}
                    @foreach ($faqs->chunk(ceil($faqs->count() / 2)) as $faqChunk)
                        <div class="col-lg-6">
                            <div class="accordion accordion-flush" id="accordionFlushExample{{ $loop->index }}">
                                @foreach ($faqChunk as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $loop->parent->index }}{{ $loop->index }}">
                                            <button class="accordion-button collapsed faq-mobile" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $loop->parent->index }}{{ $loop->index }}"
                                                aria-expanded="false"
                                                aria-controls="collapse{{ $loop->parent->index }}{{ $loop->index }}">
                                                {{ $faq->pertanyaan }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $loop->parent->index }}{{ $loop->index }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $loop->parent->index }}{{ $loop->index }}"
                                            data-bs-parent="#accordionFlushExample{{ $loop->parent->index }}">
                                            <div class="accordion-body">
                                                <p class="mb-15">{{ $faq->jawaban }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Website -->
    <footer class="footer mt-50">
        <div class="container">
            <div class="row">
                <!-- Kolom logo dan deskripsi -->
                <div class="col-md-4 col-sm-12">
                    <a href="index.html">
                        <img alt="JobPath" src="{{ Storage::url($identitas->logo_dark) }}"
                            style="width: 134px; height: 43px; object-fit: cover;" />
                    </a>
                    <div class="mt-20 mb-20" style="width: 70%;">
                        Temukan peluang kerja terbaik untuk masa depan Anda.
                    </div>
                </div>

                <!-- Navigasi footer -->
                <div class="col-md-2 col-xs-6">
                    <h6>Navigasi</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Daftar Pekerjaan</a></li>
                        <li><a href="#">Daftar Perusahaan</a></li>
                        <li><a href="#">Jejak Alumni</a></li>
                    </ul>
                </div>

                <!-- Informasi tambahan -->
                <div class="col-md-2 col-xs-6">
                    <h6>Informasi</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">Landing Page Perusahaan</a></li>
                        <li><a href="#">Form Alumni</a></li>
                    </ul>
                </div>

                <!-- Bantuan dan legalitas -->
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

            <!-- Sosial media -->
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

    <!-- JavaScript Vendor dan Plugin -->
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

    <!-- JavaScript Utama Template -->
    <script src="assets/user/js/main.js?v=1.0"></script>
</body>

</html>
