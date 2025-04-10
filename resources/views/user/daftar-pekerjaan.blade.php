@extends('user.layout.main')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single none-bg">
                <div class="container">
                    <h4>Jelajahi Ribuan Peluang Karier untuk Masa Depan Anda!</h4>
                    <div class="row mt-15 mb-40">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-mutted">Temukan pekerjaan berikutnya yang paling cocok untukmu.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Daftar Pekerjaan</li>
                            </ul>
                        </div>
                    </div>
                    <div class="box-shadow-bdrd-15 box-filters">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="box-search-job w-100">
                                    <form class="form-search-job w-100">
                                        <input type="text" id="jobSearchInput" class="input-search-job"
                                            placeholder="Cari pekerjaan" value="{{ request('query') ?? '' }}" />
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg" style="width: 100%;">
                                <div class="d-flex job-fillter">
                                    <div class="d-block d-lg-flex">
                                        <div class="dropdown job-type">
                                            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                                aria-expanded="false" aria-haspopup="true" data-bs-display="static">
                                                <i class="fi-rr-briefcase"></i>
                                                <span id="selectedCategory">Pilih Kategori</span>
                                                <i class="fi-rr-angle-small-down"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                {{-- Tampilkan kategori selain "Lainnya" --}}
                                                @foreach ($categories as $category)
                                                    @if (strtolower($category) !== 'lainnya')
                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="selectCategory('{{ $category }}')">{{ $category }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach

                                                {{-- Tampilkan "Lainnya" di akhir jika ada --}}
                                                @foreach ($categories as $category)
                                                    @if (strtolower($category) === 'lainnya')
                                                        <li>
                                                            <a class="dropdown-item" href="#"
                                                                onclick="selectCategory('{{ $category }}')">{{ $category }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="box-button-find">
                                        <button id="jobSearchButton" class="btn btn-default float-right">Temukan</button>
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
                                @foreach ($pekerjaan as $job)
                                    <div class="col-lg-3 col-md-6 job-card">
                                        <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn"
                                            data-category="{{ strtolower($job->kategori) }}">
                                            <div class="card-block-info">
                                                <div class="row">
                                                    <div class="col-lg-12 col-12"
                                                        style="display: flex; justify-content: space-between; gap: 16px;">
                                                        <a href="{{ route('detail-pekerjaan', $job->judul_pekerjaan) }}"
                                                            class="card-2-img-text card-grid-2-img-medium">
                                                            <span class="card-grid-2-img-small p-0">
                                                                @if ($job->perusahaan->logo)
                                                                    <img alt="{{ $job->judul_pekerjaan }}"
                                                                        src="{{ asset($job->perusahaan->logo) }}"
                                                                        class="w-100 h-100 object-fit-cover"  style="border-radius: 8px" />
                                                                @endif
                                                            </span>
                                                            <span>{{ $job->judul_pekerjaan }}</span>
                                                        </a>
                                                        <div class="text-end pt-5">
                                                            <span class="text-gray-100 text-md">
                                                                <i class="fi-rr-bookmark"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-15" style="display: flex; gap: 24px;">
                                                    <a href="{{ route('detail-pekerjaan', $job->id_perusahaan) }}">
                                                        <span
                                                            class="text-brand-10">{{ $job->perusahaan->nama_perusahaan ?? 'Perusahaan Tidak Diketahui' }}</span>
                                                    </a>
                                                    <span class="text-mutted-2" style="font-size: 12px;">
                                                        <i class="" style="font-size: 12px;"></i> {{ $job->kategori }}
                                                    </span>
                                                </div>
                                                <div class="mt-15" style="display: flex; gap: 24px;">
                                                    <span class="text-mutted-2" style="font-size: 12px;">
                                                        <i class="fi-rr-marker" style="font-size: 12px;"></i>
                                                        {{ \Illuminate\Support\Str::limit($job->lokasi, 40, '...') }}
                                                    </span>
                                                </div>

                                                <div class="text-small mt-15">
                                                    {!! Str::limit(strip_tags($job->about_job), 135) !!}
                                                </div>

                                                <div class="card-2-bottom mt-30">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-4">
                                                            <span class="card-text-price">
                                                                {{ $job->rentang_gaji }} <span>/Juta</span>
                                                            </span>
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

                            <div class="paginations text-center">
                                <ul class="pager" id="pagination-container"></ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        let selectedCategory = '';

        function selectCategory(category) {
    document.getElementById("selectedCategory").innerText = category;
    selectedCategory = category.toLowerCase();

    // Simpan kategori ke query URL (tanpa reload)
    const params = new URLSearchParams(window.location.search);
    params.set('kategori', category);
    const newUrl = `${window.location.pathname}?${params.toString()}`;
    window.history.replaceState({}, '', newUrl);
}


        // Auto-set selected category from URL
        window.addEventListener('DOMContentLoaded', () => {
            const params = new URLSearchParams(window.location.search);
            const kategori = params.get('kategori');
            if (kategori) {
                document.getElementById("selectedCategory").innerText = kategori;
                selectedCategory = kategori.toLowerCase();
            }
        });

        document.getElementById('jobSearchButton').addEventListener('click', function (e) {
    e.preventDefault();

    let searchValue = document.getElementById('jobSearchInput')?.value.trim();
    const params = new URLSearchParams(window.location.search);

    if (searchValue) {
        params.set('query', searchValue);
    } else {
        params.delete('query');
    }

    if (selectedCategory) {
        params.set('kategori', selectedCategory);
    } else {
        params.delete('kategori');
    }

    window.location.href = `${window.location.pathname}?${params.toString()}`;
});

    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const companyCards = document.querySelectorAll(".job-card");
            const cardsPerPage = 8;
            const totalPages = Math.ceil(companyCards.length / cardsPerPage);
            let currentPage = 1;

            const paginationContainer = document.getElementById("pagination-container");

            function createPagination() {
                paginationContainer.innerHTML = "";

                const prev = document.createElement("li");
                prev.innerHTML = `<a href="#" class="pager-prev"></a>`;
                paginationContainer.appendChild(prev);
                prev.addEventListener("click", (e) => {
                    e.preventDefault();
                    if (currentPage > 1) showPage(currentPage - 1);
                });

                for (let i = 1; i <= totalPages; i++) {
                    const li = document.createElement("li");
                    li.innerHTML = `<a href="#" class="pager-number">${i}</a>`;
                    li.querySelector("a").addEventListener("click", (e) => {
                        e.preventDefault();
                        showPage(i);
                    });
                    paginationContainer.appendChild(li);
                }

                const next = document.createElement("li");
                next.innerHTML = `<a href="#" class="pager-next"></a>`;
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

                const pageLinks = document.querySelectorAll(".pager-number");
                pageLinks.forEach((link) => {
                    link.classList.toggle("active", parseInt(link.textContent) === page);
                });

                currentPage = page;
            }

            createPagination();
            showPage(currentPage);
        });
    </script>


    {{--
    <script>
        const jobCards = document.querySelectorAll(".job-card");
        const pageNumbers = document.querySelectorAll(".pager-number");
        const prevButton = document.querySelector(".pager-prev");
        const nextButton = document.querySelector(".pager-next");

        const cardsPerPage = 8;
        const totalPages = Math.ceil(jobCards.length / cardsPerPage);
        let currentPage = 1;

        function showPage(page) {
            const start = (page - 1) * cardsPerPage;
            const end = start + cardsPerPage;

            jobCards.forEach((card, index) => {
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
    </script> --}}
@endsection