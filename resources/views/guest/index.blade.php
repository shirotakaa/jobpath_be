@extends('guest.layout.main')
@section('content')
    <!-- Content -->
    <main class="main">
        <section class="section-box">
            <div class="banner-hero hero-1">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="block-banner">
                                <span
                                    class="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">JobPath</span>
                                <h1 class="heading-banner wow animate__animated animate__fadeInUp">{{ $hero->judul_hero }}
                                </h1>
                                <div class="banner-description mt-30 wow animate__animated animate__fadeInUp"
                                    data-wow-delay=".1s">
                                    {{ $hero->subtitle_hero }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="banner-imgs">
                                <div class="box-image-findjob findjob-homepage-2 wow animate__animated animate__fadeIn"
                                    style="z-index: -1; margin-left: -30px;">
                                    <figure style="width: 437px; height: 513px;">
                                        <img class="img-responsive shape-1" alt="JobPath"
                                            src="{{ $hero->background_image ? asset('storage/' . $hero->background_image) : asset('assets/admin/media/svg/blank-image.svg') }}"
                                            style="width: 100%; height: 100%; object-fit: cover;" />
                                    </figure>
                                </div>
                                <span class="union-icon"><img alt="JobPath" src="assets/user/imgs/banner/union.svg"
                                        class="img-responsive shape-3" /></span>
                                <span class="congratulation-icon"><img alt="JobPath"
                                        src="assets/user/imgs/banner/congratulation.svg"
                                        class="img-responsive shape-2" /></span>
                                <span class="docs-icon"><img alt="JobPath" src="assets/user/imgs/banner/docs.svg"
                                        class="img-responsive shape-2" /></span>
                                <span class="course-icon"><img alt="JobPath" src="assets/user/imgs/banner/course.svg"
                                        class="img-responsive shape-3" /></span>
                                <span class="web-dev-icon"><img alt="JobPath" src="assets/user/imgs/banner/web-dev.svg"
                                        class="img-responsive shape-3" /></span>
                                <span class="tick-icon"><img alt="JobPath" src="assets/user/imgs/banner/tick.svg"
                                        class="img-responsive shape-3" /></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-70">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-7">
                        <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Mitra Perusahaan</h2>
                        <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">Daftar perusahaan
                            yang telah bekerja sama dan membuka peluang bagi para alumni.</p>
                    </div>
                    <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <a href="{{ route('guest-list-perusahaan') }}"
                            class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Lihat
                            Semua</a>
                    </div>
                    <div class="row mt-70">
                        @foreach ($perusahaan as $item)
                            <div class="col-lg-3 col-md-6">
                                <div class="card-grid-2 card-employers hover-up wow animate__animated animate__fadeIn">
                                    <div class="text-center card-grid-2-image-rd">
                                        <a href="#">
                                            <figure style=" width: 110px ;height: 110px;">
                                                <img alt="JobPath"
                                                    src="{{ $item->logo ? asset($item->logo) : 'assets/user/imgs/employers/employer-default.png' }}"
                                                    class="w-100 h-100 object-fit-cover" />
                                            </figure>
                                        </a>
                                    </div>
                                    <div class="card-block-info">
                                        <div class="card-profile">
                                            <h5><a href="#"><strong>{{ $item->nama_perusahaan }}</strong></a></h5>
                                            <span class="text-sm">{{ $item->lokasi }}</span>
                                        </div>
                                        <div class="mt-15 d-flex flex-column align-items-center text-center">
                                        </div>
                                        <div class="card-2-bottom card-2-bottom-candidate">
                                            <div class="text-center mb-5">
                                                <a href="#" class="btn btn-border btn-brand-hover" data-bs-toggle="modal"
                                                    data-bs-target="#loginModal">
                                                    {{ $item->jumlah_lowongan }} Open
                                                    Jobs
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
        </section>
        <section class="section-box mt-40">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-7">
                        <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Jejak Alumni</h2>
                        <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">Mengikuti
                            Perjalanan dan Kesuksesan Alumni di Dunia Kerja</p>
                    </div>
                    <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <a href="{{ route('guest-jejak-alumni') }}"
                            class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Lihat
                            Semua</a>
                    </div>
                </div>
                <div class="row mt-70">
                    @foreach ($alumni as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="card-grid-2 hover-up">
                                <div class="text-center card-grid-2-image-rd">
                                    <a href="#">
                                        <figure style="width: 110px; height: 110px;">
                                            <img alt="{{ $item->nama }}" src="{{ asset('storage/' . $item->foto) }}"
                                                class="w-100 h-100 object-fit-cover" />
                                        </figure>
                                    </a>
                                </div>
                                <div class="card-block-info">
                                    <div class="card-profile">
                                        <a href="#"><strong>{{ $item->nama }}</strong></a>
                                        <span class="text-sm" style="color: #1f2938;">
                                            Sebagai alumni SMKN 4 Malang jurusan {{ $item->jurusan }}, saya bekerja sebagai
                                            {{ $item->pekerjaan }} di {{ $item->perusahaan }}.
                                        </span>
                                    </div>
                                    <div class="employers-info d-flex align-items-center justify-content-center mt-15">
                                        <span class="d-flex align-items-center"><i class="fi-rr-briefcase mr-5 ml-0"
                                                style="font-size: 16px;"></i>{{ $item->pekerjaan }}</span>
                                        <span class="d-flex align-items-center ml-25"><i class="fi-rr-briefcase mr-5"
                                                style="font-size: 16px;"></i>{{ $item->perusahaan }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>
    <!-- End Content -->

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


@endsection