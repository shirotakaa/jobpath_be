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
                                <div class="col-md-5">
                                    <a href="#" class="btn btn-default mr-15" data-bs-toggle="modal"
                                        data-bs-target="#applyJobModal">Daftar</a>
                                    <a href="#" class="btn btn-border">Simpan</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-recent-jobs">
                            <h4 class="heading-border"><span>Pekerjaan Lainnya</span></h4>
                            {{-- <div class="list-recent-jobs">
                                @foreach ($pekerjaan as $job)
                                <div class="card-job hover-up wow animate__animated animate__fadeInUp">
                                    <div class="card-job-top">
                                        <div class="card-job-top--info">
                                            <h6 class="card-job-top--info-heading"><a
                                                    href="{{ route('detail-pekerjaan', $job->id_pekerjaan) }}">{{
                                                    $job->judul }}</a></h6>
                                            <div class="row">
                                                <div class="col-lg-7">
                                                    <a href="#"><span class="card-job-top--company">{{
                                                            $job->perusahaan->nama }}</span></a>
                                                    <span class="card-job-top--location text-sm"><i
                                                            class="fi-rr-marker"></i> {{ $job->lokasi }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div> --}}
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
                                {{-- <div class="sidebar-info">
                                    <span class="sidebar-company">{{ $pekerjaan->perusahaan->nama_perusahaan }}</span>
                                    <span class="sidebar-website-text">{{ $pekerjaan->lokasi }}</span>
                                </div> --}}
                            </div>
                            <div class="text-start mt-20">
                                <a href="#" class="btn btn-default mr-15" data-bs-toggle="modal"
                                    data-bs-target="#applyJobModal">Daftar</a>
                                <a href="#" class="btn btn-border">Simpan</a>
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

@endsection
