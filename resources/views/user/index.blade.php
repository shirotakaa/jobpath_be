@extends('user.layout.main')
@section('content')

    <!-- Content -->
    <main class="main">
        <section class="section-box">
            <div class="banner-hero hero-1">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="block-banner">
                                <span class="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">JobPath</span>
                                <h1 class="heading-banner wow animate__animated animate__fadeInUp">{{ $hero->judul_hero }}</h1>
                                <div class="banner-description mt-30 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                    {{ $hero->subtitle_hero }}
                                </div>
                                <div class="form-find mt-60 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                    <form>
                                        <input type="text" class="form-input input-keysearch mr-10"
                                            placeholder="Job title, Company... " />
                                        <!-- <input type="text" class="form-input input-keysearch mr-10" placeholder="City, Postcode... " /> -->
                                        <select class="form-input mr-10 select-active">
                                            <option value="">Pilih Kategori</option>
                                            <option value="IT">Design</option>
                                            <option value="Finance">Marketing</option>
                                            <option value="Marketing">Technology</option>
                                            <option value="Design">Engineering</option>
                                            <option value="Lainnya">Finance</option>
                                        </select>

                                        <button class="btn btn-default btn-find">Temukan</button>
                                    </form>
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
                    {{-- <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp"
                    data-wow-delay=".2s">
                    <a href="company-list.html" class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Lihat
                        Semua</a>
                </div> --}}
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
                                            <a href="#" class="btn btn-border btn-brand-hover"
                                                data-bs-toggle="modal" data-bs-target="#loginModal">
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
                        <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Kategori Lowongan</h2>
                        <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">
                            Pilih Kategori Pekerjaan yang Sesuai dengan Keahlian dan Minat Anda
                        </p>
                    </div>
                    <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                        <a href="job-grid.html" class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Lihat Semua</a>
                    </div>
                </div>
                <div class="row mt-70">
                    @foreach ($kategoriPekerjaan as $kategori)
                        <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".{{ $loop->index * 1 }}s">
                                <div class="text-center">
                                    <a href="job-grid.html" class="d-inline-block">
                                        <figure class="rounded-circle overflow-hidden d-flex align-items-center justify-content-center m-0" style="width: 85px; height: 85px;">
                                            @php
                                                // Ubah nama kategori menjadi lowercase dan ganti spasi dengan "-"
                                                $iconName = strtolower(str_replace(' ', '-', $kategori['nama']));
                                            @endphp
                                            <img src="assets/user/imgs/icons/{{ $iconName }}.svg" alt="{{ $kategori['nama'] }}" class="w-100 h-100 object-fit-cover"/>
                                        </figure>
                                    </a>
                                </div>
                                <h5 class="text-center mt-20">
                                    <a href="job-grid.html">{{ $kategori['nama'] }}</a>
                                </h5>
                                <p class="text-center text-stroke-40 mt-20">{{ $kategori['jumlah'] }} Lowongan Tersedia</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="text-center mt-15">
                                <h3>{{ $kategoriPekerjaan->sum('jumlah') }}+</h3>
                            </div>
                            <p class="text-center mt-30 text-stroke-40">Pekerjaan menunggu Anda</p>
                            <div class="text-center mt-30">
                                <div class="box-button-shadow">
                                    <a href="job-grid.html" class="btn btn-default">Jelajahi lebih lanjut</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-box mt-40">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-4">
                        <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Lowongan Pekerjaan</h2>
                        <p class="text-md-lh28 color-black-5wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Cari peluang kerja sesuai keahlian.</p>
                    </div>
                    <div class="col-lg-8 text-xl-end text-start">
                        <ul class="nav nav-right float-xl-end float-start" role="tablist">
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".1s"><button id="nav-tab-one-1" data-bs-toggle="tab" data-bs-target="#tab-one-1" type="button" role="tab" aria-controls="tab-one-1" aria-selected="true" class="active">Technology</button></li>
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".2s"><button id="nav-tab-two-1" data-bs-toggle="tab" data-bs-target="#tab-two-1" type="button" role="tab" aria-controls="tab-two-1" aria-selected="false">Marketing</button></li>
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".3s"><button id="nav-tab-three-1" data-bs-toggle="tab" data-bs-target="#tab-three-1" type="button" role="tab" aria-controls="tab-three-1" aria-selected="false">Design</button></li>
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".4s"><button id="nav-tab-four-1" data-bs-toggle="tab" data-bs-target="#tab-four-1" type="button" role="tab" aria-controls="tab-four-1" aria-selected="false">Engineering</button></li>
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".5s"><button id="nav-tab-five-1" data-bs-toggle="tab" data-bs-target="#tab-five-1" type="button" role="tab" aria-controls="tab-five-1" aria-selected="false">Finance</button></li>
                            <li class="wow animate__animated animate__fadeIn" data-wow-delay=".6s">
                                <a href="job-grid.html">
                                    <button id="nav-tab-six-1" type="button">Lainnya</button>
                                </a>
                            </li>                            
                        </ul>
                    </div>
                </div>
                <div class="mt-70">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Supervisor, Strategy Partime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Bertanggung jawab dalam merancang dan mengelola strategi bisnis perusahaan. Memastikan implementasi strategi berjalan efektif untuk mencapai target yang ditetapkan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux2.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Copywriter - Fallon MN</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Menulis dan mengembangkan konten kreatif untuk mendukung strategi pemasaran. Memastikan setiap tulisan menarik, persuasif, dan sesuai dengan identitas brand.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux3.svg" class="w-100 h-100 object-fit-cover"/></span> <span>UI
                                                            / UX Designerfulltime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Merancang pengalaman pengguna yang intuitif dan efisien. Memastikan desain antarmuka nyaman dan mudah digunakan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux4.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Associate Director Experience Design</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux5.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Freelance Associate Director</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux6.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Data Architecture Manager</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengelola arsitektur data perusahaan untuk memastikan integrasi, keamanan, dan efisiensi sistem. Mengembangkan strategi pengelolaan data guna mendukung kebutuhan bisnis dan analisis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Supervisor, Strategy Partime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Bertanggung jawab dalam merancang dan mengelola strategi bisnis perusahaan. Memastikan implementasi strategi berjalan efektif untuk mencapai target yang ditetapkan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux2.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Copywriter - Fallon MN</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Menulis dan mengembangkan konten kreatif untuk mendukung strategi pemasaran. Memastikan setiap tulisan menarik, persuasif, dan sesuai dengan identitas brand.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux3.svg" class="w-100 h-100 object-fit-cover"/></span> <span>UI
                                                            / UX Designerfulltime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Merancang pengalaman pengguna yang intuitif dan efisien. Memastikan desain antarmuka nyaman dan mudah digunakan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux4.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Associate Director Experience Design</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux5.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Freelance Associate Director</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux6.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Data Architecture Manager</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengelola arsitektur data perusahaan untuk memastikan integrasi, keamanan, dan efisiensi sistem. Mengembangkan strategi pengelolaan data guna mendukung kebutuhan bisnis dan analisis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Supervisor, Strategy Partime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Bertanggung jawab dalam merancang dan mengelola strategi bisnis perusahaan. Memastikan implementasi strategi berjalan efektif untuk mencapai target yang ditetapkan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux2.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Copywriter - Fallon MN</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Menulis dan mengembangkan konten kreatif untuk mendukung strategi pemasaran. Memastikan setiap tulisan menarik, persuasif, dan sesuai dengan identitas brand.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux3.svg" class="w-100 h-100 object-fit-cover"/></span> <span>UI
                                                            / UX Designerfulltime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Merancang pengalaman pengguna yang intuitif dan efisien. Memastikan desain antarmuka nyaman dan mudah digunakan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux4.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Associate Director Experience Design</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux5.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Freelance Associate Director</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux6.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Data Architecture Manager</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengelola arsitektur data perusahaan untuk memastikan integrasi, keamanan, dan efisiensi sistem. Mengembangkan strategi pengelolaan data guna mendukung kebutuhan bisnis dan analisis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-four-1" role="tabpanel" aria-labelledby="tab-four-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Supervisor, Strategy Partime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Bertanggung jawab dalam merancang dan mengelola strategi bisnis perusahaan. Memastikan implementasi strategi berjalan efektif untuk mencapai target yang ditetapkan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux2.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Copywriter - Fallon MN</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Menulis dan mengembangkan konten kreatif untuk mendukung strategi pemasaran. Memastikan setiap tulisan menarik, persuasif, dan sesuai dengan identitas brand.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux3.svg" class="w-100 h-100 object-fit-cover"/></span> <span>UI
                                                            / UX Designerfulltime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Merancang pengalaman pengguna yang intuitif dan efisien. Memastikan desain antarmuka nyaman dan mudah digunakan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux4.svg" class="w-100 h-100 object-fit-cover" /></span>
                                                        <span>Associate Director Experience Design</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux5.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Freelance Associate Director</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux6.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Data Architecture Manager</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengelola arsitektur data perusahaan untuk memastikan integrasi, keamanan, dan efisiensi sistem. Mengembangkan strategi pengelolaan data guna mendukung kebutuhan bisnis dan analisis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-five-1" role="tabpanel" aria-labelledby="tab-five-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Supervisor, Strategy Partime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Bertanggung jawab dalam merancang dan mengelola strategi bisnis perusahaan. Memastikan implementasi strategi berjalan efektif untuk mencapai target yang ditetapkan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux2.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Copywriter - Fallon MN</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Menulis dan mengembangkan konten kreatif untuk mendukung strategi pemasaran. Memastikan setiap tulisan menarik, persuasif, dan sesuai dengan identitas brand.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux3.svg" class="w-100 h-100 object-fit-cover"/></span> <span>UI
                                                            / UX Designerfulltime</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Merancang pengalaman pengguna yang intuitif dan efisien. Memastikan desain antarmuka nyaman dan mudah digunakan.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux4.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Associate Director Experience Design</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux5.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Freelance Associate Director</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengawasi operasional dan strategi bisnis untuk memastikan pencapaian target perusahaan. Berkoordinasi dengan tim eksekutif dalam pengambilan keputusan strategis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                        data-wow-delay=".s">
                                        <div class="card-block-info">
                                            <div class="row">
                                                <div class="col-lg-12 col-12"
                                                    style="display: flex; justify-content: space-between; gap: 16px;">
                                                    <a href="job-detail.html"
                                                        class="card-2-img-text card-grid-2-img-medium">
                                                        <span class="card-grid-2-img-small"><img alt="JobPath"
                                                                src="assets/user/imgs/job/ui-ux6.svg" class="w-100 h-100 object-fit-cover"/></span>
                                                        <span>Data Architecture Manager</span>
                                                    </a>
                                                    <div class="text-end pt-5">
                                                        <span class="text-gray-100 text-md"><i
                                                                class="fi-rr-bookmark"></i></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-15" style="display: flex; gap: 24px;">
                                                <a href="company-detail.html"><span
                                                        class="text-brand-10 text-icon-first">Amanda</span></a>
                                                <span class="text-mutted-2" style="font-size: 12px;"><i
                                                        class="fi-rr-marker" style="font-size: 12px;"></i>
                                                    Wisconsin</span>
                                            </div>

                                            <div class="text-small mt-15">
                                                Mengelola arsitektur data perusahaan untuk memastikan integrasi, keamanan, dan efisiensi sistem. Mengembangkan strategi pengelolaan data guna mendukung kebutuhan bisnis dan analisis.
                                            </div>

                                            <div class="card-2-bottom mt-30">
                                                <div class="row">
                                                    <div class="col-lg-6 col-4">
                                                        <span class="card-text-price"> $500<span>/Hour</span> </span>
                                                    </div>
                                                    <div class="col-lg-6 col-8 text-end">
                                                        <a href="job-detail.html"><span class="text-brand-10">Lamar
                                                                Sekarang</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                            <img alt="{{ $item->nama }}" src="{{ asset('storage/' . $item->foto) }}" class="w-100 h-100 object-fit-cover" />
                                        </figure>
                                    </a>
                                </div>
                                <div class="card-block-info">
                                    <div class="card-profile">
                                        <a href="#"><strong>{{ $item->nama }}</strong></a>
                                        <span class="text-sm" style="color: #1f2938;">
                                            Sebagai alumni SMKN 4 Malang jurusan {{ $item->jurusan }}, saya bekerja sebagai {{ $item->pekerjaan }} di {{ $item->perusahaan }}.
                                        </span>
                                    </div>
                                    <div class="employers-info d-flex align-items-center justify-content-center mt-15">
                                        <span class="d-flex align-items-center"><i class="fi-rr-briefcase mr-5 ml-0" style="font-size: 16px;"></i>{{ $item->pekerjaan }}</span>
                                        <span class="d-flex align-items-center ml-25"><i class="fi-rr-briefcase mr-5" style="font-size: 16px;"></i>{{ $item->perusahaan }}</span>
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
@endsection
