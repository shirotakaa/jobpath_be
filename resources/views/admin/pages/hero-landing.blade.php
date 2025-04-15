@extends('admin.layout.main')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <form id="hero-landing-form" action="{{ route('hero-landing.update', $heroLanding->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- Kolom Kiri: Background Foto -->
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Asset Foto for Hero</h2>
                                    </div>
                                </div>
                                <div class="card-body text-center pt-0">
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('{{ asset('assets/admin/media/svg/blank-image.svg') }}');
                                        }

                                        [data-bs-theme="dark"] .image-input-placeholder {
                                            background-image: url('{{ asset('assets/admin/media/svg/blank-image-dark.svg') }}');
                                        }
                                    </style>
                                    <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <div class="image-input-wrapper w-250px h-300px"
                                            style="background-image: url('{{ $heroLanding->background_image ? asset('storage/' . $heroLanding->background_image) : asset('assets/admin/media/svg/blank-image.svg') }}');">
                                        </div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="ki-outline ki-pencil fs-7"></i>
                                            <input type="file" name="background_image" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="background_image_remove" />
                                        </label>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="ki-outline ki-cross fs-2"></i>
                                        </span>
                                    </div>
                                    <div class="text-muted fs-7">Masukkan foto untuk asset hero pada halaman depan landing website. Only
                                        *.jpg and *.jpeg image files are accepted.</div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Kolom Kanan: General -->
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-5 fv-row">
                                        <label class="required form-label">Judul Hero</label>
                                        <input type="text" name="judul_hero" class="form-control mb-2" placeholder="Masukkan Judul Hero"
                                            value="{{ $heroLanding->judul_hero ?? '' }}" maxlength="50"/>
                                        <div class="text-muted fs-7">Maksimal 8 kata.</div>
                                    </div>
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
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Simpan Perubahan</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    "use strict";

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("hero-landing-form");
        const submitButton = form.querySelector("button[type='submit']");

        form.addEventListener("submit", function () {
            // Aktifkan loading indikator
            submitButton.setAttribute("data-kt-indicator", "on");
            submitButton.disabled = true;
        });
    });
</script>

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