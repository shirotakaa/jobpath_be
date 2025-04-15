@extends('user.layout.main')
@section('content')
    <main class="main">
        <section class="section-box-2">
            <div class="box-head-single box-head-single-candidate">
                <div class="container">
                    <h4 class="fs-3">Kelola dan Pantau Status Lamaran Pekerjaan Anda</h4>
                    <div class="row mt-15">
                        <div class="col-lg-7 col-md-9">
                            <span class="text-muted">Lihat daftar pekerjaan yang telah Anda lamar dan pantau
                                perkembangan proses rekrutmen dengan mudah.</span>
                        </div>
                        <div class="col-lg-5 col-md-3 text-lg-end text-start">
                            <ul class="breadcrumbs mt-sm-15">
                                <li><a href="#">Home</a></li>
                                <li>Lamaran Saya</li>
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
                            <span class="tb-title fw-bold">Lamaran Pekerjaan Saya</span>
                        </div>
                    </div>
                    <div class="tb-table-responsive tb-container">
                        <div class="table-wrapper">
                            <table class="tb-table datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Job</th>
                                        <th class="text-center">Detail Job</th>
                                        <th class="text-center">CV</th>
                                        <th class="text-center">Deadlline Job</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Kelanjutan</th>
                                    </tr>
                                </thead>
                                @foreach ($lamaran as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $data->judul_pekerjaan }}</td>
                                        <td>
                                            <button class="btn btn-small hover-up btn-blue view-job" data-bs-toggle="modal"
                                                data-bs-target="#jobDetailModal" data-lokasi="{{ $data->lokasi }}"
                                                data-gaji="{{ $data->rentang_gaji }}" data-about_job="{{ $data->about_job }}">
                                                Lihat
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-small btn-yellow hover-up" data-bs-toggle="modal"
                                                data-bs-target="#cvModal-{{ $data->id_pelamar }}">
                                                Lihat
                                            </button>
                                        </td>
                                        <td>{{ $data->deadline }}</td>
                                        <td>
                                            @if ($data->status_lamaran == 'Approved')
                                                <span class="btn-small background-12 rounded-pill">Diterima</span>
                                            @elseif ($data->status_lamaran == 'Rejected')
                                                <span class="btn-small background-urgent rounded-pill">Ditolak</span>
                                            @else
                                                <span class="btn-small background-6 rounded-pill">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-small btn-default hover-up" data-bs-toggle="modal"
                                                data-bs-target="#kelanjutanModal-{{ $data->id_pelamar }}">
                                                Lihat
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="cvModal-{{ $data->id_pelamar }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Lihat CV</h5>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe src="{{ asset('storage/' . $data->cv) }}" width="100%"
                                                        height="500px"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal Kelanjutan -->
                                    <div class="modal fade" id="kelanjutanModal-{{ $data->id_pelamar }}" tabindex="-1"
                                        aria-labelledby="kelanjutanModalLabel-{{ $data->id_pelamar }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-5"
                                                        id="kelanjutanModalLabel-{{ $data->id_pelamar }}">Catatan
                                                        Perusahaan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="m-2">
                                                        @if ($data->status_lamaran == 'Approved')
                                                            <div class="alert alert-success d-flex align-items-center"
                                                                role="alert">
                                                                <i class="bi bi-check-circle-fill me-2"></i>
                                                                <div>
                                                                    Selamat! Anda telah diterima dan dapat segera bergabung
                                                                    dengan perusahaan.
                                                                </div>
                                                            </div>
                                                        @elseif ($data->status_lamaran == 'Rejected')
                                                            <div class="alert alert-danger d-flex align-items-center"
                                                                role="alert">
                                                                <i class="bi bi-x-circle-fill me-2"></i>
                                                                <div>
                                                                    Maaf, Anda telah ditolak.
                                                                </div>
                                                            </div>
                                                        @endif

                                                        <p class="mb-2"><strong>Langkah Selanjutnya:</strong></p>
                                                        <ul>
                                                            @foreach (explode(',', $data->kelanjutan) as $kelanjutan)
                                                                <li>{!! $kelanjutan !!}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>

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
                        <button type="button" class="btn btn-default" id="saveJobDetails">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Detail -->
        <div class="modal fade" id="jobDetailModal" tabindex="-1" aria-labelledby="jobDetailModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="jobDetailModalLabel">Detail Pekerjaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>:</td>
                                    <td id="modal-lokasi"></td>
                                </tr>
                                <tr>
                                    <th>Rentang Gaji</th>
                                    <td>:</td>
                                    <td id="modal-gaji"></td>
                                </tr>
                                <tr>
                                    <th>About Job</th>
                                    <td>:</td>
                                    <td id="modal-about"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".view-job").forEach(button => {
                button.addEventListener("click", function() {
                    // Ambil data dari atribut data-*
                    let lokasi = this.getAttribute("data-lokasi");
                    let gaji = this.getAttribute("data-gaji");
                    let about = this.getAttribute("data-about_job");

                    // Masukkan data ke dalam modal
                    document.getElementById("modal-lokasi").textContent = lokasi;
                    document.getElementById("modal-gaji").textContent = gaji;
                    document.getElementById("modal-about").textContent = about;
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    text: "{{ session('success') }}",
                    icon: "success",
                    buttonsStyling: false,
                    showConfirmButton: false,
                    timer: 2000,
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                });
            @endif
        });
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
        $(document).ready(function() {
            $('.view-job').click(function() {
                var pelamarId = $(this).data('id'); // Ambil ID pelamar

                $.ajax({
                    url: '/get-pelamar-detail/' + pelamarId, // Endpoint untuk mengambil data
                    type: 'GET',
                    success: function(response) {
                        console.log(response); // Cek data di console browser

                        if (response) {
                            $('#modal-lokasi').text(response.lokasi ?? 'Tidak tersedia');
                            $('#modal-gaji').text(response.rentang_gaji ?? 'Tidak tersedia');
                            $('#modal-about').text(response.about_job ?? 'Tidak tersedia');
                            $('#jobDetailModal').modal('show');
                        } else {
                            alert("Data tidak ditemukan.");
                        }
                    },
                    error: function() {
                        alert("Terjadi kesalahan saat mengambil data.");
                    }
                });
            });
        });
    </script>

    {{-- <!-- Alert -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".btn-delete").forEach(button => {
                button.addEventListener("click", function () {
                    Swal.fire({
                        title: "<span style='color: #b45c5c;'>Apakah Anda yakin?</span>",
                        html: "Data ini akan dihapus dan tidak dapat dikembalikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal",
                        customClass: {
                            popup: "rounded-3xl",
                            confirmButton: "btn swal-confirm-delete",
                            cancelButton: "btn swal-cancel-delete"
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Terhapus!",
                                text: "Data telah berhasil dihapus.",
                                icon: "success",
                                timer: 1300,
                                showConfirmButton: false,
                                customClass: {
                                    popup: "rounded-3xl"
                                }
                            });
                        }
                    });

                });
            });
        });
    </script> --}}
@endsection
