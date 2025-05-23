@extends('admin.layout.main') 
{{-- Menggunakan layout utama untuk halaman admin --}}

@section('content') 
{{-- Awal dari bagian konten halaman admin --}}

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    {{-- Kontainer utama area konten admin --}}

    <div class="d-flex flex-column flex-column-fluid">
        {{-- Kolom utama fleksibel untuk isi halaman --}}

        <div id="kt_app_content" class="app-content flex-column-fluid pt-10">
            {{-- Konten utama dengan padding atas --}}

            <div id="kt_app_content_container" class="app-container container-fluid">
                {{-- Kontainer responsif isi halaman --}}

                <div class="card mb-5 mb-xl-10">
                    {{-- Kartu utama untuk form input landing page perusahaan --}}

                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        {{-- Header kartu, bisa di-collapse --}}
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Landing Page Perusahaan</h3>
                        </div>
                    </div>

                    <div id="kt_account_settings_profile_details" class="collapse show">
                        {{-- Bagian isi form (default terbuka) --}}

                        <form id="kt_account_profile_details_form" class="form" action="{{ route('perusahaan_content.update', $perusahaanContent->id) }}" method="POST" enctype="multipart/form-data">
                            {{-- Form update konten perusahaan --}}
                            @csrf
                            @method('PUT')

                            <div class="card-body border-top p-9">
                                {{-- Isi dari form, dibungkus dalam card body --}}

                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Foto Asset Penunjang</label>
                                    {{-- Label untuk input gambar --}}

                                    <div class="col-lg-9">
                                        <div class="row">
                                            {{-- Input gambar untuk 3 asset, masing-masing di kolom tersendiri --}}
                                            
                                            {{-- Asset 1 --}}
                                            <div class="col-6 col-lg-2 mb-10 mb-lg-0">
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url('{{ asset($perusahaanContent) && $perusahaanContent->asset_1 ? asset('storage/' . $perusahaanContent->asset_1) : asset('assets/admin/media/svg/blank.svg') }}')">
                                                    </div>
                                                    {{-- Input file untuk asset 1 --}}
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                                                        <i class="ki-outline ki-pencil fs-7"></i>
                                                        <input type="file" name="asset_1" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove1" />
                                                    </label>
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                        <i class="ki-outline ki-cross fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Foto Asset 1</div>
                                            </div>

                                            {{-- Asset 2 --}}
                                            <div class="col-6 col-lg-2 mb-10 mb-lg-0">
                                                {{-- Sama seperti asset 1 tapi untuk asset 2 --}}
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url('{{ asset($perusahaanContent) && $perusahaanContent->asset_2 ? asset('storage/' . $perusahaanContent->asset_2) : asset('assets/admin/media/svg/blank.svg') }}')">
                                                    </div>
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                                                        <i class="ki-outline ki-pencil fs-7"></i>
                                                        <input type="file" name="asset_2" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove1" />
                                                    </label>
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                        <i class="ki-outline ki-cross fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Foto Asset 2</div>
                                            </div>

                                            {{-- Asset 3 --}}
                                            <div class="col-6 col-lg-2 mb-10 mb-lg-0">
                                                {{-- Sama seperti asset 1 tapi untuk asset 3 --}}
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                                    <div class="image-input-wrapper w-125px h-125px"
                                                        style="background-image: url('{{ asset($perusahaanContent) && $perusahaanContent->asset_3 ? asset('storage/' . $perusahaanContent->asset_3) : asset('assets/admin/media/svg/blank.svg') }}')">
                                                    </div>
                                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                                                        <i class="ki-outline ki-pencil fs-7"></i>
                                                        <input type="file" name="asset_3" accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove1" />
                                                    </label>
                                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                                        <i class="ki-outline ki-cross fs-2"></i>
                                                    </span>
                                                </div>
                                                <div class="form-text">Foto Asset 3</div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- Input judul perusahaan --}}
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label required fw-semibold fs-6">Title Perusahaan</label>
                                    <div class="col-lg-9">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="judul_perusahaan" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Masukkan Judul Perusahaan" value="{{ $perusahaanContent->judul_perusahaan ?? '' }}" maxlength="50"/>
                                            <div class="text-muted fs-7">Maksimal 8 kata.</div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Input deskripsi singkat --}}
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label required fw-semibold fs-6">Deskripsi singkat</label>
                                    <div class="col-lg-9 fv-row">
                                        <textarea class="form-control form-control-solid" data-kt-autosize="true" name="deskripsi_perusahaan" maxlength="300">{{ $perusahaanContent->subtitle_perusahaan ?? '' }}</textarea>
                                        <div class="form-text">Deskripsi singkat page FAQ maksimal 40 kata</div>
                                    </div>
                                </div>

                            </div>

                            {{-- Tombol submit --}}
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" id="submit_load" class="btn btn-primary">
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

    </div>
</div>

{{-- Tombol scroll ke atas --}}
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-outline ki-arrow-up"></i>
</div>

{{-- Notifikasi SweetAlert saat berhasil atau gagal --}}
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
