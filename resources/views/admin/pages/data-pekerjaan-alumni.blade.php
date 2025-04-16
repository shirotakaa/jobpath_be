@extends('admin.layout.main')  <!-- Memanggil layout utama admin -->
@section('content') <!-- Bagian konten halaman admin -->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <div class="d-flex flex-column flex-column-fluid">

            <div id="kt_app_content" class="app-content flex-column-fluid pt-10">
                <div id="kt_app_content_container" class="app-container container-fluid">
                    <div class="card card-flush">
                        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                            <div class="card-title mobile-full-width">
                                <!-- Form pencarian alumni -->
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
                                <!-- Tombol untuk membuka modal tambah data alumni -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalTambah">
                                    Tambah Data Alumni
                                </button>
                            </div>
                        </div>

                        <div class="card-body pt-0">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="faq-tabs">
                                    <!-- Tombol ekspor data (Copy, Excel, PDF, Print) -->
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

                            <!-- Tabel alumni -->
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="text-start min-w-50px">Foto</th>
                                            <th class="text-start min-w-100px">Nama</th>
                                            <th class="text-start min-w-70px">NIS</th>
                                            <th class="text-start min-w-70px">Jurusan</th>
                                            <th class="text-start min-w-70px">Perusahaan</th>
                                            <th class="text-start min-w-100px">Pekerjaan</th>
                                            <th class="text-start min-w-100px">Link Sosmed IG</th>
                                            <th class="text-start min-w-100px">Link Sosmed Linkedin</th>
                                            <th class="text-start min-w-100px">Status</th>
                                            <th class="text-end min-w-70px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($alumni as $data)
                                            <tr>
                                                <td class="d-flex justify-content-start">
                                                    <div class="d-flex align-items-center">
                                                        <!-- Foto alumni yang bisa dilihat lebih besar -->
                                                        <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                                            href="{{ asset('storage/' . $data->foto) }}">
                                                            <div class="symbol symbol-100px">
                                                                <img src="{{ asset('storage/' . $data->foto) }}"
                                                                    style="width: 55px; height: 55px;"
                                                                    class="object-fit-cover">
                                                            </div>
                                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                                <i class="bi bi-eye-fill text-white"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="text-start">
                                                    <span class="fw-bold">{{ $data->nama }}</span>
                                                </td>
                                                <td class="text-start">
                                                    <span class="fw-bold badge badge-light-info">{{ $data->nis }}</span>
                                                </td>
                                                <td class="text-start">
                                                    <span class="fw-bold">{{ $data->jurusan }}</span>
                                                </td>
                                                <td class="text-start">
                                                    <span class="fw-bold">{{ $data->perusahaan ?? '-' }}</span>
                                                </td>
                                                <td class="text-start">{{ $data->pekerjaan ?? '-' }}</td>
                                                <td class="text-start">
                                                    <!-- Link sosial media Instagram jika ada -->
                                                    <a href="{{ $data->instagram ?? '#' }}"
                                                        class="text-decoration-none link-primary"
                                                        target="_blank">{{ $data->instagram ? 'Instagram' : '-' }}</a>
                                                </td>
                                                <td class="text-start">
                                                    <!-- Link sosial media LinkedIn jika ada -->
                                                    <a href="{{ $data->linkedin ?? '#' }}"
                                                        class="text-decoration-none link-primary"
                                                        target="_blank">{{ $data->linkedin ? 'LinkedIn' : '-' }}</a>
                                                </td>
                                                <td class="text-start">
                                                    <!-- Status alumni (Pending, Approved, Rejected) -->
                                                    @if($data->status == 'Pending')
                                                        <span class="badge badge-light-warning cursor-pointer"
                                                            onclick="confirmStatusChange({{ $data->id_jejak_alumni }})">
                                                            <i class="bi bi-clock text-warning fs-3 me-1"></i>
                                                            {{ $data->status }}
                                                        </span>
                                                    @elseif($data->status == 'Approved')
                                                        <span class="badge badge-light-success">
                                                            <i class="bi bi-check-circle text-success fs-3 me-1"></i>
                                                            {{ $data->status }}
                                                        </span>
                                                    @elseif($data->status == 'Rejected')
                                                        <span class="badge badge-light-danger">
                                                            <i class="bi bi-x-circle text-danger fs-3 me-1"></i>
                                                            {{ $data->status }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="text-end text-nowrap">
                                                    <!-- Tombol untuk mengedit alumni -->
                                                    <button type="button"
                                                        class="btn btn-icon btn-outline btn-outline-primary btn-active-light-danger btn-sm me-1 edit-btn"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                        data-id="{{ $data->id_jejak_alumni }}"
                                                        data-nama="{{ $data->nama }}" data-nis="{{ $data->nis }}"
                                                        data-jurusan="{{ $data->jurusan }}"
                                                        data-perusahaan="{{ $data->perusahaan ?? '' }}"
                                                        data-pekerjaan="{{ $data->pekerjaan ?? '' }}"
                                                        data-instagram="{{ $data->instagram ?? '' }}"
                                                        data-linkedin="{{ $data->linkedin ?? '' }}"
                                                        data-foto="{{ asset('storage/' . $data->foto) }}">
                                                        <i class="ki-duotone ki-pencil fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </button>
                                                    
                                                    <!-- Form untuk menghapus alumni -->
                                                    <form
                                                        action="{{ route('jejakalumni.destroy', $data->id_jejak_alumni) }}"
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

    <!-- Modal untuk Menambah Data Alumni -->
<div class="modal fade" tabindex="-1" id="modalTambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">TAMBAH DATA ALUMNI</h5>
                <!-- Tombol untuk menutup modal -->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross icon-close"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>

            <div class="modal-body">
                <!-- Form untuk menambah data alumni -->
                <form action="{{ route('jejakalumni.store') }}" method="POST" id="tambahForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3 fv-row">
                        <!-- Input untuk memilih foto alumni -->
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="image-input image-input-empty" data-kt-image-input="true" style="background-image: url(/assets/admin/media/svg/blank.svg)">
                                <div class="image-input-wrapper w-125px h-125px image-input-placeholder"></div>
                                <!-- Tombol untuk mengganti atau menghapus foto -->
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change Photo">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
                                    <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="photo_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel Photo">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove photo">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-12 col-lg-9">
                            <div class="row">
                                <!-- Input untuk memilih nama alumni -->
                                <div class="col-12 mb-5">
                                    <label for="nama-alumni" class="form-label required">Nama Alumni</label>
                                    <select class="form-select" data-control="select2" data-dropdown-parent="#modalTambah" id="siswa" name="id_siswa" class="form-control" required>
                                        <option selected disabled>Pilih Siswa</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->id_siswa }}" data-nis="{{ $item->nis }}" data-jurusan="{{ $item->jurusan }}">
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Input untuk jurusan alumni -->
                                <div class="col-12 col-lg-6 mb-5">
                                    <label for="Jurusan" class="form-label required">Jurusan</label>
                                    <input type="text" class="form-control form-control-solid" id="Jurusan" name="Jurusan" placeholder="Terisi otomatis setelah pilih nama" value="" disabled>
                                </div>
                                
                                <!-- Input untuk NIS alumni -->
                                <div class="col-12 col-lg-6 mb-5">
                                    <label for="nis" class="form-label required">NIS</label>
                                    <input type="text" class="form-control form-control-solid" id="nis" name="nis" placeholder="Terisi otomatis setelah pilih nama" value="" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Input untuk perusahaan dan pekerjaan alumni -->
                    <div class="row">
                        <div class="col-12 col-lg-6 mb-5 fv-row">
                            <label for="perusahaan" class="form-label required">Perusahaan</label>
                            <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="Masukkan Nama Perusahaan" value="">
                        </div>
                        <div class="col-12 col-lg-6 mb-5 fv-row">
                            <label for="pekerjaan" class="form-label required">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Senior HR recruiter" value="">
                        </div>
                    </div>

                    <!-- Input untuk link Instagram dan LinkedIn alumni -->
                    <div class="row">
                        <div class="col-12">
                            <label for="instagram" class="form-label required">Link Instagram</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text">https://instagram.com/</span>
                                <input type="text" class="form-control" id="instagram" name="instagram" />
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="linkedin" class="form-label required">Link Linkedin</label>
                            <div class="input-group mb-5">
                                <span class="input-group-text">https://linkedin.com/in/</span>
                                <input type="text" class="form-control" id="linkedin" name="linkedin" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- Tombol untuk menyimpan data -->
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal untuk Mengedit Data Alumni -->
<div class="modal fade" tabindex="-1" id="modalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-uppercase">EDIT DATA ALUMNI</h5>
                <!-- Tombol untuk menutup modal -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form untuk mengedit data alumni -->
            <form id="editForm" action="{{ route('jejakalumni.update', $data->id_jejak_alumni ?? $alumni->id ?? '') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <!-- Input tersembunyi untuk ID alumni yang akan diupdate -->
                    <input type="hidden" id="id_jejak_alumni" name="id_jejak_alumni" value="{{ $data->id_jejak_alumni ?? $alumni->id ?? '' }}">
                    
                    <div class="row mb-3">
                        <!-- Input untuk foto alumni -->
                        <div class="col-3 d-flex align-items-center justify-content-center">
                            <div class="image-input image-input-outline" data-kt-image-input="true">
                                <div id="previewImage" class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset($data->foto ? "storage/".$data->foto : "/assets/admin/media/photo-alumni-2.jpg") }}')"></div>
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Rubah Foto">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
                                    <input type="file" id="foto_edit" name="foto" accept=".png, .jpg, .jpeg">
                                    <input type="hidden" name="avatar_remove">
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-lg-9">
                            <div class="row">
                                <!-- Input untuk nama, jurusan, dan NIS alumni yang tidak bisa diedit -->
                                <div class="col-12 mb-3">
                                    <label for="nama_edit" class="form-label required">Nama Alumni</label>
                                    <input type="text" class="form-control" id="nama_edit" name="nama" value="{{ $data->nama ?? '' }}" disabled>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="jurusan_edit" class="form-label required">Jurusan</label>
                                    <input type="text" class="form-control" id="jurusan_edit" name="jurusan" value="{{ $data->jurusan ?? '' }}" disabled>
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="nis_edit" class="form-label required">NIS</label>
                                    <input type="text" class="form-control" id="nis_edit" name="nis" value="{{ $data->nis ?? '' }}" disabled>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input untuk perusahaan dan pekerjaan alumni yang bisa diedit -->
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="perusahaan_edit" class="form-label required">Perusahaan</label>
                            <input type="text" class="form-control" id="perusahaan_edit" name="perusahaan" value="{{ $data->perusahaan ?? '' }}">
                        </div>
                        <div class="col-12 col-lg-6 mb-3">
                            <label for="pekerjaan_edit" class="form-label required">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan_edit" name="pekerjaan" value="{{ $data->pekerjaan ?? '' }}">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Input untuk link Instagram dan LinkedIn alumni -->
                        <div class="col-12 mb-3">
                            <label for="instagram_edit" class="form-label required">Link Instagram</label>
                            <div class="input-group">
                                <span class="input-group-text">https://instagram.com/</span>
                                <input type="text" class="form-control" id="instagram_edit" name="instagram" value="{{ str_replace('https://instagram.com/', '', $data->instagram ?? '') }}">
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="linkedin_edit" class="form-label required">Link LinkedIn</label>
                            <div class="input-group">
                                <span class="input-group-text">https://linkedin.com/in/</span>
                                <input type="text" class="form-control" id="linkedin_edit" name="linkedin" value="{{ str_replace('https://linkedin.com/in/', '', $data->linkedin ?? '') }}">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <!-- Tombol untuk menyimpan perubahan -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>                
        </div>
    </div>
</div>

    

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    // Event listener ketika DOM sudah siap
    document.addEventListener('DOMContentLoaded', function() {
        
        // Menangani klik pada tombol edit
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id_jejak_alumni = this.getAttribute('data-id'); // Ambil ID alumni
                const nama = this.getAttribute('data-nama'); // Ambil Nama alumni
                const nis = this.getAttribute('data-nis'); // Ambil NIS alumni
                const jurusan = this.getAttribute('data-jurusan'); // Ambil Jurusan alumni
                const perusahaan = this.getAttribute('data-perusahaan') || ''; // Ambil Nama Perusahaan, default jika kosong
                const pekerjaan = this.getAttribute('data-pekerjaan') || ''; // Ambil Pekerjaan, default jika kosong
                const instagram = this.getAttribute('data-instagram') || ''; // Ambil Link Instagram, default jika kosong
                const linkedin = this.getAttribute('data-linkedin') || ''; // Ambil Link LinkedIn, default jika kosong
                const foto = this.getAttribute('data-foto'); // URL Foto alumni

                // Update form action untuk edit
                const editForm = document.getElementById('editForm');
                editForm.action = `/jejakalumni/${id_jejak_alumni}`;

                // Isi field dengan data alumni yang dipilih
                document.getElementById('id_jejak_alumni').value = id_jejak_alumni;
                document.getElementById('nama_edit').value = nama;
                document.getElementById('nis_edit').value = nis;
                document.getElementById('jurusan_edit').value = jurusan;
                document.getElementById('perusahaan_edit').value = perusahaan;
                document.getElementById('pekerjaan_edit').value = pekerjaan;
                document.getElementById('instagram_edit').value = instagram;
                document.getElementById('linkedin_edit').value = linkedin;

                // Update foto preview
                document.getElementById('previewImage').style.backgroundImage = `url(${foto})`;
            });
        });

        // Update preview foto ketika file dipilih
        document.getElementById('foto_edit').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImage').style.backgroundImage = `url(${e.target.result})`;
                };
                reader.readAsDataURL(file);
            }
        });

        // Menghapus baris dengan konfirmasi menggunakan Swal
        $(document).ready(function() {
            $('[data-kt-permissions-table-filter="delete_row"]').on('click', function(e) {
                e.preventDefault();
                const row = $(this).closest('tr');
                const itemName = row.find('td:eq(1)').text(); // Ambil nama item
                const form = $(this).closest('form');

                // Menampilkan konfirmasi sebelum menghapus
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
                        form.submit(); // Jika dikonfirmasi, submit form
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

        // Menampilkan alert sukses/error menggunakan Swal
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
    // Fungsi konfirmasi untuk mengubah status (setujui/tolak)
    function confirmStatusChange(id) {
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

    // Fungsi untuk mengubah status berdasarkan ID
    function changeStatus(id, action) {
        let form = document.createElement("form");
        form.method = "POST";
        form.action = "/jejakalumni/" + id + "/" + action;

        let csrfToken = document.createElement("input");
        csrfToken.type = "hidden";
        csrfToken.name = "_token";
        csrfToken.value = "{{ csrf_token() }}";
        form.appendChild(csrfToken);

        let methodInput = document.createElement("input");
        methodInput.type = "hidden";
        methodInput.name = "_method";
        methodInput.value = "PUT";
        form.appendChild(methodInput);

        document.body.appendChild(form);
        form.submit(); // Kirim form untuk ubah status
    }
</script>

<script>
    // Inisialisasi Select2 pada dropdown siswa
    $(document).ready(function() {
        $('#siswa').select2({
            dropdownParent: $('#modalTambah') // Menentukan parent modal
        });

        // Event saat memilih siswa, otomatis mengisi NIS dan Jurusan
        $('#siswa').on('change', function() {
            var selectedOption = $(this).find(':selected');
            var nis = selectedOption.attr('data-nis'); // Ambil NIS dari atribut data
            var jurusan = selectedOption.attr('data-jurusan'); // Ambil jurusan dari atribut data

            $('#nis').val(nis); // Set nilai NIS
            $('#Jurusan').val(jurusan); // Set nilai jurusan
        });
    });
</script>

@endsection
