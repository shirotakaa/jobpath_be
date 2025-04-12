@extends('user.layout.main')
@section('content')

    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single box-head-single-candidate">
                <div class="container">
                    <h4 class="fs-3">Kumpulkan dan Simpan Peluang Kerja</h4>
                    <div class="row mt-15">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-muted">Simpan lowongan menarik dan kembali kapan saja untuk melanjutkan lamaran.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Pekerjaan Tersimpan</li>
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
                            <span class="tb-title fw-bold">Pekerjaan Tersimpan</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row job-listing-grid-2" id="saved-jobs-container" style="padding-top: 8px;">
                            
                        </div>                        
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        const siswaId = "{{ Auth::guard('siswa')->check() ? Auth::guard('siswa')->user()->id_siswa : '' }}";
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (!siswaId) return;
    
            const container = document.querySelector(".job-listing-grid-2");
            const savedJobs = JSON.parse(localStorage.getItem(`saved_jobs_${siswaId}`)) || [];
    
            if (savedJobs.length === 0) {
                container.innerHTML = `<p>Belum ada pekerjaan yang disimpan.</p>`;
                return;
            }
    
            container.innerHTML = "";
    
            savedJobs.forEach((job, index) => {
                const jobCard = document.createElement("div");
                jobCard.className = "col-lg-4 col-md-6";
                jobCard.innerHTML = `
                    <div class="card-grid-2 hover-up wow animate__animated animate__fadeIn">
                        <div class="card-block-info">
                            <div class="row">
                                <div class="col-lg-12 col-12" style="display: flex; justify-content: space-between; gap: 16px;">
                                    <a href="/detail-pekerjaan/${job.slug}" class="card-2-img-text card-grid-2-img-medium">
                                        <span class="card-grid-2-img-small p-0">
                                            <img src="${job.logo}" alt="${job.judul}" class="w-100 h-100 object-fit-cover" style="border-radius: 8px;">
                                        </span>
                                        <span>${job.judul}</span>
                                    </a>
                                    <div class="text-end pt-5">
                                        <button class="btn-hapus text-md text-danger border-0 bg-transparent" data-index="${index}">
                                            <i class="fi-rr-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
    
                            <div class="mt-15" style="display: flex; gap: 24px;">
                                <span class="text-brand-10">${job.perusahaan}</span>
                                <span class="text-mutted-2" style="font-size: 12px;"><i class="fi-rr-marker"></i> ${job.lokasi}</span>
                            </div>
    
                            <div class="text-small mt-15">${job.deskripsi}</div>
    
                            <div class="card-2-bottom mt-30">
                                <div class="row">
                                    <div class="col-lg-6 col-4">
                                        <span class="card-text-price">${job.gaji}<span>/Juta</span></span>
                                    </div>
                                    <div class="col-lg-6 col-8 text-end">
                                        <a href="/detail-pekerjaan/${job.slug}">
                                            <span class="text-brand-10">Lamar Sekarang</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                container.appendChild(jobCard);
            });
    
            container.addEventListener("click", function (e) {
                if (e.target.closest(".btn-hapus")) {
                    const btn = e.target.closest(".btn-hapus");
                    const index = btn.getAttribute("data-index");
    
                    Swal.fire({
                        title: "Yakin ingin menghapus?",
                        text: "Pekerjaan ini akan dihapus dari daftar tersimpan.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, hapus",
                        cancelButtonText: "Batal",
                        customClass: {
                            confirmButton: "btn swal-verif-btn",
                            cancelButton: "btn btn-secondary",
                            popup: "rounded-3xl"
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            savedJobs.splice(index, 1);
                            localStorage.setItem(`saved_jobs_${siswaId}`, JSON.stringify(savedJobs));
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>    
    
    

@endsection