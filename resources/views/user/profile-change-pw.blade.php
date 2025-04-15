@extends('user.layout.main')
@section('content')

    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single box-head-single-candidate">
                <div class="container">
                    <h4 class="fs-3">Perbarui Kata Sandi untuk Keamanan Akun</h4>
                    <div class="row mt-15">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-muted">Langkah mudah untuk menjaga akun tetap aman dan terlindungi.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Ubah Password</li>
                            </ul>
                        </div>
                    </div>
                </div>                
            </div>
        </section>
        <section class="section-box">
            <div class="container pt-50 pb-50">
                <div class="tb-container">
                    <div class="row mb-20">
                        <div class="col-6 d-flex align-items-center w-100">
                            <span class="tb-title fw-bold">Ubah Kata Sandi</span>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Kata Sandi Lama -->
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Kata Sandi Lama</label>
                                <div class="ls-inputicon-box position-relative">
                                    <input class="form-control" id="kataSandiLama" name="kata_sandi_lama" type="password" placeholder="Masukkan Kata Sandi Lama">
                                    
                                </div>
                            </div>
                        </div>
                    
                        <!-- Kata Sandi Baru -->
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Kata Sandi Baru</label>
                                <div class="ls-inputicon-box position-relative">
                                    <input class="form-control" id="kataSandiBaru" name="kata_sandi_baru" type="password" placeholder="Masukkan Kata Sandi Baru">
                                    
                                </div>
                            </div>
                        </div>
                    
                        <!-- Konfirmasi Kata Sandi Baru -->
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Konfirmasi Kata Sandi Baru</label>
                                <div class="ls-inputicon-box position-relative">
                                    <input class="form-control" id="konfirmasiKataSandiBaru" name="konfirmasi_kata_sandi_baru" type="password" placeholder="Konfirmasi Kata Sandi Baru">
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-12 col-md-12">
                            <div class="text-left">
                                <button type="submit" class="btn btn-default">Simpan</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
        </section>
    </main>

@endsection