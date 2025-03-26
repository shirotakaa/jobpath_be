@extends('perusahaan.layout.main')
@section('content')
    <style>
        .ck-toolbar button.ck-button[data-cke-tooltip-text="Insert media"],
        .ck-toolbar button.ck-button[data-cke-tooltip-text="Block quote"],
        .ck-toolbar button.ck-button[data-cke-tooltip-text="Insert image"] {
            display: none !important;
        }

        .editor-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        .editor-toolbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: white;
            z-index: 1000;
            padding: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .editor-content {
            margin-top: 70px;
            /* Sesuaikan dengan tinggi toolbar */
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            background: #fff;
        }
    </style>

    <main class="main">
        <div class="breacrumb-cover">
            <div class="container">
                <ul class="breadcrumbs">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Daftar Pekerjaan</a></li>
                    <li>Tambah Pekerjaan</li>
                </ul>
            </div>
        </div>
        <section class="section-box">
            <div class="container pt-50 pb-50">
                <div class="tb-container">
                    @if ($errors->any())
                        <div class="w-full p-4 mb-4 text-red-700 bg-red-100 border border-red-400 rounded-lg">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row mb-20">
                        <div class="col-6 d-flex align-items-center">
                            <span class="tb-title fw-bold fs-5">Tambah Pekerjaan</span>
                        </div>
                    </div>
                    <div class="tb-table-responsive tb-container">
                        <div class="table-wrapper">
                            <form id="uploadForm" action="{{ route('pekerjaan.storeUser') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_perusahaan"
                                    value="{{ auth('perusahaan')->user()->id_perusahaan ?? '' }}">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-description">Nama Pekerjaan</label>
                                            <div class="ls-inputicon-box">
                                                <input class="form-control" name="judul_pekerjaan" type="text"
                                                    placeholder="Masukkan nama pekerjaan" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-description">Deadline</label>
                                            <div class="ls-inputicon-box">
                                                <input class="form-control datepicker" name="deadline" type="date"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-description">Gaji Minimal</label>
                                            <div class="ls-inputicon-box">
                                                <input class="form-control" name="min_salary" type="number" min="0"
                                                    placeholder="Masukkan gaji minimal" maxlength="1" required>
                                                <p class="text-gray-200" style="font-size: 13px">
                                                    <i class="fas fa-exclamation-circle text-warning"></i> Inputkan gaji
                                                    max 3 angka
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-description">Gaji Maksimal</label>
                                            <div class="ls-inputicon-box">
                                                <input class="form-control" name="max_salary" type="number" min="0"
                                                    placeholder="Masukkan gaji maksimal" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-description">Alamat</label>
                                            <div class="ls-inputicon-box">
                                                <input class="form-control" name="alamat" type="text"
                                                    placeholder="Masukkan alamat" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="text-description">Kategori</label>
                                            <div class="ls-inputicon-box">
                                                <select class="form-control" name="category" required>
                                                    <option value="">Pilih Kategori</option>
                                                    <option value="Design">Design</option>
                                                    <option value="Marketing">Marketing</option>
                                                    <option value="Technology">Technology</option>
                                                    <option value="Engineering">Engineering</option>
                                                    <option value="Finance">Finance</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="text-description">About Job</label>
                                            <textarea class="form-control" name="about_job" placeholder="Deskripsi singkat tentang pekerjaan" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="text-description">Detail Pekerjaan</label>
                                            <textarea id="detail-job-editor" class="form-control" name="detail_pekerjaan"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="justify-content-end d-flex">
                                            <button type="submit" class="btn btn-default btn-upload">Upload
                                                Pekerjaan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>

    </main>

@endsection


@section('script')
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Text Editor -->
    <script>
        ClassicEditor
            .create(document.querySelector('#detail-job-editor'))
            .then(editor => {
                console.log('CKEditor berhasil dimuat:', editor);
                window.jobDetailEditor = editor;
            })
            .catch(error => {
                console.error('Error CKEditor:', error);
            });
    </script>

    <!-- Alert -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".btn-upload").addEventListener("click", function(event) {
                event.preventDefault(); // Mencegah submit langsung

                let inputs = document.querySelectorAll(
                    "input[required], select[required], textarea[required]");
                let isValid = true;
                let message = "Harap isi semua field yang diperlukan!";

                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        isValid = false;
                        input.classList.add("is-invalid");
                    } else {
                        input.classList.remove("is-invalid");
                    }
                });

                // Cek jika menggunakan TinyMCE
                if (typeof tinymce !== "undefined") {
                    let editor = tinymce.get("detail-job-editor"); // Ambil instance TinyMCE
                    if (editor) {
                        let editorContent = editor.getContent({
                            format: "text"
                        }).trim(); // Ambil teks tanpa HTML
                        if (editorContent === "") {
                            isValid = false;
                            message = "Harap isi Detail Pekerjaan!";
                        }
                    }
                }

                if (!isValid) {
                    Swal.fire({
                        title: "Peringatan!",
                        text: message,
                        icon: "warning",
                        confirmButtonText: "OK",
                        customClass: {
                            popup: "rounded-3xl",
                            confirmButton: "btn swal-verif-btn"
                        }
                    });
                    return; // Hentikan proses jika ada field yang kosong
                }

                Swal.fire({
                    title: "<span style='color: #9777fa;'>Konfirmasi Upload</span>",
                    html: "Apakah Anda yakin ingin mengunggah pekerjaan ini?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Upload!",
                    cancelButtonText: "Batal",
                    customClass: {
                        popup: "rounded-3xl",
                        confirmButton: "btn swal-verif-btn",
                        cancelButton: "btn swal-cancel-verif-btn"
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Pekerjaan telah berhasil dikirim. Tunggu verifikasi admin sebelum pekerjaan ditampilkan.",
                            icon: "success",
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn swal-verif-btn",
                                popup: "rounded-3xl"
                            }
                        }).then(() => {
                            document.getElementById("uploadForm")
                        .submit(); // Submit form jika dikonfirmasi
                        });
                    }
                });
            });
        });
    </script>

    <!-- Limit input number to one digit -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function limitToOneDigit(input) {
                input.addEventListener("input", function() {
                    if (this.value.length > 3) {
                        this.value = this.value.slice(0, 3); // Hanya ambil karakter pertama
                    }
                });
            }

            let minSalaryInput = document.querySelector("input[name='min_salary']");
            let maxSalaryInput = document.querySelector("input[name='max_salary']");

            if (minSalaryInput) limitToOneDigit(minSalaryInput);
            if (maxSalaryInput) limitToOneDigit(maxSalaryInput);
        });
    </script>
@endsection
