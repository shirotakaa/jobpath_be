@extends('admin.layout.main')
@section('content')
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <div id="kt_app_content" class="app-content flex-column-fluid">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="card mb-5">
                                <div class="card-body py-9">
                                    {{-- @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif --}}
                                    <div class="d-flex flex-column align-items-center">
                                        <div
                                            class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative mb-4">
                                            <img src="{{ $admin->avatar ? asset($admin->avatar) : asset('assets/admin/media/photo-alumni-2.jpg') }}"
                                                alt="image" style="object-fit: cover;" />
                                        </div>

                                        <a class="text-gray-900 fs-2 fw-bold mb-2 text-center">{{ $admin->nama_depan }}
                                            {{ $admin->nama_belakang }}</a>
                                        <div class="d-flex flex-column text-center">
                                            <a
                                                class="d-flex align-items-center justify-content-center text-gray-500 text-hover-primary mb-2">
                                                <i class="ki-outline ki-profile-circle fs-4 me-1"></i>Admin
                                            </a>
                                            <a
                                                class="d-flex align-items-center justify-content-center text-gray-500 text-hover-primary">
                                                <i class="ki-outline ki-sms fs-4 me-1"></i>{{ $admin->email }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-12">
                            <div class="card mb-5" id="kt_profile_details_view">
                                <div class="card-header cursor-pointer">
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Detail Profile</h3>
                                    </div>
                                    <a href="{{ route('admin.profil.edit') }}"
                                        class="btn btn-sm btn-primary align-self-center">Edit Profile</a>
                                </div>
                                <div class="card-body p-9">
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Nama</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $admin->nama_depan }}
                                                {{ $admin->nama_belakang }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Username</label>
                                        <div class="col-lg-8">
                                            <span class="fw-bold fs-6 text-gray-800">{{ $admin->username }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Nomor Telepon
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Dapat digunakan untuk login sebagai pengganti username">
                                                <i class="ki-outline ki-information fs-7"></i>
                                            </span></label>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span class="fw-bold fs-6 text-gray-800 me-2">{{ $admin->nomor }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Email
                                            <span class="ms-1" data-bs-toggle="tooltip"
                                                title="Dapat digunakan untuk login sebagai pengganti username">
                                                <i class="ki-outline ki-information fs-7"></i>
                                            </span></label>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span class="fw-bold fs-6 text-gray-800 me-2">{{ $admin->email }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-7">
                                        <label class="col-lg-4 fw-semibold text-muted">Password</label>
                                        <div class="col-lg-8">
                                            <span id="passwordField" class="fw-semibold fs-6 text-gray-800">********</span>
                                        </div>
                                    </div>
                                    <div
                                        class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                        <i class="ki-outline ki-information fs-2tx text-warning me-4"></i>
                                        <div class="d-flex flex-stack flex-grow-1">
                                            <div class="fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">Rubah sandi default dan lengkapi profil
                                                    anda!</h4>
                                                <div class="fs-6 text-gray-700">
                                                    Pastikan akun Anda lebih aman dengan mengganti sandi default ke sandi
                                                    yang lebih kuat.
                                                    Dan lengkapi profil Anda agar pengalaman menggunakan platform ini lebih
                                                    optimal.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    text: "{{ session('success') }}",
                    icon: "success",
                    buttonsStyling: false,
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
    
            @if(session('error'))
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
