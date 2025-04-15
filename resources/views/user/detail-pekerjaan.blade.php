@extends('user.layout.main')
@section('content')

    <!-- Content -->
    <main class="main">
        <section class="section-box">
            <div class="box-head-single">
                <div class="container">
                    <h3>{{ $pekerjaan->judul_pekerjaan }}</h3>
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li>Detail Pekerjaan</li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="section-box mt-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="content-single">
                            <h5>Tentang Pekerjaan</h5>
                            @foreach (explode(',', $pekerjaan->about_job) as $detail)
                                {!! $detail !!}
                            @endforeach
                            <h5>Detail Pekerjaan</h5>
                            @foreach (explode(',', $pekerjaan->detail_pekerjaan) as $detail)
                                {!! $detail !!}
                            @endforeach
                        </div>
                        <div class="single-apply-jobs">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    @if (auth()->guard('siswa')->check())
                                        @php
                                            $sudahMelamar = \DB::table('pelamar')
                                                ->where('id_siswa', auth()->guard('siswa')->user()->id_siswa)
                                                ->where('id_pekerjaan', $pekerjaan->id_pekerjaan)
                                                ->exists();
                                        @endphp
                        
                                        @if (!$sudahMelamar)
                                            <a href="#" class="btn btn-default mr-15" data-bs-toggle="modal" data-bs-target="#applyJobModal">Daftar</a>
                                        @else
                                            <button class="btn btn-secondary mr-15 btn-sudah-lamar" disabled>Sudah Melamar</button>
                                        @endif
                                    @else
                                        <a href="{{ route('siswa.login') }}" class="btn btn-warning mr-15">Login untuk Melamar</a>
                                    @endif
                        
                                    <a href="#" class="btn btn-border" id="btn-lihat-simpan">Simpan</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="single-recent-jobs">
                            <h4 class="heading-border"><span>Pekerjaan Lainnya</span></h4>
                            <div class="list-recent-jobs">
                                @foreach ($pekerjaanLain as $job)
                                    <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                        <div class="card-job-top">
                                            <div class="card-job-top--image">
                                                <figure class="rounded-circle overflow-hidden"
                                                    style="width: 50px; height: 50px;">
                                                    <img alt="{{ $job->perusahaan->nama ?? 'Perusahaan' }}"
                                                        src="{{ asset($job->perusahaan->logo ?? 'assets/imgs/employers/employer-1.png') }}"
                                                        class="w-100 h-100 object-fit-cover" />
                                                </figure>
                                            </div>
                                            <div class="card-job-top--info">
                                                <h6 class="card-job-top--info-heading">
                                                    <a href="{{ route('detail-pekerjaan', $job->judul_pekerjaan) }}">
                                                        {{ $job->judul_pekerjaan }}
                                                    </a>
                                                </h6>
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <a href="#"><span class="card-job-top--company">
                                                                {{ $job->perusahaan->nama ?? '-' }}
                                                            </span></a>
                                                        <span class="card-job-top--location text-sm">
                                                            <i class="fi-rr-marker"></i> {{ $job->lokasi }}
                                                        </span>
                                                        <span class="card-job-top--post-time text-sm">
                                                            <i class="fi-rr-clock"></i>
                                                            {{ \Carbon\Carbon::parse($job->created_at)->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-job-description mt-20">
                                            {{ \Illuminate\Support\Str::limit($job->about_job, 100) }}
                                        </div>
                                        <div class="card-job-top--info mt-15" style="padding-left: 0;">
                                            <div class="row">
                                                <div class="col-lg d-flex justify-content-between align-items-center">
                                                    <span
                                                        class="card-job-top--price">{{ $job->rentang_gaji }}<span>Juta/bulan</span></span>
                                                    <a href="{{ route('detail-pekerjaan', $job->judul_pekerjaan) }}"
                                                        class="ms-auto">
                                                        <span class="text-brand-10">Lamar Sekarang</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-12 pl-40 pl-lg-15 mt-lg-30">
                        <div class="sidebar-shadow">
                            <div class="sidebar-heading">
                                <div class="avatar-sidebar">
                                    <figure class="rounded-circle overflow-hidden" style="width: 50px; height: 50px;">
                                        <img alt="{{ $pekerjaan->judul_pekerjaan }}"
                                            src="{{ asset($pekerjaan->perusahaan->logo) }}"
                                            class="w-100 h-100 object-fit-cover" />
                                    </figure>
                                    <div class="sidebar-info">
                                        <span class="sidebar-company">{{ $pekerjaan->perusahaan->nama_perusahaan }}</span>
                                        <span class="sidebar-website-text">{{ $pekerjaan->lokasi }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="sidebar-list-job">
                                <ul>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-briefcase"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Job Title</span>
                                            <strong class="small-heading">{{ $pekerjaan->judul_pekerjaan }}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-marker"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Location</span>
                                            <strong class="small-heading">{{ $pekerjaan->lokasi }}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-dollar"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Rentang Gaji</span>
                                            <strong class="small-heading">{{ $pekerjaan->rentang_gaji }} jt</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-clock"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Waktu Posting</span>
                                            <strong
                                                class="small-heading">{{ \Carbon\Carbon::parse($pekerjaan->created_at)->diffForHumans() }}</strong>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar-icon-item"><i class="fi-rr-time-fast"></i></div>
                                        <div class="sidebar-text-info">
                                            <span class="text-description">Deadline Lowongan</span>
                                            <strong class="small-heading">{{ $pekerjaan->deadline }}</strong>
                                        </div>
                                    </li>
                                    <div class="sidebar-team-member pt-40">
                                        <h6 class="small-heading">Contact Info</h6>
                                        <div class="info-address">
                                            <span><i class="fi-rr-headset"></i>
                                                <span>{{ $pekerjaan->perusahaan->nomor_telepon }}</span></span>
                                            <span><i class="fi-rr-paper-plane"></i>
                                                <span>{{ $pekerjaan->perusahaan->email }}</span></span>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- End Content -->


    <div class="modal fade" id="applyJobModal" tabindex="-1" aria-labelledby="applyJobModalLabel" aria-hidden="true"
        data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4" style="max-width: 100%; width: 100%;">
                <div class="modal-header border-0">
                    <div class="modal-title w-100 text-center fw-bold" style="font-size: 34px;" id="applyJobModalLabel">
                        Formulir Lamaran
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pelamar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pekerjaan" value="{{ $pekerjaan->id_pekerjaan }}">
                        <input type="hidden" name="id_perusahaan" value="{{ $pekerjaan->id_perusahaan }}">
                        <input type="hidden" name="id_siswa" value="{{ auth()->guard('siswa')->user()->id_siswa }}">

                        <!-- Nama Pekerjaan -->
                        <div class="mb-3">
                            <label for="jobName" class="form-label">Nama Pekerjaan</label>
                            <input type="text" id="jobName" class="form-control input-custom"
                                value="{{ $pekerjaan->judul_pekerjaan ?? 'N/A' }}" disabled>
                        </div>

                        <!-- Nama Pelamar -->
                        <div class="mb-3">
                            <label for="applicantName" class="form-label">Nama Pelamar</label>
                            <input type="text" id="applicantName" class="form-control input-custom"
                                value="{{ auth()->guard('siswa')->user()->nama ?? 'N/A' }}" disabled>
                        </div>

                        <!-- Upload CV -->
                        <div class="mb-3">
                            <label for="uploadCV" class="form-label">Upload CV</label>
                            <input type="file" id="uploadCV" name="cv" class="form-control input-custom"
                                accept=".pdf, .doc, .docx, .png, .jpg, .jpeg" required>
                            <small class="text-muted">Format yang diterima: pdf</small>
                        </div>

                        <button type="submit" class="btn btn-default w-100 mt-3">Kirim Lamaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const btnSimpan = document.getElementById("btn-lihat-simpan");
    
            btnSimpan.addEventListener("click", function (e) {
                e.preventDefault();
    
                const siswaId = "{{ auth()->guard('siswa')->user()->id_siswa }}";
                const savedKey = `saved_jobs_${siswaId}`;
    
                const pekerjaan = {
                    slug: "{{ $pekerjaan->judul_pekerjaan }}",
                    judul: "{{ $pekerjaan->judul_pekerjaan }}",
                    perusahaan: "{{ $pekerjaan->perusahaan->nama_perusahaan ?? 'Perusahaan Tidak Diketahui' }}",
                    lokasi: "{{ $pekerjaan->lokasi }}",
                    deskripsi: `{!! Str::limit(strip_tags($pekerjaan->about_job), 135) !!}`,
                    gaji: "{{ $pekerjaan->rentang_gaji }}",
                    logo: "{{ asset($pekerjaan->perusahaan->logo ?? 'assets/user/imgs/job/default.png') }}"
                };
    
                let saved = JSON.parse(localStorage.getItem(savedKey)) || [];
    
                const exist = saved.some(j => j.slug === pekerjaan.slug);
                if (!exist) {
                    saved.push(pekerjaan);
                    localStorage.setItem(savedKey, JSON.stringify(saved));
    
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Pekerjaan disimpan ke Pekerjaan Tersimpan",
                        icon: "success",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn swal-verif-btn",
                            popup: "rounded-3xl"
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Sudah Ada!",
                        text: "Pekerjaan sudah ada di Pekerjaan Tersimpan",
                        icon: "info",
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn swal-verif-btn",
                            popup: "rounded-3xl"
                        }
                    });
                }
            });
        });
    </script>    
    <script>
        @if (session('error'))
                    < script >
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: '{{ session('error') }}',
                    });
            </script>
        @endif
    </script>


@endsection