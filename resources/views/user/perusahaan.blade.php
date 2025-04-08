@extends('user.layout.main')
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

                            <div class="paginations text-center">
                                <ul class="pager" id="pagination-container"></ul>
                            </div>
                             
        
                            <!-- Pagination -->
                            {{-- @if ($perusahaan->lastPage() > 1)
                                <div class="paginations text-center">
                                    <ul class="pager">
                                        <!-- Tombol Previous -->
                                        <li>
                                            <a href="{{ $perusahaan->previousPageUrl() ?? '#' }}"
                                               class="pager-prev {{ $perusahaan->onFirstPage() ? 'disabled' : '' }}">                                                
                                            </a>
                                        </li>
                                    
                                        <!-- Nomor Halaman -->
                                        @for ($i = 1; $i <= $perusahaan->lastPage(); $i++)
                                            <li>
                                                <a href="{{ $perusahaan->url($i) }}"
                                                   class="pager-number {{ $perusahaan->currentPage() == $i ? 'active' : '' }}">
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endfor
                                    
                                        <!-- Tombol Next -->
                                        <li>
                                            <a href="{{ $perusahaan->nextPageUrl() ?? '#' }}"
                                               class="pager-next {{ $perusahaan->currentPage() == $perusahaan->lastPage() ? 'disabled' : '' }}">                                            
                                            </a>
                                        </li>
                                    </ul>    
                                </div>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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
    const cardsPerPage = 8;
    const totalPages = Math.ceil(companyCards.length / cardsPerPage);
    let currentPage = 1;

    const paginationContainer = document.getElementById("pagination-container");

    function createPagination() {
        paginationContainer.innerHTML = "";

        // Prev Button
        const prev = document.createElement("li");
        prev.innerHTML = `<a href="#" class="pager-prev"</a>`;
        paginationContainer.appendChild(prev);
        prev.addEventListener("click", (e) => {
            e.preventDefault();
            if (currentPage > 1) showPage(currentPage - 1);
        });

        // Page Numbers
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement("li");
            li.innerHTML = `<a href="#" class="pager-number">${i}</a>`;
            li.querySelector("a").addEventListener("click", (e) => {
                e.preventDefault();
                showPage(i);
            });
            paginationContainer.appendChild(li);
        }

        // Next Button
        const next = document.createElement("li");
        next.innerHTML = `<a href="#" class="pager-next"</a>`;
        paginationContainer.appendChild(next);
        next.addEventListener("click", (e) => {
            e.preventDefault();
            if (currentPage < totalPages) showPage(currentPage + 1);
        });
    }

    function showPage(page) {
        const start = (page - 1) * cardsPerPage;
        const end = start + cardsPerPage;

        companyCards.forEach((card, index) => {
            card.style.display = (index >= start && index < end) ? "block" : "none";
        });

        // Update active class
        const pageLinks = document.querySelectorAll(".pager-number");
        pageLinks.forEach((link) => {
            link.classList.toggle("active", parseInt(link.textContent) === page);
        });

        currentPage = page;
    }

    createPagination();
    showPage(currentPage);
</script>


@endsection
