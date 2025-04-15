<!-- filepath: /c:/laragon/www/JobPath/resources/views/admin/pages/data-user.blade.php -->
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
								<button type="button" class="btn btn-light-success" data-bs-toggle="modal"
									data-bs-target="#modalExcel">
									Import Excel
								</button>
								<button type="button" class="btn btn-primary" data-bs-toggle="modal"
									data-bs-target="#modalTambah">
									Tambah Data User
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
											<th class="text-center">Nama</th>
											<th class="text-center">NIS</th>
											<th class="text-center">Jurusan</th>
											<th class="text-center">Jenis Kelamin</th>
											<th class="text-center">Tahun Ajaran</th>
											<th class="text-center">Email</th>
											<th class="text-center">No. Telepon</th>
											<th class="text-end">Aksi</th>
										</tr>
									</thead>
									<tbody class="fw-semibold text-gray-600">
										@foreach($siswa as $item)
											<tr>
												<td class="text-center">
													<span class="fw-bold">{{ $item->nama }}</span>
												</td>
												<td class="text-center">
													<span class="fw-bold badge badge-light-info">{{ $item->nis }}</span>
												</td>
												<td class="text-center">
													<span class="fw-bold">{{ $item->jurusan }}</span>
												</td>
												<td class="text-center">
													<span class="fw-bold">{{ $item->jenis_kelamin }}</span>
												</td>
												<td class="text-center">
													<span class="fw-bold">{{ $item->tahun_ajaran }}</span>
												</td>
												<td class="text-center">
													<a href="#" class="text-decoration-none link-primary">{{ $item->email }}</a>
												</td>
												<td class="text-center">{{ $item->nomor_telepon }}</td>
												<td class="text-end text-nowrap">
													<button type="button"
														class="btn btn-icon btn-outline btn-outline-primary btn-active-light-danger btn-sm me-1"
														data-bs-toggle="modal" data-bs-target="#modalEdit"
														data-id="{{ $item->id_siswa }}" data-nama="{{ $item->nama }}"
														data-email="{{ $item->email }}" data-nis="{{ $item->nis }}"
														data-nomor_telepon="{{ $item->nomor_telepon }}"
														data-jurusan="{{ $item->jurusan }}"
														data-tahun_ajaran="{{ $item->tahun_ajaran }}"
														data-jenis_kelamin="{{ $item->jenis_kelamin }}">
														<i class="ki-duotone ki-pencil fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</button>
													<form action="{{ route('siswa.destroy', $item->id_siswa) }}" method="POST"
														style="display:inline;">
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

	<!-- Modal Tambah Siswa -->
	<div class="modal fade" tabindex="-1" id="modalTambah">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase">Tambah Data User</h5>
					<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
						aria-label="Close">
						<i class="ki-duotone ki-cross icon-close"><span class="path1"></span><span class="path2"></span></i>
					</div>
				</div>
				<div class="modal-body">
					<form action="{{ route('siswa.store') }}" method="POST" id="tambahForm">
						@csrf
						<div class="row">
							<div class="col-12 col-lg-8 mb-5 fv-row">
								<label for="tambah-nama" class="form-label required">Nama</label>
								<input type="text" class="form-control" id="tambah-nama" name="nama" placeholder="Masukkan Nama Lengkap" required>
									<div class="invalid-feedback">Nama wajib diisi.</div>
							</div>
							<div class="col-12 col-lg-4 mb-5 fv-row">
								<label for="tambah-nis" class="form-label required">NIS</label>
								<input type="text" class="form-control" id="tambah-nis" name="nis" placeholder="22718" required>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-lg-6 mb-5 fv-row">
								<label for="tambah-jenis_kelamin" class="form-label required">Jenis Kelamin</label>
								<select class="form-select" id="tambah-jenis_kelamin" name="jenis_kelamin" required>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
							<div class="col-12 col-lg-6 mb-5 fv-row">
								<label for="tambah-tahun_ajaran" class="form-label required">Tahun Ajaran</label>
								<input type="text" class="form-control" id="tambah-tahun_ajaran" name="tahun_ajaran"
									placeholder="2022-2025">
							</div>
						</div>
						<div class="row">
							<div class="col-12 mb-5 fv-row">
								<label for="tambah-jurusan" class="form-label required">Jurusan</label>
								<select class="form-select" id="tambah-jurusan" name="jurusan" required>
									<option selected disabled>Pilih Jurusan</option>
									@foreach($jurusans as $jurusan)
									<option value="{{ $jurusan->singkatan_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col-12 col-lg-6 fv-row">
								<label for="tambah-email" class="form-label required">Email</label>
								<input type="email" class="form-control" id="tambah-email" name="email"
									placeholder="example@ex.co" required>
							</div>
							<div class="col-12 col-lg-6 fv-row">
								<label for="tambah-nomor_telepon" class="form-label required">Nomor Telepon</label>
								<input type="text" class="form-control" id="tambah-nomor_telepon" name="nomor_telepon"
									placeholder="088498787765" required>
							</div>
						</div>
				</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
			</div>
		</div>
	</div>


	<!-- Modal Edit Siswa -->
	<div class="modal fade" tabindex="-1" id="modalEdit">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase">Edit Data User</h5>
					<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
						aria-label="Close">
						<i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
					</div>
				</div>
				<div class="modal-body">
					<form action="" method="POST" id="editForm" enctype="multipart/form-data">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="col-12 col-lg-8 mb-5 fv-row">
								<div class="col-12">
									<label for="edit-nama" class="form-label required">Nama</label>
									<input type="text" class="form-control" id="edit-nama" name="nama"
										placeholder="Shofie Nashierotuzzahro" value="">
								</div>
							</div>
							<div class="col-12 col-lg-4 mb-5 fv-row">
								<div class="col-12">
									<label for="edit-nis" class="form-label required">NIS</label>
									<input type="text" class="form-control" id="edit-nis" name="nis" placeholder="22718"
										value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-lg-7 mb-5 fv-row">
								<div class="col-12">
									<label for="edit-jenis_kelamin" class="form-label">Jenis Kelamin</label>
									<select class="form-select" id="edit-jenis_kelamin" name="jenis_kelamin">
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="col-12 col-lg-5 mb-5 fv-row">
								<div class="col-12">
									<label for="edit-tahun_ajaran" class="form-label required">Tahun Ajaran</label>
									<input type="text" class="form-control" id="edit-tahun_ajaran" name="tahun_ajaran"
										placeholder="2022-2025" value="">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12 mb-5 fv-row">
								<label for="edit-jurusan" class="form-label required">Jurusan</label>
								<select class="form-select" id="edit-jurusan" name="jurusan">
									@foreach($jurusans as $jurusan)
									<option value="{{ $jurusan->singkatan_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
									@endforeach
								</select>
							</div>
						</div>	
						<div class="row mb-5">
							<div class="col-12 col-lg-7 fv-row">
								<div class="col-12">
									<label for="edit-email" class="form-label required">Email</label>
									<input type="email" class="form-control" id="edit-email" name="email"
										placeholder="example@ex.co" value="">
								</div>
							</div>
							<div class="col-12 col-lg-5 fv-row">
								<div class="col-12">
									<label for="edit-nomor_telepon" class="form-label required">Nomor Telepon</label>
									<input type="text" class="form-control" id="edit-nomor_telepon" name="nomor_telepon"
										placeholder="088498787765" value="">
								</div>
							</div>
						</div>
				</div>					
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
			</div>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" id="modalExcel">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase">IMPORT EXCEL</h5>
					<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
						aria-label="Close">
						<i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span class="path2"></span></i>
					</div>
				</div>
	
				<div class="modal-body">
					<div class="row">
						<div class="col-12 mb-4 fv-row">
							<label for="excel" class="form-label">File Excel (.xlsx)</label>
							<input type="file" name="excel" accept=".xlsx" class="form-control">
						</div>
					</div>
	
					<div class="form-check mb-6">
						<input class="form-check-input" type="checkbox" id="add-option" name="add">
						<label class="form-check-label form-label mb-0" for="add-option">
							Tambahkan data user yang belum ada
						</label>
					</div>
	
					<hr class="horizontal dark my-3" />
	
					<article class="px-2">
						<h6 class="text-muted fs-6">Panduan Import</h6>
						<ol>
							<li class="fs-6">Pastikan format file excel sesuai dengan format yang tertera.</li>
							<li class="fs-6">Import akan dimulai dari baris ke dua.</li>
							<li class="fs-6">Pastikan urutan kolom sesuai dengan format.</li>
						</ol>
					</article>
				</div>
	
				<div class="modal-footer">
					<a href="../assets/admin/media/example-format.xlsx" download class="btn btn-secondary mb-0">Download
						Format</a>
					<button type="button" class="btn btn-primary">Import</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const editButtons = document.querySelectorAll('button[data-bs-target="#modalEdit"]');
			editButtons.forEach(button => {
				button.addEventListener('click', function () {
					const id_siswa = this.getAttribute('data-id');
					const nama = this.getAttribute('data-nama');
					const email = this.getAttribute('data-email');
					const nis = this.getAttribute('data-nis');
					const nomor_telepon = this.getAttribute('data-nomor_telepon');
					const jurusan = this.getAttribute('data-jurusan');
					const tahun_ajaran = this.getAttribute('data-tahun_ajaran');					
					const jenis_kelamin = this.getAttribute('data-jenis_kelamin');					

					const editForm = document.getElementById('editForm');
					editForm.action = `/siswa/${id_siswa}`;
					document.getElementById('edit-nama').value = nama;
					document.getElementById('edit-email').value = email;
					document.getElementById('edit-nis').value = nis;
					document.getElementById('edit-nomor_telepon').value = nomor_telepon;
					document.getElementById('edit-jurusan').value = jurusan;
					document.getElementById('edit-tahun_ajaran').value = tahun_ajaran;					
					document.getElementById('edit-jenis_kelamin').value = jenis_kelamin;					
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