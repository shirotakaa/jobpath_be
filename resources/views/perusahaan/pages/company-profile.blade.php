@extends('perusahaan.layout.main')
@section('content')

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
                <div class="tb-container">
                    <div class="row mb-20">
                        <div class="col-6 d-flex align-items-center">
                            <span class="tb-title fw-bold">Profil Saya</span>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Nama Perusahaan -->
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <div class="ls-inputicon-box">
                                    <input class="form-control" name="company_name" type="text" placeholder="Masukkan Nama Perusahaan" value="PT. Maju Jaya">
                                </div>
                            </div>
                        </div>
                    
                        <!-- Email Perusahaan -->
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Email Perusahaan</label>
                                <div class="ls-inputicon-box">
                                    <input class="form-control" name="company_email" type="email" placeholder="Masukkan Email Perusahaan" value="info@majujaya.com">
                                </div>
                            </div>
                        </div>
                    
                        <!-- Nomor Telepon -->
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <div class="ls-inputicon-box">
                                    <input class="form-control" name="company_phone" type="text" placeholder="Masukkan Nomor Telepon" value="081234567890">
                                </div>
                            </div>
                        </div>
                    
                        <!-- Alamat Perusahaan -->
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Alamat Perusahaan</label>
                                <div class="ls-inputicon-box">
                                    <input class="form-control" name="company_address" type="text" placeholder="Masukkan Alamat Perusahaan" value="Jl. Raya No.123, Jakarta">
                                </div>
                            </div>
                        </div>
                    
                        <!-- Tombol Simpan -->
                        <div class="col-lg-12 col-md-12">
                            <div class="text-left">
                                <button type="submit" class="btn btn-default">Simpan</button>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </section>
    </main>

@endsection