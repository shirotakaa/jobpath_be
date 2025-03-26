@extends('user.layout.main')
@section('content')

    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single box-head-single-candidate">
                <div class="container">
                    <h4 class="fs-3">Kumpulkan dan Simpan Peluang Kerja</h4>
                    <div class="row mt-15">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-muted">Simpan lowongan menarik dan kembali kapan saja untuk melanjutkan lamaran.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Pekerjaan Tersimpan</li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
        </section>
        <section class="section-box">
            <div class="container pt-50 pb-50">
                <div class="tb-container">
                    <div class="row mb-20">
                        <div class="col-6 d-flex align-items-center">
                            <span class="tb-title fw-bold">Pekerjaan Tersimpan</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row job-listing-grid-2" style="padding-top: 8px;">
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
                                                            src="assets/user/imgs/job/ui-ux.svg" /></span>
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
                                                            src="assets/user/imgs/job/ui-ux2.svg" /></span>
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
                                                            src="assets/user/imgs/job/ui-ux3.svg" /></span> <span>UI
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
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

@endsection