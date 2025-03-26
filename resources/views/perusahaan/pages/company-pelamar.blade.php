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
        <section class="section-box-2">
            <div class="box-head-single box-head-single-candidate">
                <div class="container">
                    <h4 class="fs-3">Seleksi Pelamar Terbaik untuk Perusahaan Anda</h4>
                    <div class="row mt-15">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-muted">Kelola dan tinjau daftar pelamar yang telah mengajukan lamaran
                                untuk berbagai posisi di perusahaan Anda.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Daftar Pelamar</li>
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
                            <span class="tb-title fw-bold">Daftar Semua Pelamar</span>
                        </div>
                    </div>
                    <div class="tb-table-responsive tb-container">
                        <div class="table-wrapper">
                            <table class="tb-table datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Job</th>
                                        <th class="text-center">Nama Pelamar</th>
                                        <th class="text-center">CV</th>
                                        <th class="text-center">Verifikasi Lamaran</th>
                                        <th class="text-center">Tindak Lanjut</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelamar as $key => $p)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $p->pekerjaan->judul_pekerjaan ?? 'N/A' }}</td>
                                            <td>{{ $p->siswa->nama ?? 'N/A' }}</td>
                                            <td>
                                                <button class="btn btn-small hover-up btn-blue" data-bs-toggle="modal"
                                                    data-bs-target="#cvModal-{{ $p->id_pelamar }}">
                                                    Lihat
                                                </button>
                                            </td>
                                            <td>
                                                @if ($p->status_lamaran == 'Pending')
                                                    <button onclick="confirmStatusChange({{ $p->id_pelamar }})"
                                                        class="btn btn-small hover-up btn-pending">
                                                        Verifikasi
                                                    </button>
                                                @elseif($p->status_lamaran == 'Approved')
                                                    <span class="btn-small background-12 rounded-pill">
                                                        Approved
                                                    </span>
                                                @elseif($p->status_lamaran == 'Rejected')
                                                    <span class="btn-small background-urgent rounded-pill">
                                                        Rejected
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($p->status_lamaran == 'Pending')
                                                    <button class="btn btn-small hover-up btn-pending" disabled>
                                                        Respon
                                                    </button>
                                                @elseif($p->status_lamaran == 'Approved')
                                                    <button class="btn btn-small hover-up btn-default"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#tindakLanjutModal-{{ $p->id_pelamar }}">
                                                        Respon
                                                    </button>
                                                @elseif($p->status_lamaran == 'Rejected')
                                                    <button class="btn btn-small hover-up btn-pending" disabled>
                                                        Respon
                                                    </button>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('pelamar.destroy', ['id_pelamar' => $p->id_pelamar]) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-tb btn-table-danger btn-delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>                                            
                                        </tr>

                                        <!-- Modal CV -->
                                        <div class="modal fade" id="cvModal-{{ $p->id_pelamar }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Lihat CV</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{ asset('storage/' . $p->cv) }}" width="100%"
                                                            height="500px"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Respon -->
                                        <div class="modal fade" id="tindakLanjutModal-{{ $p->id_pelamar }}" tabindex="-1"
                                            aria-labelledby="modalLabel-{{ $p->id_pelamar }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel-{{ $p->id_pelamar }}">Respon
                                                            Lamaran</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="updateKelanjutanForm-{{ $p->id_pelamar }}" method="POST"
                                                            action="{{ route('pelamar.update-kelanjutan', $p->id_pelamar) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label class="form-label">Tulis catatan selanjutnya untuk
                                                                    pelamar</label>
                                                                <textarea id="job-editor-{{ $p->id_pelamar }}" class="form-control job-editor" name="kelanjutan" rows="3">{{ old('kelanjutan', $p->kelanjutan) }}</textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Kirim</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    text: "{{ session('success') }}",
                    icon: "success",
                    buttonsStyling: false,
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                });
            @endif
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".btn-delete").forEach(button => {
                button.addEventListener("click", function (event) {
                    event.preventDefault();
                    let form = this.closest("form");
    
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data ini akan dihapus secara permanen!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script>
        function confirmStatusChange(id) {
            Swal.fire({
                title: "<span style='color: #9777fa;'>Terima Pelamar?</span>",
                html: "Setelah menerima, segera lanjutkan tindak lanjut proses dengan mengirimkan pesan kepada pelamar.",
                icon: "question",
                showCancelButton: true,
                confirmButtonText: "Ya, Terima!",
                cancelButtonText: "Tolak",
                customClass: {
                    popup: "rounded-3xl",
                    confirmButton: "btn swal-verif-btn",
                    cancelButton: "btn swal-cancel-verif-btn"
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    changeStatus(id, "approved");
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    changeStatus(id, "rejected");
                }
            });
        }

        function changeStatus(id, action) {
            let form = document.createElement("form");
            form.method = "POST";
            form.action = "/pelamar/" + id + "/" + action;

            // Tambahkan CSRF Token
            let csrfToken = document.createElement("input");
            csrfToken.type = "hidden";
            csrfToken.name = "_token";
            csrfToken.value = "{{ csrf_token() }}";
            form.appendChild(csrfToken);

            // Tambahkan metode PUT
            let methodInput = document.createElement("input");
            methodInput.type = "hidden";
            methodInput.name = "_method";
            methodInput.value = "PUT";
            form.appendChild(methodInput);

            document.body.appendChild(form);
            form.submit();

            // Alert setelah proses submit
            Swal.fire({
                text: action === "approved" ?
                    "Pelamar telah diterima dan bisa ditindaklanjuti." :
                    "Pelamar telah ditolak.",
                icon: action === "approved" ? "success" : "error",
                timer: action === "rejected" ? 1500 : undefined,
                showConfirmButton: action !== "rejected",
                customClass: {
                    popup: "rounded-3xl",
                    confirmButton: "btn swal-verif-btn"
                }
            });
        }
    </script>

    <!-- Datatables -->
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25, 50],
                "language": {
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data",
                    "search": "Cari:",
                    "paginate": {
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>

    <!-- Text Editor -->
    <script>
        document.querySelectorAll('.job-editor').forEach(textarea => {
            ClassicEditor
                .create(textarea)
                .then(editor => {
                    console.log('CKEditor berhasil dimuat:', editor);
                    if (!window.jobEditors) {
                        window.jobEditors = {};
                    }
                    window.jobEditors[textarea.id] = editor;
                })
                .catch(error => {
                    console.error('Error CKEditor:', error);
                });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".update-kelanjutan").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let form = document.getElementById(`updateKelanjutanForm-${id}`);

                    Swal.fire({
                        text: "Apakah Anda yakin ingin memperbarui catatan ini?",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonText: "Ya, Kirim",
                        cancelButtonText: "Batal",
                        backdrop: true,
                        allowOutsideClick: false,
                        customClass: {
                            popup: "rounded-3xl",
                            confirmButton: "btn swal-verif-btn",
                            cancelButton: "btn swal-cancel-verif-btn"
                        },
                        didOpen: () => {
                            document.querySelector('.swal2-container').style.zIndex =
                                '9999'; // Munculkan Swal di depan modal
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form
                        .submit(); // Kirim form langsung agar Laravel menangani return back()
                        }
                    });
                });
            });
        });
    </script>
@endsection
