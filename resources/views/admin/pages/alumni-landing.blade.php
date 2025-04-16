@extends('admin.layout.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            {{-- Konten utama --}}
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">

                    {{-- Header kartu dengan gambar background --}}
                    <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10"
                        style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('assets/media/svg/4.png')">
                        <div class="card-header py-10">
                            <div class="d-flex align-items-center">
                                {{-- Icon --}}
                                <div class="symbol symbol-circle me-5">
                                    <div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                        <i class="ki-outline ki-abstract-47 fs-2x text-primary"></i>
                                    </div>
                                </div>

                                {{-- Judul dan deskripsi --}}
                                <div class="d-flex flex-column">
                                    <h2 class="mb-1">Profil Pekerjaan Alumni</h2>
                                    <div class="text-muted fw-bold">
                                        Total {{ $alumni->where('status', 'Approved')->count() }} Alumni
                                        <span class="mx-3">|</span>Add just 6 Alumni for Landing Page
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Daftar kartu alumni --}}
                    <div class="row">
                        @foreach ($alumni as $item)
                            @if ($item->status == 'Approved')
                                <div class="col-12 col-lg-3 col-md-6">
                                    <div class="card border-hover-primary mb-5 mb-xl-8">
                                        <div class="card-body">

                                            {{-- Konten utama kartu alumni --}}
                                            <div class="d-flex flex-center flex-column py-5">

                                                {{-- Foto alumni --}}
                                                <div class="symbol symbol-100px symbol-circle mb-7">
                                                    <img src="{{ asset('storage/' . $item->foto) }}"
                                                        class="object-fit-cover" alt="{{ $item->nama }}">
                                                </div>

                                                {{-- Nama alumni --}}
                                                <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">
                                                    {{ $item->nama }}
                                                </a>

                                                {{-- Badge pekerjaan --}}
                                                <div class="mb-2">
                                                    <div class="badge badge-lg badge-light-primary d-inline">
                                                        {{ $item->pekerjaan }}
                                                    </div>
                                                </div>

                                                {{-- Link sosial media --}}
                                                <div class="d-flex gap-3 mt-3">
                                                    <a href="{{ $item->instagram }}" class="text-gray-600 text-hover-primary me-1">
                                                        <i class="bi bi-instagram fs-2"></i>
                                                    </a>
                                                    <a href="{{ $item->linkedin }}" class="text-gray-600 text-hover-primary">
                                                        <i class="bi bi-linkedin fs-2"></i>
                                                    </a>
                                                </div>
                                            </div>

                                            {{-- Separator --}}
                                            <div class="separator"></div>

                                            {{-- Detail perusahaan dan jurusan --}}
                                            <div class="pb-5 fs-6">
                                                <div class="fw-bold mt-5">Perusahaan</div>
                                                <div class="text-gray-600">{{ $item->perusahaan }}</div>
                                                <div class="fw-bold mt-5">Jurusan</div>
                                                <div class="text-gray-600">{{ $item->jurusan }}</div>
                                            </div>

                                            {{-- Tombol untuk menambahkan ke landing page --}}
                                            <div class="d-flex flex-stack fs-4 py-3 justify-content-end">
                                                <form
                                                    action="{{ route('admin.updateAlumniLanding', ['id' => $item->id_jejak_alumni]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="For Carousel Landing">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-light btn-flex btn-center update-btn">
                                                            <span class="default-text">
                                                                @if ($item->tampilkan_di_landing)
                                                                    <i class="ki-outline ki-check telahDitambah fs-3"></i>
                                                                    <span class="indicator-label">Telah ditambah</span>
                                                                @else
                                                                    <i class="ki-outline ki-plus tambah fs-3"></i>
                                                                    <span class="indicator-label">Tambah</span>
                                                                @endif
                                                            </span>

                                                            {{-- Spinner (ditampilkan saat loading) --}}
                                                            <span class="spinner-border spinner-border-sm align-middle ms-2 d-none spinner"></span>
                                                        </button>
                                                    </span>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Script untuk menangani update tombol tambah ke landing --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".update-form").forEach((form) => {
                form.addEventListener("submit", function(e) {
                    e.preventDefault(); // Cegah submit bawaan

                    let button = form.querySelector(".update-btn");
                    let spinner = form.querySelector(".spinner");
                    let defaultText = form.querySelector(".default-text");
                    let successAlert = document.getElementById("success-alert");

                    // Tampilkan loading spinner
                    button.disabled = true;
                    spinner.classList.remove("d-none");
                    defaultText.style.display = "none";

                    // Kirim data via fetch
                    fetch(form.action, {
                            method: "POST",
                            body: new FormData(form),
                        })
                        .then((response) => response.json())
                        .then((data) => {
                            // Kembalikan tampilan tombol
                            spinner.classList.add("d-none");
                            button.disabled = false;
                            defaultText.style.display = "inline";

                            // Tampilkan alert sukses (jika ada)
                            successAlert.classList.remove("d-none");
                            setTimeout(() => {
                                successAlert.classList.add("d-none");
                            }, 3000);
                        })
                        .catch((error) => {
                            console.error("Error:", error);
                            spinner.classList.add("d-none");
                            button.disabled = false;
                            defaultText.style.display = "inline";
                        });
                });
            });
        });
    </script>

    {{-- SweetAlert untuk notifikasi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    text: "{{ session('success') }}",
                    icon: "success",
                    buttonsStyling: false,
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    text: "{{ session('error') }}",
                    icon: "error",
                    buttonsStyling: false,
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        });
    </script>
@endsection
