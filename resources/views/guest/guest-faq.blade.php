@extends('guest.layout.main')
@section('content')
    <!-- Content -->
    <main class="main">
        <section class="section-box">
            <div class="container pt-50">
                <div class="w-50 w-md-100 mx-auto text-center">
                    <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">FAQs</h1>
                    <p class="mb-30 text-muted wow animate__animated animate__fadeInUp font-md">
                        {{ $faqContent->deskripsi ?? 'Cek pertanyaan yang sering diajukan di sini sebelum menghubungi kami. Berikut beberapa masalah umum yang mungkin Anda temui saat menggunakan sistem kami.' }}
                    </p>
                </div>
            </div>
        </section>
        
        <div class="faqs-imgs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="row">
                            <div class="col-lg-7">
                                <img class="faqs-1 wow animate__animated animate__fadeIn" data-wow-delay=".1s"
                                    src="{{ asset($faqContent) && $faqContent->asset_1 ? asset('storage/' . $faqContent->asset_1) : asset('assets/admin/media/svg/blank.svg') }}" alt="FAQ Image 1">
                            </div>
                            <div class="col-lg-5">
                                <img class="faqs-2 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".3s"
                                    src="{{ asset($faqContent) && $faqContent->asset_2 ? asset('storage/' . $faqContent->asset_2) : asset('assets/admin/media/svg/blank.svg') }}" alt="FAQ Image 2">
                                <img class="faqs-3 wow animate__animated animate__fadeIn" data-wow-delay=".5s"
                                    src="{{ asset($faqContent) && $faqContent->asset_3 ? asset('storage/' . $faqContent->asset_3) : asset('assets/admin/media/svg/blank.svg') }}" alt="FAQ Image 3">
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
                        <h3 class="mt-20 wow animate__animated animate__fadeInUp">Frequently Asked Questions</h3>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-5">
                        <p class="text-lg text-muted wow animate__animated animate__fadeInUp">
                            Temukan jawaban atas pertanyaan yang sering diajukan mengenai layanan kami.
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach ($faqs->chunk(ceil($faqs->count() / 2)) as $faqChunk)
                        <div class="col-lg-6">
                            <div class="accordion accordion-flush" id="accordionFlushExample{{ $loop->index }}">
                                @foreach ($faqChunk as $faq)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $loop->parent->index }}{{ $loop->index }}">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{ $loop->parent->index }}{{ $loop->index }}"
                                                aria-expanded="false"
                                                aria-controls="collapse{{ $loop->parent->index }}{{ $loop->index }}">
                                                {{ $faq->pertanyaan }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $loop->parent->index }}{{ $loop->index }}"
                                            class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $loop->parent->index }}{{ $loop->index }}"
                                            data-bs-parent="#accordionFlushExample{{ $loop->parent->index }}">
                                            <div class="accordion-body">
                                                <p class="mb-15">{{ $faq->jawaban }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        
    </main>
    <!-- End Content -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true"
        data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4" style="max-width: 100%; width: 100%;">
                <div class="modal-header border-0">
                    <div class="modal-title w-100 text-center fw-bold" style="font-size: 34px;" id="loginModalLabel">
                        Login
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <p class="text-center text-muted" style="margin-bottom: 16px;">Login dan dapatkan akses ke semua fitur
                    JobPath</p>
                <div class="modal-body">
                    <form action="{{ route('login-siswa') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="nis" class="form-control input-custom"
                                placeholder="Masukkan NIS, Email, atau Nomor Telepon">
                        </div>
                        <div class="mb-3 position-relative">
                            <input type="password" name="password" class="form-control input-custom"
                                placeholder="Password*">
                            <span class="toggle-password">
                                <i class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <a href="#" class="text-primary">Forgot Password</a>
                        </div>
                        <button type="submit" class="btn btn-default w-100 mt-3">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
