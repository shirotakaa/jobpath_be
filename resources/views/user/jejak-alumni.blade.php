@extends('user.layout.main')
@section('content')

    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single none-bg">
                <div class="container">
                    <h4>Jejak Alumni dari Bangku Sekolah ke Dunia Kerja</h4>
                    <div class="row mt-15 mb-40">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-mutted">Kisah sukses alumni dalam meraih karier impian.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Jejak Alumni</li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-shadow-bdrd-15 box-filters">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="box-search-job w-100">
                                    <form class="form-search-job w-100">
                                        <input type="text" id="searchInput" class="input-search-job" placeholder="Cari alumni" />
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="d-flex job-fillter">
                                    <div class="box-button-find">
                                        <button id="searchButton" class="btn btn-default float-right">Temukan</button>
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
                                @foreach ($alumni as $item)
                                    <div class="col-lg-4 col-md-6 alumni-card">
                                        <div class="card-grid-2 hover-up">
                                            <div class="text-center card-grid-2-image-rd">
                                                <a href="candidates-single.html">
                                                    <figure style="width: 110px; height: 110px;">
                                                        <img alt="{{ $item->nama }}" src="{{ asset('storage/' . $item->foto) }}" class="w-100 h-100 object-fit-cover" />
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="card-block-info">
                                                <div class="card-profile">
                                                    <a href="#"><strong>{{ $item->nama }}</strong></a>
                                                    <span class="text-sm" style="color: #1f2938;">
                                                        Sebagai alumni SMKN 4 Malang dengan jurusan {{ $item->jurusan }}.
                                                        Sekarang saya telah bekerja saya bekerja sebagai {{ $item->pekerjaan }} di {{ $item->perusahaan }}.
                                                    </span>
                                                </div>
                                                <div class="employers-info d-flex align-items-center justify-content-center mt-15">
                                                    <span class="d-flex align-items-center">
                                                        <i class="fi-rr-briefcase mr-5 ml-0" style="font-size: 16px;"></i>{{ $item->pekerjaan }}
                                                    </span>
                                                    <span class="d-flex align-items-center ml-25">
                                                        <i class="fi-rr-briefcase mr-5" style="font-size: 16px;"></i>{{ $item->perusahaan }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="paginations text-center">
                                <ul class="pager" id="pagination-container"></ul>
                            </div>
        
                            <!-- PAGINATION -->
                            {{-- @if ($alumni->lastPage() > 1)
                                <div class="paginations text-center">
                                    <ul class="pager">
                                        <!-- Tombol Previous -->
                                        <li>
                                            <a href="{{ $alumni->previousPageUrl() ?? '#' }}"
                                               class="pager-prev {{ $alumni->onFirstPage() ? 'disabled' : '' }}">                                                
                                            </a>
                                        </li>
                                    
                                        <!-- Nomor Halaman -->
                                        @for ($i = 1; $i <= $alumni->lastPage(); $i++)
                                            <li>
                                                <a href="{{ $alumni->url($i) }}"
                                                   class="pager-number {{ $alumni->currentPage() == $i ? 'active' : '' }}">
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endfor
                                    
                                        <!-- Tombol Next -->
                                        <li>
                                            <a href="{{ $alumni->nextPageUrl() ?? '#' }}"
                                               class="pager-next {{ $alumni->currentPage() == $alumni->lastPage() ? 'disabled' : '' }}">                                            
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
        <section class="section-box mt-90 mb-80">''
            <div class="container">
                <div class="block-job-bg block-job-bg-homepage-2">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12 d-none d-md-block">
                            <div class="box-image-findjob findjob-homepage-2 ml-0 wow animate__animated animate__fadeIn">
                                <figure><img alt="JobPath" src="assets/user/imgs/banner/img-findjob.png" /></figure>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="box-info-job pl-90 pt-30 pr-90">
                                <span class="text-blue wow animate__animated animate__fadeInUp">Formulir Jejak Alumni</span>
                                <h5 class="heading-36 mb-30 mt-30 wow animate__animated animate__fadeInUp">Bantu kami dengan mengisi formulir jejak alumni</h5>
                                <p class="text-lg wow animate__animated animate__fadeInUp">
                                    Terhubung Kembali dengan Almamater, Bagikan Perjalanan Karirmu untuk Menginspirasi Generasi Berikutnya!
                                </p>
                                <div class="box-button-shadow mt-30 wow animate__animated animate__fadeInUp">
                                    <a href="{{ route('jejak-alumni-form') }}" class="btn btn-default">Isi Formulir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
    
    <script>
        document.getElementById('searchButton').addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah reload form

            var input = document.getElementById('searchInput').value.toLowerCase();
            var cards = document.querySelectorAll('.job-listing-grid-2 .card-grid-2');

            cards.forEach(function (card) {
                var name = card.querySelector('.card-profile strong').innerText.toLowerCase();
                if (name.includes(input) || input === "") {
                    card.parentElement.style.display = "block"; // Tampilkan card
                } else {
                    card.parentElement.style.display = "none"; // Sembunyikan card
                }
            });
        });

    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const searchButton = document.getElementById("searchButton");
        const jobListContainer = document.querySelector(".job-listing-grid-2");
        const paginationContainer = document.getElementById("pagination-container");

        const allCards = Array.from(document.querySelectorAll(".alumni-card"));
        const cardsPerPage = 6;
        let currentPage = 1;
        let filteredCards = [...allCards]; // default: semua alumni

        function renderCards() {
            jobListContainer.innerHTML = "";

            const start = (currentPage - 1) * cardsPerPage;
            const end = start + cardsPerPage;

            const currentCards = filteredCards.slice(start, end);
            if (currentCards.length > 0) {
                currentCards.forEach(card => jobListContainer.appendChild(card));
            } else {
                jobListContainer.innerHTML =
                    "<p class='text-center'>Tidak ada alumni yang ditemukan.</p>";
            }
        }

        function createPagination() {
            paginationContainer.innerHTML = "";
            const totalPages = Math.ceil(filteredCards.length / cardsPerPage);


            // Prev Button
            const prev = document.createElement("li");
            prev.innerHTML = `<a href="#" class="pager-prev"></a>`;
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
            next.innerHTML = `<a href="#" class="pager-next"></a>`;
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
            const keyword = searchInput.value.trim().toLowerCase();
            filteredCards = allCards.filter(card => {
                const name = card.querySelector(".card-profile strong")?.textContent.toLowerCase() || "";
                return name.includes(keyword);
            });

            currentPage = 1;
            renderCards();
            createPagination();
        }

        // Event listeners
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
