@extends('admin.layout.main') {{-- Menggunakan layout utama admin --}}
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">

                {{-- Form untuk update Hero Landing --}}
                <form id="hero-landing-form" action="{{ route('hero-landing.update', $heroLanding->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf {{-- Token CSRF untuk keamanan --}}
                    @method('PUT') {{-- Metode PUT karena ini update data --}}

                    <div class="row">
                        <!-- Kolom Kiri: Upload Gambar Background -->
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Asset Foto for Hero</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">

                                    {{-- Style gambar placeholder --}}
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('{{ asset('assets/admin/media/svg/blank-image.svg') }}');
                                        }
                                        [data-bs-theme="dark"] .image-input-placeholder {
                                            background-image: url('{{ asset('assets/admin/media/svg/blank-image-dark.svg') }}');
                                        }
                                    </style>

                                    {{-- Komponen untuk preview dan upload gambar --}}
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">

                                        {{-- Preview gambar lama atau default jika tidak ada --}}
                                        <div class="image-input-wrapper w-250px h-300px"
                                            style="background-image: url('{{ $heroLanding->background_image ? asset('storage/' . $heroLanding->background_image) : asset('assets/admin/media/svg/blank-image.svg') }}');">
                                        </div>

                                        {{-- Tombol ubah gambar --}}
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="ki-outline ki-pencil fs-7"></i>
                                            <input type="file" name="background_image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="background_image_remove" />
                                        </label>

                                        {{-- Tombol cancel dan hapus gambar --}}
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                    </div>

                                    {{-- Catatan bawah gambar --}}
                                    <div class="text-muted fs-7">
                                        Masukkan foto untuk asset hero pada halaman depan landing website.
                                        Only *.jpg and *.jpeg image files are accepted.
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Kolom Kanan: Input Teks -->
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">

                                    {{-- Input Judul --}}
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label">Judul Hero</label>
                                        <input type="text" name="judul_hero" class="form-control mb-2" placeholder="Masukkan Judul Hero"
                                            value="{{ $heroLanding->judul_hero ?? '' }}" maxlength="50"/>
                                        <div class="text-muted fs-7">Maksimal 8 kata.</div>
                                    </div>

                                    {{-- Input Subtitle --}}
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label">Subtitle Hero</label>
                                        <input type="text" name="subtitle_hero" class="form-control mb-2" placeholder="Masukkan Subtitle Hero"
                                            value="{{ $heroLanding->subtitle_hero ?? '' }}" maxlength="120"/>
                                        <div class="text-muted fs-7">Maksimal 20 kata.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tombol submit --}}
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan Perubahan</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    "use strict";

    // Saat DOM siap, aktifkan indikator loading saat form disubmit
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("hero-landing-form");
        const submitButton = form.querySelector("button[type='submit']");

        form.addEventListener("submit", function () {
            // Tampilkan spinner dan nonaktifkan tombol
            submitButton.setAttribute("data-kt-indicator", "on");
            submitButton.disabled = true;
        });
    });
</script>


{{-- Jika ada session 'success', tampilkan notifikasi sukses --}}
@if(session('success'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                text: "{{ session('success') }}",
                icon: "success",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                }
            });
        });
    </script>

{{-- Jika ada session 'error', tampilkan notifikasi error --}}
@elseif(session('error'))
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                text: "{{ session('error') }}",
                icon: "error",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    confirmButton: "btn fw-bold btn-primary"
                }
            });
        });
    </script>
@endif


@endsection