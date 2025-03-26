<!-- filepath: /c:/laragon/www/JobPath/resources/views/admin/pages/kelola-perusahaan.blade.php -->
@extends('admin.layout.main')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid pt-10">
            <div id="kt_app_content_container" class="app-container container-fluid">
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" table-search="search"
                                    class="form-control form-control-solid w-250px ps-12"
                                    placeholder="Cari..." />
                            </div>
                        </div>
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
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
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                        <th class="text-start">No.</th>
                                        <th class="text-center">Logo</th>
                                        <th class="text-center">Nama Perusahaan</th>
                                        <th class="text-center">Jenis Perusahaan</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Nomor Telepon</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-end">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-semibold text-gray-600">
                                    @foreach($perusahaan as $index => $item)
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-bold">{{ $index + 1 }}</span>
                                            </td>
                                            <td class="d-flex justify-content-center">
                                                <div class="d-flex align-items-center">
                                                    @if($item->logo)
                                                        <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                                            href="{{ $item->logo }}">
                                                            <div class="symbol symbol-100px">
                                                                <img src="{{ $item->logo }}" style="width: 55px; height: 55px;"
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
                                            <td class="text-center">
                                                <span class="fw-bold">{{ $item->nama_perusahaan }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="fw-bold">{{ $item->jenis_perusahaan }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="fw-bold">{{ $item->email }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="fw-bold">{{ $item->nomor_telepon }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="fw-bold">{{ $item->alamat }}</span>
                                            </td>
                                            <td class="text-end text-nowrap">
                                                <button type="button"
                                                    class="btn btn-icon btn-outline btn-outline-primary btn-active-light-danger btn-sm me-1"
                                                    data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    data-id="{{ $item->id_perusahaan }}"
                                                    data-nama="{{ $item->nama_perusahaan }}" data-email="{{ $item->email }}"
                                                    data-logo="{{ $item->logo }}"
                                                    data-nomor_telepon="{{ $item->nomor_telepon }}"
                                                    data-alamat="{{ $item->alamat }}"
                                                    data-jenis="{{ $item->jenis_perusahaan }}">
                                                    <i class="ki-duotone ki-pencil fs-2">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                    </i>
                                                </button>
                                                <form action="{{ route('perusahaan.destroy', $item->id_perusahaan) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-icon btn-outline btn-outline-danger btn-active-light-danger btn-sm"
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

<!-- Modal Edit Perusahaan -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Edit Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="editForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="edit-nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="edit-nama_perusahaan" name="nama_perusahaan"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-jenis_perusahaan" class="form-label">Jenis Perusahaan</label>
                        <input type="text" class="form-control" id="edit-jenis_perusahaan" name="jenis_perusahaan"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="edit-email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="edit-logo" name="logo"
                            accept="image/jpeg, image/png">
                        <img id="current-logo" src="" alt="Current Logo"
                            style="width: 100px; height: 100px; margin-top: 10px;">
                    </div>
                    <div class="mb-3">
                        <label for="edit-nomor_telepon" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" id="edit-nomor_telepon" name="nomor_telepon">
                    </div>
                    <div class="mb-3">
                        <label for="edit-alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="edit-alamat" name="alamat">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('button[data-bs-target="#modalEdit"]');
        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const id_perusahaan = this.getAttribute('data-id');
                const nama_perusahaan = this.getAttribute('data-nama');
                const jenis_perusahaan = this.getAttribute('data-jenis');
                const email = this.getAttribute('data-email');
                const logo = this.getAttribute('data-logo');
                const nomor_telepon = this.getAttribute('data-nomor_telepon');
                const alamat = this.getAttribute('data-alamat');

                const editForm = document.getElementById('editForm');
                editForm.action = `/perusahaan/${id_perusahaan}`;
                document.getElementById('edit-nama_perusahaan').value = nama_perusahaan;
                document.getElementById('edit-jenis_perusahaan').value = jenis_perusahaan;
                document.getElementById('edit-email').value = email;
                document.getElementById('edit-nomor_telepon').value = nomor_telepon;
                document.getElementById('edit-alamat').value = alamat;
                document.getElementById('current-logo').src = logo ? logo : '';
                document.getElementById('current-logo').style.display = logo ? 'block' : 'none';
            });
        });

        // Delete Row
        $(document).ready(function () {
            $('[data-kt-permissions-table-filter="delete_row"]').on('click', function (e) {
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
        @if(session('success'))
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