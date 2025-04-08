@extends('perusahaan.layout.main')
@section('content')

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
                                        <a href="{{ route('company.addjob') }}" class="btn btn-default">Add Job Now</a>
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
                            {{-- <div class="mt-40">
                                <div class="box-button-shadow wow animate__animated animate__fadeInUp"><a href="#" class="btn btn-default">Daftar Sekarang</a></div>
                            </div> --}}
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

@endsection 