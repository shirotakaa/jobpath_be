@extends('admin.layout.main')
@section('content')
    <style>
        /* Sembunyikan tombol upload gambar dari komputer */
        button.ck-file-dialog-button {
            display: none !important;
        }

        /* Sembunyikan tombol Insert Media */
        button.ck-dropdown__button[data-cke-tooltip-text="Insert media"] {
            display: none !important;
        }

        /* Sembunyikan tombol Block Quote */
        button.ck-button[data-cke-tooltip-text="Block quote"] {
            display: none !important;
        }

        /* Styling untuk editor di Modal Tambah */
        #modalTambah #ckeditor_5 {
            min-height: 200px;
            border: 1px solid #ddd;
            padding: 10px;
            background: #f9f9f9;
        }

        /* Styling untuk editor di Modal Edit */
        #modalEdit #ckeditor_5_edit {
            min-height: 200px;
            border: 1px solid #ddd;
            padding: 10px;
            background: #e9f7fe;
        }

        /* Container editor */
        .editor-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        /* Toolbar editor tetap di atas */
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

        /* Konten editor dengan batasan tinggi dan scrolling */
        .editor-content {
            margin-top: 70px;
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
            background: #fff;
        }
    </style>

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <div id="kt_app_content" class="app-content flex-column-fluid pt-10">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <div class="card card-flush">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title mobile-full-width">
                                <div class="d-flex align-items-center position-relative my-1 mobile-full-width">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" table-search="search"
                                        class="form-control form-control-solid input-sm ps-12" placeholder="Cari..." />
                                </div>
                            </div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalTambah">
                                    Tambah Pekerjaan
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="faq-tabs">
                                    <button class="btn btn-light-primary me-2" id="copyBtn">Copy</button>
                                    <button class="btn btn-light-primary me-2" id="excelBtn">Excel</button>
                                    <button class="btn btn-light-primary me-2" id="pdfBtn">PDF</button>
                                    <button class="btn btn-light-primary me-2" id="printBtn">Print</button>
                                    <button class="btn btn-light-primary dropdown-toggle" id="colVisBtn"
                                        data-bs-toggle="dropdown">
                                        Column Visibility
                                    </button>
                                    <div class="dropdown-menu" id="colVisDropdown">
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-start min-w-50px">Logo</th>
                                            <th class="text-start min-w-100px">Nama Pekerjaan</th>
                                            <th class="text-start min-w-70px">Nama Perusahaan</th>
                                            <th class="text-start min-w-70px">Kategori</th>
                                            <th class="text-start min-w-70px">Lokasi</th>
                                            <th class="text-start min-w-70px">Deadline Lowongan</th>
                                            <th class="text-start min-w-100px">Rentang Gaji</th>
                                            <th class="text-start min-w-100px">About Job</th>
                                            <th class="text-start min-w-100px">Detail Pekerjaan</th>
                                            <th class="text-start min-w-100px">Verifikasi Job</th>
                                            <th class="text-start min-w-40px">Status</th>
                                            <th class="text-end min-w-70px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($pekerjaan as $item)
                                            <tr>
                                                <td class="d-flex justify-content-start">
                                                    <div class="d-flex align-items-center">
                                                        @if ($item->perusahaan->logo)
                                                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                                                href="{{ $item->perusahaan->logo }}">
                                                                <div class="symbol symbol-100px">
                                                                    <img src="{{ $item->perusahaan->logo }}"
                                                                        style="width: 70px; height: 50px;"
                                                                        class="object-fit-cover">
                                                                </div>
                                                                <div
                                                                    class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                    <i class="bi bi-eye-fill text-white"></i>
                                                                </div>
                                                            </a>
                                                        @else
                                                            <span class="text-muted">Tidak ada logo</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="text-start">{{ $item->judul_pekerjaan }}</td>
                                                <td class="text-start">{{ $item->perusahaan->nama_perusahaan }}</td>
                                                <td class="text-start">{{ $item->kategori }}</td>
                                                <td class="text-start">{{ $item->lokasi }}</td>
                                                <td class="text-start">{{ $item->deadline }}</td>
                                                <td class="text-start">{{ $item->rentang_gaji }}</td>
                                                <td class="text-start">
                                                    <button class="btn btn-outline btn-outline-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalAboutJob{{ $item->id_pekerjaan }}">
                                                        Lihat
                                                    </button>
                                                </td>
                                                <td class="text-start">
                                                    <button class="btn btn-outline btn-outline-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalDetailJob{{ $item->id_pekerjaan }}">
                                                        Lihat
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->verifikasi == 'Pending')
                                                        <span class="badge badge-light-warning cursor-pointer"
                                                            onclick="confirmStatusChangeVerif({{ $item->id_pekerjaan }})">
                                                            <i class="bi bi-clock text-warning fs-3 me-1"></i>
                                                            {{ $item->verifikasi }}
                                                        </span>
                                                    @elseif($item->verifikasi == 'Approved')
                                                        <span class="badge badge-light-success">
                                                            <i class="bi bi-check-circle text-success fs-3 me-1"></i>
                                                            {{ $item->verifikasi }}
                                                        </span>
                                                    @elseif($item->verifikasi == 'Rejected')
                                                        <span class="badge badge-light-danger">
                                                            <i class="bi bi-x-circle text-danger fs-3 me-1"></i>
                                                            {{ $item->verifikasi }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->status == 'Pending')
                                                        <span class="badge badge-light-warning">
                                                            <i class="text-warning fs-3 me-1"></i>
                                                            {{ $item->status }}
                                                        </span>
                                                    @elseif($item->status == 'Available')
                                                        <span class="badge badge-light-success">
                                                            <i class="bi bi-check-circle text-success fs-3 me-1"></i>
                                                            {{ $item->status }}
                                                        </span>
                                                    @elseif($item->status == 'Expired')
                                                        <span class="badge badge-light-danger">
                                                            <i class="bi bi-x-circle text-danger fs-3 me-1"></i>
                                                            {{ $item->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-end text-nowrap">
                                                    <button type="button"
                                                        class="btn btn-icon btn-outline btn-outline-primary btn-active-light-danger btn-sm me-1"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                        data-id="{{ $item->id_pekerjaan }}"
                                                        data-nama_pekerjaan="{{ $item->judul_pekerjaan }}"
                                                        data-nama_perusahaan="{{ $item->perusahaan->nama_perusahaan }}"
                                                        data-deadline_lowongan="{{ $item->deadline }}"
                                                        data-lokasi="{{ $item->lokasi }}"
                                                        data-kategori="{{ $item->kategori }}"
                                                        data-gaji="{{ $item->rentang_gaji }}"
                                                        data-about_job="{{ $item->about_job }}"
                                                        data-detail_pekerjaan="{{ $item->detail_pekerjaan }}">
                                                        <i class="ki-duotone ki-pencil fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </button>
                                                    <form action="{{ route('pekerjaan.destroy', $item->id_pekerjaan) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-icon btn-outline btn-outline-danger btn-active-light-danger btn-sm"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-custom-class="tooltip-inverse"
                                                            data-bs-placement="bottom" title="Hapus"
                                                            data-kt-permissions-table-filter="delete_row">
                                                            <i class="ki-duotone ki-trash fs-2">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                                <span class="path3"></span>
                                                                <span class="path4"></span>
                                                                <span class="path5"></span>
                                                            </i>
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
            </div>

        </div>
    </div>

    @foreach ($pekerjaan as $item)
        <!-- Modal About Job -->
        <div class="modal fade" tabindex="-1" id="modalAboutJob{{ $item->id_pekerjaan }}">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">About Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ $item->about_job }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Detail Job -->
        <div class="modal fade" tabindex="-1" id="modalDetailJob{{ $item->id_pekerjaan }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">Detail Pekerjaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {!! $item->detail_pekerjaan !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" tabindex="-1" id="modalTambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">TAMBAH PEKERJAAN</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2 icon-close"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="w-full p-4 mb-4 text-red-700 bg-red-100 border border-red-400 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-body">
                    <form action="{{ route('pekerjaan.storeAdmin') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 fv-row">
                                <label for="nama_pekerjaan" class="form-label required">Nama Pekerjaan</label>
                                <input type="text" class="form-control" id="nama_pekerjaan" name="nama_pekerjaan"
                                    placeholder="Frontend Developer">
                            </div>
                            <div class="col-12 col-lg-6 mb-5 fv-row">
                                <label for="nama_perusahaan" class="form-label required">Nama Perusahaan</label>
                                <select class="form-control" id="nama_perusahaan" name="id_perusahaan">
                                    <option value="">Pilih Perusahaan</option>
                                    @foreach ($perusahaan as $p)
                                        <option value="{{ $p->id_perusahaan }}">{{ $p->nama_perusahaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 fv-row">
                                <label for="lokasi" class="form-label required">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                    placeholder="Jl. Example No. 50A">
                            </div>
                            <div class="col-12 col-lg-6 mb-5 fv-row">
                                <label for="gaji" class="form-label required">Rentang Gaji</label>
                                <input type="text" class="form-control" id="gaji" name="gaji"
                                    placeholder="2-8 jt">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 mb-5 fv-row">
                                <label for="kategori" class="form-label required">Kategori</label>
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
                        <div class="row">
                            <div class="col-12 col-lg-12 mb-5 fv-row">
                                <label for="deadline_lowongan" class="form-label required">Deadline Lowongan</label>
                                <div class="input-group">
                                    <input id="kt_td_picker_basic_input" type="date"
                                        class="form-control ki-duotone ki-calendar fs-2" data-td-target="#date-event"
                                        placeholder="Masukkan Tanggal" name="deadline_lowongan">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 mb-5">
                            <label for="about_job" class="form-label required">About Job</label>
                            <textarea class="form-control" data-kt-autosize="true" name="about_job"></textarea>
                        </div>
                        <div class="col-12 col-lg-12 mb-5">
                            <label for="detail_pekerjaan" class="form-label required">Detail Pekerjaan</label>
                            <textarea name="detail_pekerjaan" id="ckeditor_5"></textarea>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="modalEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">EDIT PEKERJAAN</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2 icon-close"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{ route('pekerjaan.update', $item->id_pekerjaan) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 fv-row">
                                <label for="nama_pekerjaan_edit" class="form-label required">Nama Pekerjaan</label>
                                <input type="text" class="form-control" id="nama_pekerjaan_edit"
                                    name="nama_pekerjaan" placeholder="Frontend Developer" value="">
                            </div>
                            <div class="col-12 col-lg-6 mb-5 fv-row">
                                <label for="nama_perusahaan_edit" class="form-label required">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="nama_perusahaan_edit" value=""
                                    disabled>
                                <input type="hidden" id="nama_perusahaan_hidden" name="nama_perusahaan" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 fv-row">
                                <label for="lokasi_edit" class="form-label required">Lokasi</label>
                                <input type="text" class="form-control" id="lokasi_edit" name="lokasi"
                                    placeholder="Jl. Example No. 50A" value="">
                            </div>
                            <div class="col-12 col-lg-6 mb-5 fv-row">
                                <label for="gaji_edit" class="form-label required">Rentang Gaji</label>
                                <input type="text" class="form-control" id="gaji_edit" name="gaji"
                                    placeholder="2-8 jt" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 mb-5 fv-row">
                                <label for="kategori_edit" class="form-label required">Kategori</label>
                                <select class="form-control" id="kategori_edit" name="category" required>
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
                        <div class="row">
                            <div class="col-12 col-lg-12 mb-5 fv-row">
                                <label for="deadline_lowongan_edit" class="form-label required">Deadline Lowongan</label>
                                <div class="input-group">
                                    <input id="kt_td_picker_basic_input_edit" type="date"
                                        class="form-control ki-duotone ki-calendar fs-2" data-td-target="#date-event"
                                        placeholder="Masukkan Tanggal" name="deadline_lowongan" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12 mb-5">
                            <label for="about_job_edit" class="form-label required">About Job</label>
                            <textarea class="form-control" id="about_job_edit" data-kt-autosize="true" name="about_job"></textarea>
                        </div>
                        <div class="col-12 col-lg-12 mb-5">
                            <label for="detail_pekerjaan_edit" class="form-label required">Detail Pekerjaan</label>
                            <textarea name="detail_pekerjaan" id="ckeditor_5_edit"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const editButtons = document.querySelectorAll('[data-bs-target="#modalEdit"]');

        editButtons.forEach(button => {
            button.addEventListener("click", function() {
                const id_pekerjaan = this.getAttribute('data-id');
                const nama_pekerjaan = this.getAttribute('data-nama_pekerjaan');
                const nama_perusahaan = this.getAttribute(
                    'data-nama_perusahaan'); // Ambil data perusahaan
                const lokasi = this.getAttribute('data-lokasi');
                const gaji = this.getAttribute('data-gaji');
                const kategori = this.getAttribute('data-kategori');
                const deadline_lowongan = this.getAttribute('data-deadline_lowongan');
                const about_job = this.getAttribute('data-about_job');
                const detail_pekerjaan = this.getAttribute('data-detail_pekerjaan');

                const editForm = document.getElementById('editForm');
                editForm.action = `/pekerjaan/${id_pekerjaan}`;

                document.getElementById('nama_pekerjaan_edit').value = nama_pekerjaan;

                // Setel nilai untuk tampilan dan pengiriman form
                document.getElementById('nama_perusahaan_edit').value =
                    nama_perusahaan; // Tetap ditampilkan di input
                document.getElementById('nama_perusahaan_hidden').value =
                    nama_perusahaan; // Untuk dikirim ke server

                document.getElementById('lokasi_edit').value = lokasi;
                document.getElementById('gaji_edit').value = gaji;
                document.getElementById('kategori_edit').value = kategori;
                document.getElementById('kt_td_picker_basic_input_edit').value =
                    deadline_lowongan;
                document.getElementById('about_job_edit').value = about_job;
                document.getElementById('ckeditor_5_edit').value = detail_pekerjaan;
            });
        });

        // Delete Row
        $(document).ready(function() {
            $('[data-kt-permissions-table-filter="delete_row"]').on('click', function(e) {
                e.preventDefault();
                const row = $(this).closest('tr');
                const itemName = row.find('td:eq(1)').text();
                const form = $(this).closest('form');

                Swal.fire({
                    text: "Apakah Anda yakin untuk menghapus '" + itemName + "' ?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batalkan",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                    } else if (result.dismiss === "cancel") {
                        Swal.fire({
                            text: "Data '" + itemName + " ' tidak dihapus.",
                            icon: "error",
                            buttonsStyling: false,
                            showConfirmButton: false,
                            timer: 900,
                            customClass: {
                                confirmButton: "btn fw-bold btn-primary"
                            }
                        });
                    }
                });
            });
        });

        // Alert untuk sukses/error
        @if (session('success'))
            Swal.fire({
                text: "{{ session('success') }}",
                icon: "success",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if (session('error'))
            Swal.fire({
                text: "{{ session('error') }}",
                icon: "error",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 1500
            });
        @endif

    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let editorInstance;

        $('#modalTambah').on('shown.bs.modal', function() {
            if (!editorInstance) { // Cegah inisialisasi ulang jika editor sudah dibuat
                ClassicEditor
                    .create(document.querySelector('#ckeditor_5'))
                    .then(editor => {
                        editorInstance = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });

        $('#modalTambah').on('hidden.bs.modal', function() {
            if (editorInstance) {
                editorInstance.destroy()
                    .then(() => {
                        editorInstance =
                            null; // Pastikan editor dihapus agar bisa dibuat ulang nanti
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let editorInstance = null;

        $('#modalEdit').on('show.bs.modal', function(event) {
            let button = event.relatedTarget;
            if (!button) return; // Pastikan tombol ada

            let detail_pekerjaan = button.getAttribute('data-detail_pekerjaan');

            // Hapus CKEditor jika sudah ada agar tidak duplikat
            if (editorInstance) {
                editorInstance.destroy()
                    .then(() => {
                        editorInstance = null;
                        initEditor(detail_pekerjaan); // Inisialisasi ulang setelah dihancurkan
                    })
                    .catch(error => console.error(error));
            } else {
                initEditor(detail_pekerjaan);
            }
        });

        function initEditor(detail_pekerjaan) {
            ClassicEditor
                .create(document.querySelector('#ckeditor_5_edit'))
                .then(editor => {
                    editorInstance = editor;
                    editor.setData(detail_pekerjaan);
                })
                .catch(error => console.error(error));
        }

        $('#modalEdit').on('hidden.bs.modal', function() {
            if (editorInstance) {
                editorInstance.destroy()
                    .then(() => {
                        editorInstance = null;
                    })
                    .catch(error => console.error(error));
            }
        });
    });
</script>

<script>
    function confirmStatusChangeVerif(id) {
        Swal.fire({
            text: "Apakah Anda yakin ingin menyetujui ini?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, Setujui",
            cancelButtonText: "Tidak",
            customClass: {
                confirmButton: "btn fw-bold btn-primary",
                cancelButton: "btn fw-bold btn-active-light-primary"
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
        form.action = "/pekerjaan/" + id + "/" + action;

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
    }
</script>
