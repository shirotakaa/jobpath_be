<!-- filepath: /c:/laragon/www/JobPath/resources/views/admin/pages/pengaturan-identitas.blade.php -->
@extends('admin.layout.main')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                @if(session('success') || session('error'))
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            Swal.fire({
                                text: "{{ session('success') ?? session('error') }}",
                                icon: "{{ session('success') ? 'success' : 'error' }}",
                                buttonsStyling: false,
                                showConfirmButton: false,
                                timer: 1000,
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary"
                                }
                            });
                        });
                    </script>
                @endif
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body py-9">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <div class="me-7 mb-4">

                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative" style="width: 200px; height: 160px;">
                                    <img src="{{ optional($identitas)->logo_dark ? asset('storage/' . $identitas->logo_dark) : asset('assets/admin/media/svg/blank.svg') }}" 
                                        class="img-fluid" 
                                        style="object-fit: contain; width: 100%; height: 100%;" 
                                        alt="image" />
                                </div>
                                
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-2">
                                            <a class="text-gray-900 fs-2 fw-bold me-1">{{ $identitas->nama ?? 'Masukkan Nama Lembaga' }}</a>
                                        </div>
                                        <div class="mb-3">
                                            <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                <i class="ki-outline ki-geolocation fs-4 me-1"></i>{{ $identitas->alamat ?? 'Jl. Lorem ipsum dolor sit amet consectetur adipisicing elit.' }}</a>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-1 pe-2">
                                            <a href="{{ $identitas->instagram ?? '#' }}" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                <i class="ki-outline ki-instagram fs-4 me-1"></i>Instagram</a>
                                            <a href="{{ $identitas->youtube ?? '#' }}" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                <i class="ki-outline ki-youtube fs-4 me-1"></i>Youtube</a>
                                            <a href="{{ $identitas->facebook ?? '#' }}" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                <i class="ki-outline ki-facebook fs-4 me-1"></i>Facebook</a>
                                            <a href="{{ $identitas->tiktok ?? '#' }}" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                <i class="ki-outline ki-tiktok fs-4 me-1"></i>Tiktok</a>
                                            <a href="{{ $identitas->whatsapp ?? '#' }}" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                                <i class="ki-outline ki-whatsapp fs-4 me-1"></i>WhatsApp</a>
                                            <a href="mailto:{{ $identitas->email ?? 'example@ex.com' }}" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                                <i class="ki-outline ki-sms fs-4 me-1"></i>{{ $identitas->email ?? 'example@ex.com' }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap flex-stack">
                                    <div class="d-flex flex-column flex-grow-1">
                                        <div class="d-flex flex-wrap">
                                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4">
                                                <div class="fw-semibold fs-6 mb-1 text-gray-500">Deskripsi singkat</div>
                                                <div class="d-flex align-items-center">
                                                    <a>{{ $identitas->deskripsi ?? 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam voluptate mollitia praesentium veritatis fugiat pariatur reprehenderit, nulla quis ducimus ea nesciunt doloremque doloribus eaque similique officiis molestiae consequatur modi magni dicta cupiditate, voluptatum perspiciatis est quod et? Corporis repudiandae ipsa laboriosam unde debitis facere quasi, natus blanditiis. Laborum, sint veritatis!' }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Detail Identitas</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form id="identitas-form" action="{{ route('identitas.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Logo Terang</label>
                                    <div class="col-lg-9">
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                            <div class="image-input-wrapper w-250px h-125px"
                                                style="background-image: url('{{ isset($identitas) && $identitas->logo_light ? asset('storage/' . $identitas->logo_light) : asset('assets/admin/media/svg/blank.svg') }}');
                                                    background-size: contain;
                                                    background-repeat: no-repeat;
                                                    background-position: center;">
                                            </div>

                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <input type="file" name="logo_light" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="logo_light_remove" />
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel logo">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Logo Gelap</label>
                                        <div class="col-lg-9">
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                                <div class="image-input-wrapper w-250px h-125px"
                                                style="background-image: url('{{ isset($identitas) && $identitas->logo_dark ? asset('storage/' . $identitas->logo_dark) : asset('assets/admin/media/svg/blank.svg') }}');
                                                       background-size: contain;
                                                       background-repeat: no-repeat;
                                                       background-position: center;">
                                                </div>
                                    
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change logo">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <input type="file" name="logo_dark" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="logo_dark_remove" />
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel logo">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label required fw-semibold fs-6">Nama</label>
                                    <div class="col-lg-9">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="nama" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                placeholder="Nama Lembaga" value="{{ $identitas->nama ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label required fw-semibold fs-6">Alamat</label>
                                    <div class="col-lg-9 fv-row">
                                        <input type="text" name="alamat" class="form-control form-control-lg form-control-solid"
                                            placeholder="Masukkan Alamat" value="{{ $identitas->alamat ?? '' }}" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label required fw-semibold fs-6">Deskripsi Singkat</label>
                                    <div class="col-lg-9 fv-row">
                                        <textarea class="form-control form-control form-control-solid" name="deskripsi" data-kt-autosize="true"
                                            maxlength="350">{{ $identitas->deskripsi ?? '' }}</textarea>
                                        <div class="form-text">Maksimal 50 kata</div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-6"></div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Link Instagram
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Kosongkan jika tidak ada">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <div class="col-lg-9 fv-row">
                                        <input type="url" name="instagram" class="form-control form-control-lg form-control-solid"
                                            placeholder="Masukkan Link Instagram" value="{{ $identitas->instagram ?? '' }}" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Link Youtube
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Kosongkan jika tidak ada">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <div class="col-lg-9 fv-row">
                                        <input type="url" name="youtube" class="form-control form-control-lg form-control-solid"
                                            placeholder="Masukkan Link Youtube" value="{{ $identitas->youtube ?? '' }}" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Link Facebook
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Kosongkan jika tidak ada">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <div class="col-lg-9 fv-row">
                                        <input type="url" name="facebook" class="form-control form-control-lg form-control-solid"
                                            placeholder="Masukkan Link Facebook" value="{{ $identitas->facebook ?? '' }}" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Link Tiktok
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Kosongkan jika tidak ada">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <div class="col-lg-9 fv-row">
                                        <input type="url" name="tiktok" class="form-control form-control-lg form-control-solid"
                                            placeholder="Masukkan Link Tiktok" value="{{ $identitas->tiktok ?? '' }}" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Link WhatsApp
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Kosongkan jika tidak ada">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <div class="col-lg-9 fv-row">
                                        <div class="input-group mb-5">
                                            <span class="input-group-text"
                                                id="basic-addon3">Ex:  https://wa.me/628000999888</span>
                                            <input type="url" name="whatsapp" class="form-control" 
                                                placeholder="Masukkan Link WhatsApp" value="{{ $identitas->whatsapp ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Email
                                        <span class="ms-1" data-bs-toggle="tooltip" title="Kosongkan jika tidak ada">
                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                        </span>
                                    </label>
                                    <div class="col-lg-9 fv-row">
                                        <input type="email" name="email" class="form-control form-control-lg form-control-solid"
                                            placeholder="Masukkan Email" value="{{ $identitas->email ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="submit" id="submit_load" class="btn btn-primary">
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
    </div>
</div>

<script>
    "use strict";

    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById("identitas-form");
        const submitButton = form.querySelector("button[type='submit']");

        form.addEventListener("submit", function () {
            // Aktifkan loading indikator
            submitButton.setAttribute("data-kt-indicator", "on");
            submitButton.disabled = true;
        });
    });
</script>

@endsection