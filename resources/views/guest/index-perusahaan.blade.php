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
                                    {{ $perusahaanContent->subtitle_perusahaan ?? 'Jelajahi berbagai peran pekerjaan menarik berdasarkan minat dan jurusan studimu. Pekerjaan impianmu menunggumu.' }}
                                </div>
                                <div class="mt-60">
                                    <div class="box-button-shadow mr-10">
                                        <a href="{{ route('login-perusahaan') }}" class="btn btn-default">Add Job Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="banner-imgs" style="height: 462px;">
                                <img
                                    alt="JobPath"
                                    src="{{ $perusahaanContent->asset_1 ? asset('storage/' . $perusahaanContent->asset_1) : asset('assets/user/imgs/banner/banner-img.png') }}"
                                    class="img-responsive main-banner shape-3"
                                    width="100%"
                                    height="100%"
                                    style="object-fit: cover;"
                                />
                                <span class="banner-sm-1" style="height: 108px; display: block;">
                                    <img
                                      alt="JobPath"
                                      src="assets/user/imgs/banner/banner-sm-1.png"
                                      class="img-responsive shape-1"
                                      width="100%"
                                      height="100%"
                                      style="object-fit: cover;"
                                    />
                                  </span>
                                <span class="banner-sm-2" style="height: 140px; display: block;">
                                    <img
                                        alt="JobPath"
                                        src="{{ $perusahaanContent->asset_2 ? asset('storage/' . $perusahaanContent->asset_2) : asset('assets/user/imgs/banner/banner-sm-1.png') }}"
                                        class="img-responsive shape-1"
                                        width="100%"
                                        height="100%"
                                        style="object-fit: cover;"
                                    />
                                </span>
                                <span class="banner-sm-3" style="height: 194px; display: block;">
                                    <img
                                        alt="JobPath"
                                        src="{{ $perusahaanContent->asset_3 ? asset('storage/' . $perusahaanContent->asset_3) : asset('assets/user/imgs/banner/banner-sm-3.png') }}"
                                        class="img-responsive shape-2"
                                        width="100%"
                                        height="100%"
                                        style="object-fit: cover;"
                                    />
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
        <section class="section-box mt-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-11 mx-auto">
                        <div class="row pt-5">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                                <div class="card-grid-4 hover-up">
                                    <div class="image-top-feature d-inline-block">
                                        <figure class="w-100 h-100 m-0">
                                          <img src="assets/user/imgs/icons/digital-marketing.svg" alt="JobPath" class="w-100 h-100 object-fit-cover">
                                        </figure>
                                      </div>
                                      
                                    <div class="card-grid-4-info">
                                        <h5 class="mt-20">Daftarkan Perusahaan Anda</h5>
                                        <p class="text-normal mt-15 mb-20">Buat akun untuk mulai memposting lowongan dan menemukan kandidat terbaik.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="card-grid-4 hover-up">
                                    <div class="image-top-feature">
                                        <figure class="w-100 h-100 m-0"><img alt="JobPath" src="assets/user/imgs/icons/seo-backlink.svg" class="w-100 h-100 object-fit-cover"/></figure>
                                    </div>
                                    <div class="card-grid-4-info">
                                        <h5 class="mt-20">Posting Lowongan Kerja</h5>
                                        <p class="text-normal mt-15 mb-20">Buat lowongan pekerjaan dan jangkau kandidat terbaik dengan mudah.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                                <div class="card-grid-4 hover-up">
                                    <div class="image-top-feature">
                                        <figure class="w-100 h-100 m-0"><img alt="JobPath" src="assets/user/imgs/icons/market-research.svg" class="w-100 h-100 object-fit-cover"/></figure>
                                    </div>
                                    <div class="card-grid-4-info">
                                        <h5 class="mt-20">Seleksi Kandidat</h5>
                                        <p class="text-normal mt-15 mb-20">Pilih kandidat berkualitas sesuai dengan kebutuhan perusahaan Anda.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-md-30">
                                <div class="card-grid-4 hover-up">
                                    <div class="image-top-feature">
                                        <figure class="w-100 h-100 m-0"><img alt="JobPath" src="assets/user/imgs/icons/creative-layout.svg" class="w-100 h-100 object-fit-cover"/></figure>
                                    </div>
                                    <div class="card-grid-4-info">
                                        <h5 class="mt-20">Hubungi & Rekrut Kandidat</h5>
                                        <p class="text-normal mt-15 mb-20">Hubungi kandidat pilihan dan mulai proses perekrutan dengan cepat.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-50 mb-70 bg-patern">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="content-job-inner">
                            <h2 class="section-title heading-lg wow animate__animated animate__fadeInUp">Rekrut Talenta Terbaik dengan Mudah</h2>
                            <div class="mt-40 pr-50 text-md-lh28 wow animate__animated animate__fadeInUp">Pasang lowongan gratis, jangkau lebih banyak kandidat, dan temukan talenta terbaik untuk bisnis Anda. Kelola rekrutmen lebih efisien dengan sistem yang praktis dan terstruktur.</div>
                            <div class="mt-40">
                                <div class="box-button-shadow wow animate__animated animate__fadeInUp"><a href="{{ route('register-perusahaan') }}" class="btn btn-default">Daftar Sekarang</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="box-image-job">
                            <figure class=" wow animate__animated animate__fadeIn">
                                <img alt="JobPath" src="{{ $perusahaanContent->asset_2 ? asset('storage/' . $perusahaanContent->asset_2) : asset('assets/user/imgs/banner/banner-sm-1.png') }}"/>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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