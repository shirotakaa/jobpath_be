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
        document.addEventListener("DOMContentLoaded", function () {
            const searchInput = document.querySelector(".input-search-job");
            const searchButton = document.querySelector(".box-button-find button");
            const jobListContainer = document.querySelector(".job-listing-grid-2");
            const paginationContainer = document.getElementById("pagination-container");
    
            const allCards = Array.from(document.querySelectorAll(".company-card"));
            const cardsPerPage = 8;
            let currentPage = 1;
            let filteredCards = [...allCards]; // default: semua
    
            function renderCards() {
                jobListContainer.innerHTML = "";
    
                const start = (currentPage - 1) * cardsPerPage;
                const end = start + cardsPerPage;
    
                const currentCards = filteredCards.slice(start, end);
                if (currentCards.length > 0) {
                    currentCards.forEach(card => jobListContainer.appendChild(card));
                } else {
                    jobListContainer.innerHTML =
                        "<p class='text-center'>Tidak ada perusahaan yang ditemukan.</p>";
                }
            }
    
            function createPagination() {
                paginationContainer.innerHTML = "";
                const totalPages = Math.ceil(filteredCards.length / cardsPerPage);
    
                // Prev Button
                const prev = document.createElement("li");
                prev.innerHTML = `<a href="#" class="pager-prev">&laquo;</a>`;
                prev.classList.toggle("disabled", currentPage === 1);
                paginationContainer.appendChild(prev);
                prev.addEventListener("click", (e) => {
                    e.preventDefault();
                    if (currentPage > 1) {
                        currentPage--;
                        renderCards();
                        createPagination();
                    }
                });
    
                // Page Numbers
                for (let i = 1; i <= totalPages; i++) {
                    const li = document.createElement("li");
                    li.innerHTML = `<a href="#" class="pager-number">${i}</a>`;
                    if (i === currentPage) li.querySelector("a").classList.add("active");
    
                    li.querySelector("a").addEventListener("click", (e) => {
                        e.preventDefault();
                        currentPage = i;
                        renderCards();
                        createPagination();
                    });
    
                    paginationContainer.appendChild(li);
                }
    
                // Next Button
                const next = document.createElement("li");
                next.innerHTML = `<a href="#" class="pager-next">&raquo;</a>`;
                next.classList.toggle("disabled", currentPage === totalPages);
                paginationContainer.appendChild(next);
                next.addEventListener("click", (e) => {
                    e.preventDefault();
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderCards();
                        createPagination();
                    }
                });
            }
    
            function handleSearch() {
                const searchValue = searchInput.value.trim().toLowerCase();
                filteredCards = allCards.filter(card => {
                    const companyName = card.querySelector(".card-profile h5 strong")?.textContent.toLowerCase() || "";
                    return companyName.includes(searchValue);
                });
    
                currentPage = 1;
                renderCards();
                createPagination();
            }
    
            searchButton.addEventListener("click", function (e) {
                e.preventDefault();
                handleSearch();
            });
    
            searchInput.addEventListener("keypress", function (e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                    handleSearch();
                }
            });
    
            // Inisialisasi awal
            renderCards();
            createPagination();
        });
    </script>
    


@endsection
