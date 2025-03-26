@extends('guest.layout.main')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single none-bg">
                <div class="container">
                    <h4>Gabung dengan Perusahaan Impianmu</h4>
                    <div class="row mt-15 mb-40">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-mutted">Wujudkan Karier Impianmu dengan Bergabung di Perusahaan Terbaik</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Daftar Perusahaan</li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-shadow-bdrd-15 box-filters">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="box-search-job w-100">
                                    <form class="form-search-job w-100">
                                        <input type="text" class="input-search-job" placeholder="Cari perusahaan" />
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="d-flex job-fillter">
                                    <div class="box-button-find">
                                        <button class="btn btn-default float-right">Temukan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box mt-80">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-12 float-right" style="width: 100%;">
                        <div class="content-page">
                            <div class="row job-listing-grid-2" style="padding-top: 8px;">
                                @foreach ($perusahaan as $item)
                                    <div class="col-lg-3 col-md-6 company-card">
                                        <div class="card-grid-2 card-employers hover-up wow animate__animated animate__fadeIn">
                                            <div class="text-center card-grid-2-image-rd">
                                                <a href="#" class="d-inline-block">
                                                    <figure class="rounded-circle overflow-hidden d-flex align-items-center justify-content-center m-0"
                                                        style="width: 85px; height: 85px;">
                                                        <img alt="JobPath"
                                                            src="{{ $item->logo ? asset($item->logo) : asset('assets/user/imgs/employers/employer-default.png') }}"
                                                            class="w-100 h-100 object-fit-cover" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="card-block-info">
                                                <div class="card-profile">
                                                    <h5><a href="#"><strong>{{ $item->nama_perusahaan }}</strong></a></h5>
                                                    <span class="text-sm">{{ $item->lokasi }}</span>
                                                </div>
                                                <div class="mt-15 d-flex flex-column align-items-center text-center"></div>
                                                <div class="card-2-bottom card-2-bottom-candidate">
                                                    <div class="text-center mb-5">
                                                        <a href="#" class="btn btn-border btn-brand-hover"
                                                            data-bs-toggle="modal" data-bs-target="#loginModal">
                                                            {{ $item->jumlah_lowongan }} Open Jobs
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
        
                            <!-- Pagination -->
                            @if ($perusahaan->total() > 8)
                                <div class="paginations text-center">
                                    {{ $perusahaan->links('vendor.pagination.bootstrap-4') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>        
    </main>

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.querySelector(".input-search-job");
            const searchButton = document.querySelector(".box-button-find button");
            const jobCards = document.querySelectorAll(".job-listing-grid-2 .col-lg-3");
            const jobListContainer = document.querySelector(".job-listing-grid-2");

            searchButton.addEventListener("click", function() {
                const searchValue = searchInput.value.toLowerCase();
                let filteredJobs = [];

                jobCards.forEach(card => {
                    const jobTitleElement = card.querySelector(".card-profile h5 strong");
                    if (jobTitleElement) {
                        const jobTitle = jobTitleElement.textContent.toLowerCase();
                        if (jobTitle.includes(searchValue)) {
                            filteredJobs.push(card);
                        }
                    }
                });

                jobListContainer.innerHTML = "";

                if (filteredJobs.length > 0) {
                    filteredJobs.forEach(job => {
                        jobListContainer.appendChild(job);
                    });
                } else {
                    jobListContainer.innerHTML =
                        "<p class='text-center'>Tidak ada pekerjaan yang ditemukan.</p>";
                }
            });

            searchInput.addEventListener("keypress", function(event) {
                if (event.key === "Enter") {
                    searchButton.click();
                }
            });
        });
    </script>

    <script>
        const companyCards = document.querySelectorAll(".company-card");
        const pageNumbers = document.querySelectorAll(".pager-number");
        const prevButton = document.querySelector(".pager-prev");
        const nextButton = document.querySelector(".pager-next");

        const cardsPerPage = 8;
        const totalPages = Math.ceil(companyCards.length / cardsPerPage);
        let currentPage = 1;

        function showPage(page) {
            const start = (page - 1) * cardsPerPage;
            const end = start + cardsPerPage;

            companyCards.forEach((card, index) => {
                card.style.display = (index >= start && index < end) ? "block" : "none";
            });

            pageNumbers.forEach((number) => {
                number.classList.toggle("active", parseInt(number.textContent) === page);
            });

            currentPage = page;
        }

        pageNumbers.forEach((number) => {
            number.addEventListener("click", (e) => {
                e.preventDefault();
                showPage(parseInt(number.textContent));
            });
        });

        prevButton.addEventListener("click", (e) => {
            e.preventDefault();
            if (currentPage > 1) showPage(currentPage - 1);
        });

        nextButton.addEventListener("click", (e) => {
            e.preventDefault();
            if (currentPage < totalPages) showPage(currentPage + 1);
        });

        showPage(currentPage);
    </script>
@endsection
