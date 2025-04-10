{{-- filepath: c:\laragon\www\jobpath_be\resources\views\perusahaan\pages\company-profile.blade.php --}}
@extends('perusahaan.layout.main')
@section('content')

    <style>
        .edit-button {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 14px;
            padding: 5px;
        }
    </style>

    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single box-head-single-candidate">
                <div class="container">
                    <h4 class="fs-3">Kelola dan Perbarui Profil Perusahaan Anda</h4>
                    <div class="row mt-15">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-muted">Lengkapi informasi perusahaan untuk menarik kandidat terbaik.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Profil</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-box">
            <div class="container pt-50 pb-50">
                <form method="POST" action="{{ route('company.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tb-container">
                        <div class="row mb-20">
                            <div class="col-6 d-flex align-items-center">
                                <span class="tb-title fw-bold">Profil Perusahaan</span>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Logo Perusahaan -->
                            <div class="d-flex justify-content-center position-relative mb-10">
                                <figure style="width: 130px; height: 130px; position: relative;">
                                    <img id="companyLogo" src="{{$company->logo}}"
                                        class="w-100 h-100 object-fit-cover rounded-circle" />

                                    <button type="button" class="btn btn-tb btn-table-primary mb-1 mb-lg-0 edit-button"
                                        onclick="document.getElementById('logoInput').click()">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <input type="file" id="logoInput" name="logo" accept="image/*" class="d-none"
                                        onchange="previewLogo(event)">
                                </figure>
                            </div>
                            <div class="card-block-info">
                                <div class="card-profile text-center">
                                    <h5 class="fs-6 mb-20" style="font-weight: 600;">Logo Perusahaan</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Nama Perusahaan -->
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <input class="form-control" name="nama_perusahaan" type="text"
                                        value="{{ old('nama_perusahaan', $company->nama_perusahaan) }}" required>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Jenis Perusahaan</label>
                                    <input class="form-control" name="jenis_perusahaan" type="text"
                                        value="{{ $company->jenis_perusahaan }}" required>
                                </div>
                            </div>

                            <!-- Email Perusahaan -->
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Email Perusahaan</label>
                                    <input class="form-control" name="email" type="email" value="{{ $company->email }}">
                                </div>
                            </div>

                            <!-- Nomor Telepon -->
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input class="form-control" name="nomor_telepon" type="text"
                                        value="{{ $company->nomor_telepon }}">
                                </div>
                            </div>

                            <!-- Alamat Perusahaan -->
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Alamat Perusahaan</label>
                                    <input class="form-control" name="alamat" type="text" value="{{ $company->alamat }}">
                                </div>
                            </div>

                            <div class="row mt-10">
                                <hr>
                            </div>
                            <div class="row mb-20 mt-20">
                                <div class="col-6 d-flex align-items-center">
                                    <span class="tb-title fw-bold">Ubah Kata Sandi</span>
                                </div>
                            </div>
                            <!-- Ubah Password -->
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label>Password Lama</label>
                                        <input class="form-control" name="password_lama" type="password"
                                            placeholder="Masukkan Password Lama">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input class="form-control" name="password_baru" type="password"
                                            placeholder="Masukkan Password Baru">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label>Konfirmasi Password Baru</label>
                                        <input class="form-control" name="konfirmasi_password_baru" type="password"
                                            placeholder="Konfirmasi Password Baru">
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Simpan -->
                            <div class="col-lg-12 col-md-12 text-end mt-4">
                                <button type="submit" class="btn btn-default">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function previewLogo(event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('companyLogo').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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