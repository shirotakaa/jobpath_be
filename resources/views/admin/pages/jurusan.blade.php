@extends('admin.layout.main')
@section('content')
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
                                    Tambah Jurusan
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
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="table"
                                    id="kt_ecommerce_products_table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-start">No.</th>
                                            <th class="text-center min-w-50px">Nama Jurusan</th>
                                            <th class="text-center">Singkatan</th>
                                            <th class="text-end min-w-70px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($jurusans as $jurusan)
                                            <tr>
                                                <td class="text-start">
                                                    <span class="fw-bold">{{ $loop->iteration }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="fw-bold">{{ $jurusan->nama_jurusan }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="fw-bold">{{ $jurusan->singkatan_jurusan }}</span>
                                                </td>
                                                <td class="text-end">
                                                    <button
                                                        class="btn btn-icon btn btn-outline btn-outline-primary btn-active-light-danger btn-sm me-1"
                                                        type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#modalEdit" data-id="{{ $jurusan->id_jurusan }}"
                                                        data-nama="{{ $jurusan->nama_jurusan }}"
                                                        data-singkatan="{{ $jurusan->singkatan_jurusan }}">
                                                        <i class="ki-duotone ki-pencil fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </button>
                                                    <form action="{{ route('jurusan.destroy', $jurusan->id_jurusan) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="btn btn-icon btn btn-outline btn-outline-danger btn-active-light-danger btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse"
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

    <div class="modal fade" tabindex="-1" id="modalTambah">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">TAMBAH JURUSAN</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross icon-close"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>

                <div class="modal-body">
                    <form action="{{ route('jurusan.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-5 fv-row">
                                <label for="nama-jurusan" class="form-label required">Nama Jurusan</label>
                                <input type="text" class="form-control" id="nama-jurusan" name="nama_jurusan"
                                    placeholder="Masukkan Nama Jurusan" value="" required>
                            </div>
                            <div class="col-12 mb-5 fv-row">
                                <label for="singkatan" class="form-label required">Singkatan Jurusan</label>
                                <input type="text" class="form-control" id="singkatan" name="singkatan_jurusan"
                                    placeholder="Masukkan Singkatan Jurusan" value="" required>
                            </div>
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
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">EDIT JURUSAN</h5>
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                </div>

                <div class="modal-body">
                    <form id="editForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12 mb-5 fv-row">
                                <label for="edit-nama-jurusan" class="form-label required">Nama Jurusan</label>
                                <input type="text" class="form-control" id="edit-nama-jurusan" name="nama_jurusan"
                                    placeholder="Masukkan Nama Jurusan" value="" required>
                            </div>
                            <div class="col-12 mb-5 fv-row">
                                <label for="edit-singkatan-jurusan" class="form-label required">Singkatan Jurusan</label>
                                <input type="text" class="form-control" id="edit-singkatan-jurusan"
                                    name="singkatan_jurusan" placeholder="Masukkan Singkatan Jurusan" value=""
                                    required>
                            </div>
                        </div>
                </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('button[data-bs-target="#modalEdit"]');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id_jurusan = this.getAttribute('data-id');
                    const nama = this.getAttribute('data-nama');
                    const singkatan_jurusan = this.getAttribute('data-singkatan');

                    const editForm = document.getElementById('editForm');
                    editForm.action = `/jurusan/${id_jurusan}`;
                    document.getElementById('edit-nama-jurusan').value = nama;
                    document.getElementById('edit-singkatan-jurusan').value = singkatan_jurusan;
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

            // Alert for success messages
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
@endsection
