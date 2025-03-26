@extends('user.layout.main')
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
                    <h4 class="fs-3">Kelola dan Perbarui Data Diri Anda untuk Lamaran Pekerjaan</h4>
                    <div class="row mt-15">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-muted">Pastikan informasi pribadi Anda selalu akurat dan terbaru agar proses
                                lamaran berjalan lancar.</span>
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
            <div class="container pt-50 pb-20">
                <form id="profilSiswaForm" method="POST" action="{{ route('siswa.profil.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tb-container">
                        <div class="row mb-20">
                            <div class="col-6 d-flex align-items-center">
                                <span class="tb-title fw-bold">Profil Saya</span>
                                <span class="tb-title fw-bold">Profil Saya</span>
                                <span class="tb-title fw-bold">Profil Saya</span>
                                <span class="tb-title fw-bold">Profil Saya</span>
                                <span class="tb-title fw-bold">Profil Saya</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex justify-content-center position-relative mb-10">
                                <figure style="width: 130px; height: 130px; position: relative;">
                                    <img id="profileImage"
                                        src="{{ Auth::guard('siswa')->user()->foto ? (Str::startsWith(Auth::guard('siswa')->user()->foto, 'http') ? Auth::guard('siswa')->user()->foto : asset('storage/' . Auth::guard('siswa')->user()->foto)) : asset('img/default-profile.jpg') }}"
                                        class="w-100 h-100 object-fit-cover rounded-circle" />

                                    <button type="button" class="btn btn-tb btn-table-primary mb-1 mb-lg-0 edit-button"
                                        onclick="document.getElementById('fileInput').click()">
                                        <i class="fa fa-pen"></i>
                                    </button>
                                    <input type="file" id="fileInput" name="foto" accept="image/*" class="d-none"
                                        onchange="previewImage(event)">
                                </figure>
                            </div>
                            <div class="card-block-info">
                                <div class="card-profile text-center">
                                    <h5 class="fs-6 mb-20" style="font-weight: 600;">Foto profil</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" name="nama" type="text"
                                        placeholder="Masukkan Nama Lengkap"
                                        value="{{ old('nama', Auth::guard('siswa')->user()->nama ?? '') }}" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input class="form-control" name="nis" type="text" placeholder="Masukkan NIS"
                                        value="{{ old('nis', Auth::guard('siswa')->user()->nis ?? '') }}" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input class="form-control" name="jurusan" type="text" placeholder="Masukkan Jurusan"
                                        value="{{ old('jurusan', Auth::guard('siswa')->user()->jurusan ?? '') }}" disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Tahun Ajaran</label>
                                    <input class="form-control" name="tahun_ajaran" type="text"
                                        placeholder="Masukkan Tahun Ajaran"
                                        value="{{ old('tahun_ajaran', Auth::guard('siswa')->user()->tahun_ajaran ?? '') }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="email" placeholder="Masukkan Email"
                                        value="{{ old('email', Auth::guard('siswa')->user()->email ?? '') }}">
                                </div>
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
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Kata Sandi Lama</label>
                                    <input class="form-control" name="kata_sandi_lama" type="password"
                                        placeholder="Masukkan Kata Sandi Lama">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Kata Sandi Baru</label>
                                    <input class="form-control" name="kata_sandi_baru" type="password"
                                        placeholder="Masukkan Kata Sandi Baru">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label>Konfirmasi Kata Sandi Baru</label>
                                    <input class="form-control" name="konfirmasi_kata_sandi_baru" type="password"
                                        placeholder="Konfirmasi Kata Sandi Baru">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 text-end mt-4">
                            <button type="submit" class="btn btn-default">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>


    </main>


    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profileImage").src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
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
