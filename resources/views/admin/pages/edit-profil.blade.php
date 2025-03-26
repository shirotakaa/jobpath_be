@extends('admin.layout.main')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Detail Profil</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form id="kt_account_profile_details_form" class="form" method="POST" action="{{ route('admin.profil.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Foto Profil</label>
                                    <div class="col-lg-9">
                                        <div class="image-input image-input-outline"
                                            data-kt-image-input="true"
                                            style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                            
                                            @php
                                                $avatar = $admin->avatar ?? 'assets/admin/media/default-avatar.jpg';
                                            @endphp
                                
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url('{{ asset($avatar) }}')">
                                            </div>
                                
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                title="Change avatar">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <input type="file" name="avatar"
                                                    accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>
                                
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                title="Cancel avatar">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                title="Remove avatar">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    </div>
                                </div>
                                
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Nama Admin</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-6 fv-row">
                                                <input type="text" name="nama_depan" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nama Depan" value="{{ old('nama_depan', $admin->nama_depan ?? '') }}" />
                                            </div>
                                            <div class="col-lg-6 fv-row">
                                                <input type="text" name="nama_belakang" class="form-control form-control-lg form-control-solid" placeholder="Nama Belakang" value="{{ old('nama_belakang', $admin->nama_belakang ?? '') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Username</label>
                                    <div class="col-lg-9">
                                        <div class="col-lg-12 fv-row">
                                            <input type="text" name="username" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Masukkan Username" value="{{ $admin->username }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold fs-6">Nomor Telepon</label>
                                    <div class="col-lg-9">
                                        <div class="col-lg-12 fv-row">
                                            <input type="number" name="nomor" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Masukkan Nomor Telepon" value="{{ $admin->nomor }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-3 col-form-label fw-semibold required fs-6">Email</label>
                                    <div class="col-lg-9">
                                        <div class="col-lg-12 fv-row">
                                            <input type="email" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Masukkan Email" value="{{ $admin->email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-6"></div>
                                <div class="card-title mb-7">
                                    <h3 class="fw-bold">Change Password</h3>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Password Lama</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control form-control-lg form-control-solid pe-5" name="currentpassword" id="currentpassword" />
                                                <button class="btn btn-sm btn-icon position-absolute end-0 top-50 translate-middle-y me-2 toggle-password" type="button" data-target="currentpassword">
                                                    <i class="bi bi-eye-slash fs-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="newpassword" class="form-label fs-6 fw-bold mb-3">Password Baru</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control form-control-lg form-control-solid pe-5" name="newpassword" id="newpassword" />
                                                <button class="btn btn-sm btn-icon position-absolute end-0 top-50 translate-middle-y me-2 toggle-password" type="button" data-target="newpassword">
                                                    <i class="bi bi-eye-slash fs-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Konfirmasi Password Baru</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control form-control-lg form-control-solid pe-5" name="newpassword_confirmation" id="confirmpassword" />
                                                <button class="btn btn-sm btn-icon position-absolute end-0 top-50 translate-middle-y me-2 toggle-password" type="button" data-target="confirmpassword">
                                                    <i class="bi bi-eye-slash fs-2"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
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
    document.querySelectorAll(".toggle-password").forEach(button => {
        button.addEventListener("click", function () {
            const targetInput = document.getElementById(this.dataset.target);
            const icon = this.querySelector("i");
            if (targetInput.type === "password") {
                targetInput.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                targetInput.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        });
    });
</script>


@endsection