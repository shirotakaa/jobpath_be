@extends('perusahaan.layout.main')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single box-head-single-candidate">
                <div class="container">
                    <h4 class="fs-3">Kelola Lowongan dan Temukan Talenta Terbaik!"</h4>
                    <div class="row mt-15">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-mutted">Buka peluang bagi kandidat terbaik dengan menambahkan dan
                                mengelola daftar pekerjaan perusahaan Anda dengan mudah.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="{{ route('company.landing') }}">Home</a></li>
                                <li>Daftar Pekerjaan</li>
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
                            <span class="tb-title fw-bold">Daftar Pekerjaan Saya</span>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('company.addjob') }}" class="btn btn-default btn-md">
                                <i class="fa fa-plus"></i> Tambah Job
                            </a>
                        </div>
                    </div>
                    <div class="tb-table-responsive tb-container">
                        <div class="table-wrapper">
                            <table class="tb-table datatable" id="DataTables_Table_0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Job</th>
                                        <th class="text-center">Detail Job</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Deadline</th>
                                        <th class="text-center">Terverifikasi Admin</th>
                                        <th class="text-center">Status Job</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pekerjaan as $key => $job)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $job->judul_pekerjaan }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-small hover-up btn-blue" data-bs-toggle="modal"
                                                    data-bs-target="#jobDetailModal-{{ $job->id_pekerjaan }}">
                                                    Lihat
                                                </button>
                                            </td>
                                            <td class="text-center">{{ $job->kategori }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($job->deadline)->format('d/m/Y') }}
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="btn-small {{ $job->verifikasi == 'Pending' ? 'background-6' : ($job->verifikasi == 'Rejected' ? 'background-urgent' : 'background-12') }}">
                                                    {{ ucfirst($job->verifikasi) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="btn-small {{ $job->status == 'Available' && $job->verifikasi == 'Approved'
                                                        ? 'background-12 active-btn'
                                                        : ($job->status == 'Expired' && $job->verifikasi == 'Rejected'
                                                            ? 'background-urgent'
                                                            : 'background-6') }}">
                                                    {{ ucfirst($job->status) }}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <form
                                                    action="{{ route('pekerjaan.deletejob', ['id' => $job->id_pekerjaan]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-tb btn-table-danger btn-delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- MODAL HARUS DI LUAR TABLE -->
        @foreach ($pekerjaan as $job)
            <div class="modal fade" id="jobDetailModal-{{ $job->id_pekerjaan }}" tabindex="-1"
                aria-labelledby="jobDetailModalLabel-{{ $job->id_pekerjaan }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="jobDetailModalLabel-{{ $job->id_pekerjaan }}">
                                Detail Pekerjaan - {{ $job->judul_pekerjaan }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Lokasi</th>
                                        <td>{{ $job->lokasi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rentang Gaji</th>
                                        <td>{{ $job->rentang_gaji }}</td>
                                    </tr>
                                    <tr>
                                        <th>Deskripsi</th>
                                        <td>{{ $job->about_job }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


        <!-- Modal Edit -->
        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="modalEditLabel">Edit Pekerjaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Nama Pekerjaan</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Pekerjaan"
                                    id="jobName" value="UI Designer">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="jobLocation"
                                    placeholder="Masukkan Lokasi Perusahaan" value="Jakarta">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rentang Gaji (Rp)</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Minimal</label>
                                        <input type="number" class="form-control" id="minSalary" placeholder="0"
                                            value="8000000">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-muted">Maksimal</label>
                                        <input type="number" class="form-control" id="maxSalary" placeholder="0"
                                            value="12000000">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">About Job</label>
                                <textarea class="form-control h-50" id="aboutJob">Deskripsi pekerjaan untuk UI Designer...</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Detail Job</label>
                                <textarea id="detail-job-editor">
                                    Ini adalah teks default yang sudah ada saat halaman dimuat.
                                </textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-edit" id="saveJobDetails">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <!-- Modal Detail -->
        <div class="modal fade" id="jobDetailModal-{{ $job->id_pekerjaan }}" tabindex="-1"
            aria-labelledby="jobDetailModalLabel-{{ $job->id_pekerjaan }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="jobDetailModalLabel-{{ $job->id_pekerjaan }}">Detail Pekerjaan
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>:</td>
                                    <td>{{ $job->lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Rentang Gaji</th>
                                    <td>:</td>
                                    <td>{{ $job->rentang_gaji }}</td>
                                </tr>
                                <tr>
                                    <th>About Job</th>
                                    <td>:</td>
                                    <td>{{ $job->about_job }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main> --}}


        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Datatables -->
        <script>
            $(document).ready(function() {
                $('.datatable').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "lengthMenu": [5, 10, 25, 50],
                    "autoWidth": false, // Mencegah perhitungan kolom otomatis yang bisa menyebabkan error
                    "columnDefs": [{
                            "orderable": false,
                            "targets": [2, 7]
                        } // Matikan sorting di kolom "Detail Job" dan "Aksi"
                    ],
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
        <!-- Alert -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll(".btn-delete").forEach(button => {
                    button.addEventListener("click", function(event) {
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
            document.addEventListener("DOMContentLoaded", function() {
                document.querySelectorAll(".btn-edit").forEach(button => {
                    button.addEventListener("click", function(event) {
                        event.preventDefault(); // Mencegah submit langsung

                        Swal.fire({
                            title: "<span style='color: #9777fa;'>Konfirmasi Edit</span>",
                            html: "Apakah Anda yakin ingin mengedit pekerjaan ini?",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonText: "Ya, Edit!",
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
                                    text: "Pekerjaan telah berhasil diperbarui.",
                                    icon: "success",
                                    timer: 1300, // Otomatis hilang setelah 1.3 detik
                                    showConfirmButton: false,
                                    customClass: {
                                        popup: "rounded-3xl"
                                    }
                                }).then(() => {
                                    document.getElementById("editForm")
                                        .submit(); // Submit form jika dikonfirmasi
                                });
                            }
                        });
                    });
                });
            });
        </script>
    @endsection
