@php
    $pageTitles = [
        'dashboard' => 'Dashboard',
        'pengaturan-identitas' => 'Pengaturan Identitas',
        'identitas.index' => 'Pengaturan Identitas',
        'hero-landing.index' => 'Hero Landing',
        'perusahaan-landing' => 'Perusahaan Landing',
        'alumni-landing' => 'Alumni Landing',
        'kategori-pekerjaan' => 'Kategori Pekerjaan',
        'kelola-perusahaan' => 'Kelola Perusahaan',
        'perusahaan.index' => 'Kelola Perusahaan',
        'tambah-pekerjaan' => 'Tambah Pekerjaan',
        'jurusan.index' => 'Kelola Jurusan',
        'data-user' => 'Data User',
        'data-pekerjaan-alumni' => 'Data Pekerjaan Alumni',
        'profil' => 'Profil',
        'admin.profil.edit' => 'Edit Profil', 
        'admin.profil' => 'Profil',
        'faq.index' => 'FAQ', 
    ];

    $currentRouteName = Route::currentRouteName();
    $pageTitle = $pageTitles[$currentRouteName] ?? ucfirst(str_replace('-', ' ', $currentRouteName));
@endphp

<div id="kt_app_header" class="app-header d-flex">
    <div class="app-container container-fluid d-flex align-items-center justify-content-between"
        id="kt_app_header_container">
        <div class="app-header-logo d-flex flex-center">
            <a href="{{ route('dashboard') }}">
                <img alt="Logo" src="{{ asset('assets/admin/media/logos/icon-dark.png') }}" class="mh-60px" />
            </a>            
            <button class="btn btn-icon btn-sm btn-active-color-primary d-flex d-lg-none"
                id="kt_app_sidebar_mobile_toggle">
                <i class="ki-outline ki-abstract-14 fs-1"></i>
            </button>
        </div>
        <div class="d-flex flex-lg-grow-1 flex-stack" id="kt_app_header_wrapper">
            <div class="app-header-wrapper d-flex align-items-center justify-content-around justify-content-lg-between flex-wrap gap-6 gap-lg-0 mb-6 mb-lg-0"
                data-kt-swapper="true" data-kt-swapper-mode="{default: 'prepend', lg: 'prepend'}"
                data-kt-swapper-parent="{default: '#kt_app_content_container', lg: '#kt_app_header_wrapper'}">
                <div class="d-flex flex-column justify-content-center">
                    <h1 class="text-gray-900 fw-bold fs-6 mb-2">{{ $pageTitle }}</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-base">
                        <li class="breadcrumb-item text-muted {{ Route::currentRouteName() == 'dashboard' ? 'text-primary fw-bold' : '' }}">
                            <a href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">/</li>
                        <li class="breadcrumb-item text-muted fw-bold">{{ $pageTitle }}</li>
                    </ul>                    
                </div>
                <div class="d-none d-md-block h-40px border-start border-gray-200 mx-10"></div>
            </div>
            <div class="app-navbar flex-shrink-0 gap-2 gap-lg-4">
                <div class="app-navbar-item" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-40px"
                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img src="{{ asset($admin->avatar ?? '/assets/admin/media/svg/blank.svg') }}" class="rounded-3" alt="user" />
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ asset($admin->avatar ?? '/assets/admin/media/svg/blank.svg') }}" class="rounded-3" />
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ $admin->nama_depan ?? 'Admin' }} 
                                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Admin</span>
                                    </div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                        {{ $admin->email ?? 'admin@example.com' }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="{{ route('admin.profil') }}" class="menu-link px-5 {{ request()->routeIs('profil') ? 'active' : '' }}">Profil</a>
                        </div>                        
                        <div class="menu-item px-5">
                            <a href="{{ route('sign-in') }}" class="menu-link px-5 logout-link">Keluar</a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const logoutButton = document.querySelector(".logout-link");

    if (logoutButton) {
        logoutButton.addEventListener("click", function(event) {
            event.preventDefault();
            // ALert logout
            Swal.fire({
                text: "Apakah Anda yakin ingin keluar?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Ya, Keluar",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((result) => {
                if (result.value) {
                    // Redirect ke route 'sign-in'
                    window.location.href = logoutButton.href;
                }
            });
        });
    }
});
</script>