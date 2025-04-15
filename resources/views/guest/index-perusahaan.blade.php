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
    <!-- Preloader -->
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

    <!-- Banner -->
    <main class="main">
        <section class="section-box bg-banner-about">
            <div class="banner-hero banner-about pt-20">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="block-banner">
                                <h1 class="heading-banner heading-lg">
                                    {{ $perusahaanContent->judul_perusahaan ?? 'Temukan peluang kerja terbaik bersama JobPath!' }}
                                </h1>
                                <div class="banner-description mt-30">
                                    {{ $perusahaanContent->subtitle_perusahaan ?? 'Jelajahi berbagai peran pekerjaan menarik berdasarkan minat dan jurusan studimu.' }}
                                </div>
                                <div class="mt-60">
                                    <a href="{{ route('login-perusahaan') }}" class="btn btn-default">Tambah
                                        Pekerjaan</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="banner-imgs" style="height: 462px;">
                                <img src="{{ $perusahaanContent->asset_1 ? asset('storage/' . $perusahaanContent->asset_1) : asset('assets/user/imgs/banner/banner-img.png') }}"
                                    class="img-responsive main-banner shape-3" alt="JobPath" width="100%" height="100%"
                                    style="object-fit: cover;" />
                                <span class="banner-sm-2" style="height: 140px;">
                                    <img src="{{ $perusahaanContent->asset_2 ? asset('storage/' . $perusahaanContent->asset_2) : asset('assets/user/imgs/banner/banner-sm-1.png') }}"
                                        class="img-responsive shape-1" style="object-fit: cover;" />
                                </span>
                                <span class="banner-sm-3" style="height: 194px;">
                                    <img src="{{ $perusahaanContent->asset_3 ? asset('storage/' . $perusahaanContent->asset_3) : asset('assets/user/imgs/banner/banner-sm-3.png') }}"
                                        class="img-responsive shape-2" style="object-fit: cover;" />
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Fitur Utama -->
        <section class="section-box mt-90">
            <div class="container">
                <div class="row pt-5">
                    @php
                        $features = [
                            ['icon' => 'digital-marketing.svg', 'title' => 'Daftarkan Perusahaan Anda', 'desc' => 'Buat akun untuk mulai memposting lowongan.'],
                            ['icon' => 'seo-backlink.svg', 'title' => 'Posting Lowongan Kerja', 'desc' => 'Buat lowongan dan jangkau kandidat terbaik.'],
                            ['icon' => 'market-research.svg', 'title' => 'Seleksi Kandidat', 'desc' => 'Pilih kandidat berkualitas sesuai kebutuhan.'],
                            ['icon' => 'creative-layout.svg', 'title' => 'Hubungi & Rekrut', 'desc' => 'Hubungi dan rekrut kandidat pilihan Anda.']
                        ];
                    @endphp

                    @foreach ($features as $f)
                        <div class="col-lg-3 col-md-6 mb-md-30">
                            <div class="card-grid-4 hover-up h-100">
                                <div class="image-top-feature">
                                    <figure class="w-100 h-100 m-0">
                                        <img src="assets/user/imgs/icons/{{ $f['icon'] }}"
                                            class="w-100 h-100 object-fit-cover" alt="Icon" />
                                    </figure>
                                </div>
                                <div class="card-grid-4-info">
                                    <h5 class="mt-20">{{ $f['title'] }}</h5>
                                    <p class="text-normal mt-15 mb-20">{{ $f['desc'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA Daftar -->
        <section class="section-box mt-50 mb-70 bg-patern">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-job-inner">
                            <h2 class="section-title heading-lg wow animate__animated animate__fadeInUp">
                                Rekrut Talenta Terbaik dengan Mudah
                            </h2>
                            <div class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp">
                                Pasang lowongan gratis, jangkau lebih banyak kandidat, dan kelola rekrutmen lebih
                                efisien.
                            </div>
                            <div class="mt-40">
                                <a href="{{ route('register-perusahaan') }}" class="btn btn-default">Daftar Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-image-job">
                            <figure class=" wow animate__animated animate__fadeIn">
                                <img src="{{ $perusahaanContent->asset_2 ? asset('storage/' . $perusahaanContent->asset_2) : asset('assets/user/imgs/banner/banner-sm-1.png') }}"
                                    alt="JobPath" />
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="{{ route('guest.index') }}">
                        <img src="{{ Storage::url($identitas->logo_dark) }}"
                            style="width: 134px; height: 43px; object-fit: cover;" alt="JobPath" />
                    </a>
                    <p class="mt-20 mb-20">Temukan peluang kerja terbaik untuk masa depan Anda.</p>
                </div>
                @php
                    $menus = [
                        'Navigasi' => ['Home', 'Daftar Pekerjaan', 'Daftar Perusahaan', 'Jejak Alumni'],
                        'Informasi' => ['Landing Page Perusahaan', 'Form Alumni'],
                        'Bantuan' => ['FAQ', 'Pusat Bantuan', 'Hubungi Kami', 'Panduan Pengguna'],
                        'Legal' => ['Hak Cipta', 'Kebijakan Privasi', 'Syarat Penggunaan', 'Laporan Masalah']
                    ];
                @endphp

                @foreach ($menus as $section => $items)
                    <div class="col-md-2 col-xs-6">
                        <h6>{{ $section }}</h6>
                        <ul class="menu-footer mt-40">
                            @foreach ($items as $item)
                                <li><a href="#">{{ $item }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
            <div class="footer-bottom mt-50 text-center">
                <div class="footer-social">
                    <a href="#" class="icon-socials icon-facebook"></a>
                    <a href="#" class="icon-socials icon-twitter"></a>
                    <a href="#" class="icon-socials icon-instagram"></a>
                    <a href="#" class="icon-socials icon-linkedin"></a>
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
    <script src="assets/user/js/main.js?v=1.0"></script
</body>

</html>