@extends('perusahaan.layout.main')
@section('content')

    <!-- Content -->
    <main class="main">
        <section class="section-box">
            <div class="container pt-50">
                <div class="w-50 w-md-100 mx-auto text-center">
                    <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">FAQs</h1>
                    <p class="mb-30 text-muted wow animate__animated animate__fadeInUp font-md">Cek pertanyaan yang sering diajukan di sini sebelum menghubungi kami. Berikut beberapa masalah umum yang mungkin Anda temui saat menggunakan sistem kami.</p>
                </div>
            </div>
        </section>

        <div class="faqs-imgs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row">
                            <div class="col-lg-7">
                                <img class="faqs-1 wow animate__animated animate__fadeIn" data-wow-delay=".1s" src="assets/imgs/page/faqs/img-1.png" alt="">
                            </div>
                            <div class="col-lg-5">
                                <img class="faqs-2 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".3s" src="assets/imgs/page/faqs/img-2.png" alt="">
                                <img class="faqs-3 wow animate__animated animate__fadeIn" data-wow-delay=".5s" src="assets/imgs/page/faqs/img-3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="mt-80">
            <div class="container">
                <div class="row align-items-end mb-50">
                    <div class="col-lg-5">
                        <span class="text-blue wow animate__animated animate__fadeInUp">Questions</span>
                        <h3 class="mt-20 wow animate__animated animate__fadeInUp">Frequently Ask Questions</h3>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <p class="text-lg text-muted wow animate__animated animate__fadeInUp">
                            Temukan jawaban atas pertanyaan yang sering diajukan mengenai layanan kami.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Bagaimana cara perusahaan mendaftar dan memasang lowongan pekerjaan di JobPath?
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p class="mb-15">
                                            Perusahaan dapat mendaftar dengan membuat akun di JobPath. Setelah akun diverifikasi, perusahaan bisa langsung memasang lowongan pekerjaan dengan mengisi detail posisi yang dibutuhkan, kualifikasi, dan informasi lainnya.
                                        </p>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Bagaimana cara perusahaan meninjau lamaran yang masuk?
                                    </button>
                                </h2>
                                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Perusahaan dapat melihat semua lamaran yang masuk melalui dashboard. Setiap lamaran dilengkapi dengan CV dan data pelamar untuk memudahkan proses seleksi.
                                    </div>
                                </div>
                            </div>
                    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Apakah ada biaya untuk memasang lowongan pekerjaan?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        JobPath menyediakan opsi gratis dan berbayar untuk memasang lowongan. Opsi berbayar memberikan fitur tambahan seperti peningkatan visibilitas, akses ke database kandidat, dan promosi lowongan.
                                    </div>
                                </div>
                            </div>
                    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                        Apakah perusahaan bisa menghubungi pelamar langsung?
                                    </button>
                                </h2>
                                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        Ya, setelah meninjau lamaran, perusahaan dapat menghubungi pelamar langsung melalui email atau nomor telepon yang disediakan di profil mereka.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="accordion accordion-flush" id="accordionFlushExample2">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne2">
                                        Bagaimana jika perusahaan ingin menghapus atau mengedit lowongan yang telah dipasang?
                                    </button>
                                </h2>
                                <div id="flush-collapseOne2" class="accordion-collapse collapse" aria-labelledby="flush-headingOne2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        <p class="mb-15">
                                            Perusahaan bisa mengelola lowongan yang telah dipasang melalui dashboard akun mereka. Lowongan dapat diperbarui, diperpanjang, atau dihapus kapan saja sesuai kebutuhan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree2" aria-expanded="false" aria-controls="flush-collapseThree2">
                                        Bagaimana cara perusahaan meninjau lamaran yang masuk?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree2" class="accordion-collapse collapse" aria-labelledby="flush-headingThree2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        Perusahaan dapat melihat semua lamaran yang masuk melalui dashboard. Setiap lamaran dilengkapi dengan CV dan data pelamar untuk memudahkan proses seleksi.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingThree2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree2" aria-expanded="false" aria-controls="flush-collapseThree2">
                                        Apakah perusahaan dapat mengatur jadwal wawancara melalui platform ini?
                                    </button>
                                </h2>
                                <div id="flush-collapseThree2" class="accordion-collapse collapse" aria-labelledby="flush-headingThree2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        Ya, JobPath memiliki fitur penjadwalan wawancara yang memungkinkan perusahaan untuk mengirim undangan wawancara dan mengelola jadwal langsung dari dashboard mereka.
                                    </div>
                                </div>
                            </div>
                    
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingFour2">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour2" aria-expanded="false" aria-controls="flush-collapseFour2">
                                        Apa keuntungan bagi perusahaan yang menggunakan JobPath?
                                    </button>
                                </h2>
                                <div id="flush-collapseFour2" class="accordion-collapse collapse show" aria-labelledby="flush-headingFour2" data-bs-parent="#accordionFlushExample2">
                                    <div class="accordion-body">
                                        <p class="mb-15">
                                            JobPath membantu perusahaan dalam proses rekrutmen dengan mempermudah posting lowongan pekerjaan serta menjangkau kandidat yang sesuai dari suatu lembaga pendididkan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>       
    </main>
    <!-- End Content -->

@endsection