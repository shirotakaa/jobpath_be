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
                                <span
                                    class="text-small-primary text-small-primary--disk text-uppercase wow animate__animated animate__fadeInUp">JobPath</span>
                                <h1 class="heading-banner wow animate__animated animate__fadeInUp">{{ $hero->judul_hero }}
                                </h1>
                                <div class="banner-description mt-30 wow animate__animated animate__fadeInUp"
                                    data-wow-delay=".1s">
                                    {{ $hero->subtitle_hero }}
                                </div>
                                <div class="form-find mt-60 wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                                    <form method="GET" action="{{ route('daftar-pekerjaan') }}">
                                        <input type="text" name="query" class="form-input input-keysearch mr-10"
                                            placeholder="Job title, Company..." />
                                        <select name="kategori" class="form-input mr-10 select-active">
                                            <option value="">Pilih Kategori</option>
                                            <option value="Design">Design</option>
                                            <option value="Marketing">Marketing</option>
                                            <option value="Technology">Technology</option>
                                            <option value="Engineering">Engineering</option>
                                            <option value="Finance">Finance</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <button type="submit" class="btn btn-default btn-find">Temukan</button>
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
                    <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <a href="{{ route('perusahaan') }}"
                            class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Lihat
                            Semua</a>
                    </div>
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
                        <h2 class="section-title mb-20 wow animate__animated animate__fadeInUp">Kategori Lowongan</h2>
                        <p class="text-md-lh28 color-black-5 wow animate__animated animate__fadeInUp">
                            Pilih Kategori Pekerjaan yang Sesuai dengan Keahlian dan Minat Anda
                        </p>
                    </div>
                    <div class="col-lg-5 text-lg-end text-start wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <a href="{{ route('daftar-pekerjaan') }}" class="mt-sm-15 mt-lg-30 btn btn-border icon-chevron-right">Lihat Semua</a>
                    </div>
                </div>
                <div class="row mt-70">
                    @php
                        $kategoriUtama = $kategoriPekerjaan->filter(fn($kategori) => strtolower($kategori['nama']) !== 'lainnya');
                        $kategoriLainnya = $kategoriPekerjaan->firstWhere('nama', 'Lainnya');
                    @endphp

                    @foreach ($kategoriUtama as $kategori)
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp"
                                            data-wow-delay=".{{ $loop->index * 1 }}s" onclick="searchByCategory('{{ $kategori['nama'] }}')"
                                            style="cursor: pointer;">
                                            <div class="text-center">
                                                <a class="d-inline-block">
                                                    <figure
                                                        class="rounded-circle overflow-hidden d-flex align-items-center justify-content-center m-0"
                                                        style="width: 85px; height: 85px;">
                                                        @php
                                                            $iconName = str_replace(' ', '', ucwords(strtolower($kategori['nama'])));
                                                        @endphp
                                                        <img src="assets/user/imgs/icons/{{ $iconName }}.svg" alt="{{ $kategori['nama'] }}"
                                                            class="w-100 h-100 object-fit-cover" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <h5 class="text-center mt-20">
                                                <a class="text-dark">{{ $kategori['nama'] }}</a>
                                            </h5>
                                            <p class="text-center text-stroke-40 mt-20">{{ $kategori['jumlah'] }} Lowongan Tersedia</p>
                                        </div>
                                    </div>
                    @endforeach

                    @if ($kategoriLainnya)
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp"
                                            data-wow-delay=".{{ $kategoriUtama->count() * 1 }}s"
                                            onclick="searchByCategory('{{ $kategoriLainnya['nama'] }}')" style="cursor: pointer;">
                                            <div class="text-center">
                                                <a class="d-inline-block">
                                                    <figure
                                                        class="rounded-circle overflow-hidden d-flex align-items-center justify-content-center m-0"
                                                        style="width: 85px; height: 85px;">
                                                        @php
                                                            $iconName = str_replace(' ', '', ucwords(strtolower($kategoriLainnya['nama'])));
                                                        @endphp
                                                        <img src="assets/user/imgs/icons/{{ $iconName }}.svg"
                                                            alt="{{ $kategoriLainnya['nama'] }}" class="w-100 h-100 object-fit-cover" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <h5 class="text-center mt-20">
                                                <a class="text-dark">{{ $kategoriLainnya['nama'] }}</a>
                                            </h5>
                                            <p class="text-center text-stroke-40 mt-20">{{ $kategoriLainnya['jumlah'] }} Lowongan Tersedia
                                            </p>
                                        </div>
                                    </div>
                    @endif
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="card-grid hover-up wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                            <div class="text-center mt-15">
                                <h3>{{ $kategoriPekerjaan->sum('jumlah') }}+</h3>
                            </div>
                            <p class="text-center mt-30 text-stroke-40">Pekerjaan menunggu Anda</p>
                            <div class="text-center mt-30">
                                <div class="box-button-shadow">
                                    <a href="{{ route('daftar-pekerjaan') }}" class="btn btn-default">Jelajahi lebih
                                        lanjut</a>
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
                        <h2 class="section-title mb-20">Lowongan Pekerjaan</h2>
                        <p class="text-md-lh28 color-black-5">Cari peluang kerja sesuai keahlian.</p>
                    </div>
                    <div class="col-lg-8 text-xl-end text-start">
                        <ul class="nav nav-right float-xl-end float-start" role="tablist">
                            @php
                                $lainnya = collect($categories)->filter(fn($c) => strtolower($c) === 'lainnya');
                                $utama = collect($categories)->filter(fn($c) => strtolower($c) !== 'lainnya');
                                $categoriesOrdered = $utama->concat($lainnya)->values(); // gabungkan ulang
                            @endphp

                            @foreach($categoriesOrdered as $index => $category)
                                <li>
                                    <button id="nav-tab-{{ $index }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $index }}"
                                        type="button" role="tab" aria-controls="tab-{{ $index }}"
                                        aria-selected="{{ $index == 0 ? 'true' : 'false' }}"
                                        class="{{ $index == 0 ? 'active' : '' }}">
                                        {{ ucfirst($category) }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="mt-70">
                    <div class="tab-content" id="myTabContent">
                        @foreach($categoriesOrdered as $index => $category)
                            <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="tab-{{ $index }}"
                                role="tabpanel" aria-labelledby="tab-{{ $index }}">
                                <div class="row">
                                    @foreach($pekerjaanPerKategori[$category] ?? [] as $job)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="card-grid-2 hover-up">
                                                <div class="card-block-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12"
                                                            style="display: flex; justify-content: space-between; gap: 16px;">
                                                            <a href="{{ route('detail-pekerjaan', $job->judul_pekerjaan) }}"
                                                                class="card-2-img-text card-grid-2-img-medium">
                                                                <span class="card-grid-2-img-small p-0">
                                                                    @if ($job->perusahaan && $job->perusahaan->logo)
                                                                        <img alt="{{ $job->judul_pekerjaan }}"
                                                                            src="{{ asset($job->perusahaan->logo) }}"
                                                                            class="w-100 h-100 object-fit-cover" style="border-radius: 8px" />
                                                                    @endif
                                                                </span>
                                                                <span>{{ $job->judul_pekerjaan }}</span>
                                                            </a>
                                                            <div class="text-end pt-5">
                                                                <span class="text-gray-100 text-md"><i class="fi-rr-bookmark"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                    <div class="mt-15" style="display: flex; gap: 24px;">
                                                        <a href="#">
                                                            <span class="text-brand-10 text-icon-first">
                                                                {{ $job->perusahaan->nama_perusahaan ?? '-' }}
                                                            </span>
                                                        </a>
                                                        <span class="text-mutted-2" style="font-size: 12px;">
                                                            <i class="fi-rr-marker" style="font-size: 12px;"></i> {{ $job->lokasi }}
                                                        </span>
                                                    </div>
                
                                                    <div class="text-small mt-15">
                                                        {{ Str::limit($job->about_job, 100) }}
                                                    </div>
                
                                                    <div class="card-2-bottom mt-30">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-4">
                                                                <span class="card-text-price">{{ $job->rentang_gaji }} jt</span>
                                                            </div>
                                                            <div class="col-lg-6 col-8 text-end">
                                                                <a href="{{ route('detail-pekerjaan', $job->judul_pekerjaan) }}">
                                                                    <span class="text-brand-10">Lamar Sekarang</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
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
                        <a href="{{ route('jejak-alumni') }}"
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
                                    <div class="social-icons mb-10 d-flex justify-content-center">
                                        @if($item->linkedin)
                                            <a href="{{ $item->linkedin }}" target="_blank"
                                                class="text-decoration-none me-2" style="font-size: 20px;">
                                                <i class="bi bi-linkedin"></i>
                                            </a>
                                        @endif
                                        @if($item->instagram)
                                            <a href="{{ $item->instagram }}" target="_blank" class="text-decoration-none"
                                                style="font-size: 20px;">
                                                <i class="bi bi-instagram"></i>
                                            </a>
                                        @endif
                                    </div>
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
    <script>
       function searchByCategory(category) {
        const encodedCategory = encodeURIComponent(category);
        window.location.href = `/daftar-pekerjaan?kategori=${encodedCategory}`;
    }


        function selectCategory(category) {
            // Set nilai input pencarian
            document.getElementById('jobSearchInput').value = category;
        }
    </script>
@endsection