@extends('admin.layout.main')
@section('content')

    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <div id="kt_app_content" class="app-content flex-column-fluid pt-10">

                <div id="kt_app_content_container" class="app-container container-fluid">

                    {{-- FAQ Content --}}
                    <div class="card mb-5 mb-xl-10 mb-8">
                        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                            data-bs-target="#kt_account_profile_details" aria-expanded="true"
                            aria-controls="kt_account_profile_details">
                            <div class="card-title m-0">
                                <h3 class="fw-bold m-0">Halaman FAQ</h3>
                            </div>
                        </div>
                        <div id="kt_account_settings_profile_details" class="collapse show">
                            <form id="kt_account_profile_details_form" class="form"
                                action="{{ route('faq-content.update', $faqContent->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body border-top p-9">
                                    <div class="row mb-6">
                                        <label class="col-lg-3 col-form-label fw-semibold fs-6 mb-5">Foto Asset Penunjang</label>
                                        <div class="col-lg-9">
                                            <div class="row">
                                                <div class="col-6 col-lg-2 mb-10 mb-lg-0">
                                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                                        style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url('{{ asset($faqContent) && $faqContent->asset_1 ? asset('storage/' . $faqContent->asset_1) : asset('assets/admin/media/svg/blank.svg') }}')">
                                                        </div>
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="Change logo">
                                                            <i class="ki-outline ki-pencil fs-7"></i>
                                                            <input type="file" name="asset_1"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove1" />
                                                        </label>
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="Cancel avatar">
                                                            <i class="ki-outline ki-cross fs-2"></i>
                                                        </span>
                                                    </div>
                                                    <div class="form-text">Foto Asset 1</div>
                                                </div>
                                                <div class="col-6 col-lg-2 mb-10 mb-lg-0">
                                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                                        style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url('{{ asset($faqContent) && $faqContent->asset_2 ? asset('storage/' . $faqContent->asset_2) : asset('assets/admin/media/svg/blank.svg') }}')">
                                                        </div>
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="Change logo">
                                                            <i class="ki-outline ki-pencil fs-7"></i>
                                                            <input type="file" name="asset_2"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove1" />
                                                        </label>
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="Cancel avatar">
                                                            <i class="ki-outline ki-cross fs-2"></i>
                                                        </span>
                                                    </div>
                                                    <div class="form-text">Foto Asset 2</div>
                                                </div>
                                                <div class="col-6 col-lg-2 mb-3 mb-lg-0">
                                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                                        style="background-image: url('{{ asset('assets/admin/media/svg/blank.svg') }}')">
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url('{{ asset($faqContent) && $faqContent->asset_3 ? asset('storage/' . $faqContent->asset_3) : asset('assets/admin/media/svg/blank.svg') }}')">
                                                        </div>
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="Change logo">
                                                            <i class="ki-outline ki-pencil fs-7"></i>
                                                            <input type="file" name="asset_3"
                                                                accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove1" />
                                                        </label>
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="Cancel avatar">
                                                            <i class="ki-outline ki-cross fs-2"></i>
                                                        </span>
                                                    </div>
                                                    <div class="form-text">Foto Asset 3</div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Deskripsi
                                            singkat</label>
                                        <div class="col-lg-9 fv-row">
                                            <textarea class="form-control form-control form-control-solid" data-kt-autosize="true" name="deskripsi">{{ $faqContent->deskripsi }}</textarea>
                                            <div class="form-text">Deskripsi singkat page FAQ maksimal 50 kata</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="submit" id="submit_load" class="btn btn-primary">
                                        <span class="indicator-label">Simpan Perubahan</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Tabel --}}
                    <div class="card card-flush">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title mobile-full-width">
                                <div class="d-flex align-items-center position-relative my-1 mobile-full-width">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" table-search="search"
                                        class="form-control form-control-solid mobile-full-width input-sm ps-12 " placeholder="Cari..." />
                                </div>
                            </div>
                            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                <button type="button" class="btn btn-primary mb-3 " id="btnTambah">
                                    Tambah Pertanyaan
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
                                            <th class="text-center">Pertanyaan</th>
                                            <th class="text-center">Jawaban</th>
                                            <th class="text-end min-w-70px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $index => $faq)
                                            <tr>
                                                <td class="text-start">{{ $index + 1 }}</td>
                                                <td class="text-center">{{ $faq->pertanyaan }}</td>
                                                <td class="text-center">{{ $faq->jawaban }}</td>
                                                <td class="text-end">
                                                    <button
                                                        class="btn btn-icon btn btn-outline btn-outline-primary btn-active-light-danger btn-sm me-1 mb-2"
                                                        type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modalEdit{{ $faq->id }}">
                                                        <i class="ki-duotone ki-pencil fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </button>
                                                    <form action="{{ route('faq.destroy', $faq->id) }}" method="POST"
                                                        class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="btn btn-icon btn btn-outline btn-outline-danger btn-active-light-danger btn-sm me-1 mb-2"
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

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modalEdit{{ $faq->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-uppercase">Edit Pertanyaan</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('faq.update', $faq->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="mb-3">
                                                                    <label class="form-label">Pertanyaan</label>
                                                                    <input type="text" name="pertanyaan"
                                                                        class="form-control"
                                                                        value="{{ $faq->pertanyaan }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Jawaban</label>
                                                                    <textarea name="jawaban" class="form-control" rows="3">{{ $faq->jawaban }}</textarea>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
            </div>

        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase">Tambah Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('faq.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="pertanyaan" class="form-label">Pertanyaan</label>
                            <input type="text" name="pertanyaan" class="form-control"
                                placeholder="Masukkan pertanyaan">
                        </div>
                        <div class="mb-3">
                            <label for="jawaban" class="form-label">Jawaban</label>
                            <textarea name="jawaban" class="form-control" rows="3" placeholder="Masukkan jawaban"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('[data-kt-permissions-table-filter="delete_row"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const row = this.closest('tr');
                    const itemName = row.querySelector('td:nth-child(2)').textContent;
                    const form = this.closest('form');

                    Swal.fire({
                        text: `Apakah Anda yakin untuk menghapus '${itemName}'?`,
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
                        if (result.isConfirmed) {
                            form.submit();
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
    <script>
        document.getElementById("btnTambah").addEventListener("click", function () {
            let faqCount = {{ $faqCount }}; // Ambil jumlah data dari Blade
    
            if (faqCount >= 8) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Batas Tercapai!',
                    text: 'Maksimal 8 pertanyaan telah tercapai. Tidak bisa menambah lagi.',
                    confirmButtonText: 'OK'
                });
            } else {
                // Jika jumlah masih kurang dari 8, buka modal
                let modal = new bootstrap.Modal(document.getElementById('modalTambah'));
                modal.show();
            }
        });
    </script>
@endsection
