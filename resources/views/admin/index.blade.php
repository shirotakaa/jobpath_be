@extends('admin.layout.main')
@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">

        {{-- Konten utama halaman dashboard --}}
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-fluid">

                <div class="row g-5 g-xl-10">

                    {{-- Kartu Selamat Datang Admin --}}
                    <div class="col-lg-6">
                        <div class="card card-flush h-md-100">
                            <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                                style="background-position: 100% 50%; background-image:url('{{ asset('assets/admin/media/stock/900x600/42.png') }}')">
                                
                                {{-- Teks sambutan --}}
                                <div class="mb-10">
                                    <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                                        <span class="me-2">Selamat datang <br> {{ $admin->nama_depan }} {{ $admin->nama_belakang }}!</span>
                                    </div>
                                </div>

                                {{-- Gambar ilustrasi untuk dashboard --}}
                                <img class="mx-auto h-150px h-lg-250px theme-light-show"
                                    src="{{ asset('assets/admin/media/upgrade.svg') }}" alt="assetdashboard"
                                    draggable="false" />
                                <img class="mx-auto h-150px h-lg-250px theme-dark-show"
                                    src="{{ asset('assets/admin/media/upgrade-dark.svg') }}" alt="assetdashboard"
                                    draggable="false" />
                            </div>
                        </div>
                    </div>

                    {{-- Kartu Data Alumni dan Perusahaan --}}
                    <div class="col-lg-6 d-flex flex-column gap-5">

                        {{-- Kartu Data Alumni --}}
                        <div class="card card-flush" style="background: linear-gradient(180deg, #1858FD 0%, #1652EA 100%); box-shadow: 0px 14px 40px 0px rgba(24, 85, 243, 0.20);">
                            <div class="card-header align-items-center pt-6">

                                {{-- Icon Alumni --}}
                                <div class="symbol symbol-50px me-4">
                                    <div class="symbol-label bg-transparent rounded-lg" style="border: 1px dashed rgba(255, 255, 255, 0.20)">
                                        <i class="ki-outline ki-user text-white fs-1"></i>
                                    </div>
                                </div>

                                {{-- Judul dan deskripsi --}}
                                <div class="card-title flex-column flex-grow-1">
                                    <span class="card-label fw-bold fs-3 text-white">Data Alumni</span>
                                    <span class="text-white opacity-50 fw-semibold fs-base">Total Data Alumni SMKN 4 Malang</span>
                                </div>

                                {{-- Tombol Lihat Data --}}
                                <div class="card-toolbar">
                                    <a href="{{ route('data-pekerjaan-alumni') }}" class="btn btn-sm btn-text-white bg-white bg-opacity-10" style="border: 1px solid rgba(255, 255, 255, 0.20)">Lihat Data</a>
                                </div>
                            </div>

                            {{-- Jumlah Alumni --}}
                            <div class="card-body d-flex align-items-end pb-0">
                                <div class="d-flex flex-stack flex-row-fluid">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-1">
                                            <span class="fs-2hx fw-bold text-white me-2"> {{ $alumni->where('status', 'Approved')->count() }} </span>
                                            <span class="fw-semibold text-white opacity-50">Alumni</span>
                                        </div>
                                    </div>

                                    {{-- Placeholder Chart (belum diisi) --}}
                                    <div id="kt_charts_widget_47" class="h-125px w-200px min-h-auto"></div>
                                </div>
                            </div>
                        </div>

                        {{-- Kartu Data Perusahaan --}}
                        <div class="card card-flush">
                            <div class="card-header justify-content-start align-items-center pt-6">

                                {{-- Icon Perusahaan --}}
                                <div class="symbol symbol-50px me-4">
                                    <div class="symbol-label border border-dashed border-gray-300">
                                        <i class="ki-outline ki-office-bag text-info fs-1"></i>
                                    </div>
                                </div>

                                {{-- Judul dan deskripsi --}}
                                <div class="card-title flex-column flex-grow-1">
                                    <span class="card-label fw-bold fs-3 text-gray-800">Perusahaan</span>
                                    <span class="text-gray-500 fw-semibold fs-base">Total Perusahaan yang Bekerja sama</span>
                                </div>

                                {{-- Tombol Lihat Data --}}
                                <div class="card-toolbar">
                                    <a href="{{ route('kelola-perusahaan') }}" class="btn btn-sm btn-secondary">Lihat Data</a>
                                </div>
                            </div>

                            {{-- Jumlah Perusahaan --}}
                            <div class="card-body d-flex align-items-end pb-0">
                                <div class="d-flex flex-stack flex-row-fluid">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex align-items-center mb-1">
                                            <span class="fs-2hx fw-bold text-gray-800 me-2">{{ $perusahaan->count() }}</span>
                                            <span class="fw-semibold text-success fs-6">Perusahaan</span>
                                        </div>
                                    </div>

                                    {{-- Placeholder Chart (belum diisi) --}}
                                    <div id="kt_charts_widget_48" class="h-125px w-200px min-h-auto"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div> {{-- End col-lg-6 --}}
                </div> {{-- End row --}}

            </div>
        </div>
    </div>
</div>

@endsection
