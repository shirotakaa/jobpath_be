<!-- Menggunakan layout utama dari admin panel -->
@extends('admin.layout.main')

<!-- Bagian konten utama halaman -->
@section('content')
    <!-- Main container untuk aplikasi -->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <!-- Card utama dengan gambar latar belakang -->
                    <div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10"
                        style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('assets/admin/media/svg/4.png')">
                        <div class="card-header py-10">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-circle me-5">
                                    <div
                                        class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
                                        <i class="ki-outline ki-abstract-47 fs-2x text-primary"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <h2 class="mb-1">Perusahaan</h2>
                                    <div class="text-muted fw-bold">
                                        <!-- Menampilkan jumlah total perusahaan -->
                                        Total {{ $perusahaan->count() }} Perusahaan
                                        <span class="mx-3">|</span>Add just 6 Company for Logo in Landing Page
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Menampilkan daftar perusahaan dalam bentuk grid -->
                    <div class="row">
                        @foreach ($perusahaan as $item)
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card border-hover-primary mb-lg-2 mb-6 mb-xl-8">
                                    <div class="card-body p-sm">
                                        <div class="d-flex flex-center flex-column py-3">
                                            <!-- Menampilkan logo perusahaan -->
                                            <div class="symbol symbol-100px symbol-150px mb-5">
                                                <img src="{{ $item->logo ? asset($item->logo) : asset('assets/admin/media/bumn-logo.png') }}"
                                                    class="object-fit-cover p-5 p-lg-0" style="border-radius: 25px" alt="{{ $item->nama_perusahaan }}" />
                                            </div>
                                            <!-- Nama perusahaan yang bisa diklik -->
                                            <a href="#"
                                                class="fs-3 text-gray-800 text-hover-primary fw-bold mb-3">{{ $item->nama_perusahaan }}</a>
                                        </div>
                                        <div class="separator"></div>
                                        <div class="d-flex flex-stack fs-4 py-5 justify-content-center">
                                            <!-- Form untuk mengubah status tampil di landing page -->
                                            <form
                                                action="{{ route('admin.updatePerusahaanLanding', $item->id_perusahaan) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    title="For Carousel Landing">
                                                    <button type="submit" class="btn btn-sm btn-light btn-flex btn-center">
                                                        <!-- Menampilkan status tombol berdasarkan status tampil di landing -->
                                                        @if ($item->tampilkan_di_landing)
                                                            <i class="ki-outline ki-check telahDitambah fs-3"></i>
                                                            <span class="indicator-label">Telah ditambah</span>
                                                        @else
                                                            <i class="ki-outline ki-plus tambah fs-3"></i>
                                                            <span class="indicator-label">Tambah</span>
                                                        @endif
                                                        <span class="indicator-progress d-none">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk menampilkan loading indicator saat form disubmit -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tangkap semua form dengan tombol submit
            const forms = document.querySelectorAll('form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    // Temukan tombol submit di dalam form
                    const submitButton = form.querySelector('button[type="submit"]');
                    if (submitButton) {
                        // Sembunyikan label dan tampilkan spinner
                        const indicatorLabel = submitButton.querySelector('.indicator-label');
                        const indicatorProgress = submitButton.querySelector('.indicator-progress');

                        if (indicatorLabel && indicatorProgress) {
                            indicatorLabel.classList.add('d-none');
                            indicatorProgress.classList.remove('d-none');
                        }
                    }
                });
            });
    </script>

    <!-- Script untuk menampilkan SweetAlert jika ada pesan sukses atau error -->
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

<!-- Mengakhiri section konten -->
@endsection
