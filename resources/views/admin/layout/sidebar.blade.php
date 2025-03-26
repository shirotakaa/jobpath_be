
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">

    <div id="kt_app_sidebar" class="app-sidebar" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
        data-kt-drawer-width="auto" data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
        <div id="kt_aside_menu_wrapper"
            class="app-sidebar-menu flex-grow-1 hover-scroll-y scroll-lg-ps my-5 pt-8" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
            <div id="kt_aside_menu"
                class="menu menu-rounded menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-6"
                data-kt-menu="true">
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="right-start" class="menu-item {{ Request::is('dashboard') ? 'show here' : '' }} py-2">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="ki-outline ki-home-2 fs-1"></i>
                        </span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span
                                    class="menu-section fs-5 fw-bolder ps-1 py-1 text-uppercase">Home</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a href="{{ route('dashboard') }}" class="menu-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="right-start" class="menu-item {{ Request::is('pengaturan-identitas') ? 'show here' : '' }} py-2">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="ki-outline ki-setting-4 fs-1"></i>
                        </span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span
                                    class="menu-section fs-5 fw-bolder ps-1 py-1 text-uppercase">Setting</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a href="{{ route('pengaturan-identitas') }}" class="menu-link {{ Request::is('pengaturan-identitas') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Pengaturan Identitas</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="right-start" class="menu-item {{ Request::is('hero-landing', 'perusahaan-landing', 'alumni-landing') ? 'show here' : '' }} py-2">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="ki-outline ki-menu fs-1"></i>
                        </span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1 text-uppercase">Menu Home Page</span>
                            </div>
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a href="{{ route('hero-landing') }}" class="menu-link {{ Request::is('hero-landing') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Section Hero</span>
                                </a> </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a href="{{ route('perusahaan-landing') }}" class="menu-link {{ Request::is('perusahaan-landing') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Section Perusahaan</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a href="{{ route('alumni-landing') }}" class="menu-link {{ Request::is('alumni-landing') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Section Alumni</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a href="{{ route('faq.index') }}" class="menu-link {{ Request::is('faq') ? 'active' : '' }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Halaman FAQ</span>
                            </a>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a href="{{ route('landing-perusahaan') }}" class="menu-link {{ Request::is('landing-perusahaan') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Landing Page Perusahaan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="right-start" class="menu-item {{ Request::is('kategori-pekerjaan', 'kelola-perusahaan', 'tambah-pekerjaan') ? 'show here' : '' }} py-2">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="ki-outline ki-briefcase fs-1"></i>
                        </span>
                    </span>
                    <div
                        class="menu-sub menu-sub-dropdown menu-sub-indention px-2 py-4 w-250px mh-75 overflow-auto">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1 text-uppercase">Lowongan Kerja</span>
                            </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a href="{{ route('kelola-perusahaan') }}" class="menu-link {{ Request::is('kelola-perusahaan') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Kelola Perusahaan</span>
                                </a>
                            </div>
                        </div>
                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a href="{{ route('tambah-pekerjaan') }}" class="menu-link {{ Request::is('tambah-pekerjaan') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Tambah Pekerjaan</span>
                                </a> </div>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                    data-kt-menu-placement="right-start" class="menu-item {{ Request::is('kelola-jurusan', 'data-user', 'data-pekerjaan-alumni') ? 'show here' : '' }} py-2">
                    <span class="menu-link menu-center">
                        <span class="menu-icon me-0">
                            <i class="ki-outline ki-graph-up fs-1"></i>
                        </span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown px-2 py-4 w-250px mh-75 overflow-auto">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1 text-uppercase">User & Jejak Alumni</span>
                            </div>
                        </div>

                        <div class="menu-sub menu-sub-accordion">
                            <div class="menu-item">
                                <a href="{{ route('kelola-jurusan') }}" class="menu-link {{ Request::is('kelola-jurusan') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Kelola Jurusan</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('data-user') }}" class="menu-link {{ Request::is('data-user') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data User</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a href="{{ route('data-pekerjaan-alumni') }}" class="menu-link {{ Request::is('data-pekerjaan-alumni') ? 'active' : '' }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Data Pekerjaan Alumni</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-center pb-4 pb-lg-8" id="kt_app_sidebar_footer"> <a href="#"
                class="btn btn-icon btn-active-color-primary"
                data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                data-kt-menu-placement="bottom-end">
                <i class="ki-outline ki-night-day theme-light-show fs-2x"></i>
                <i class="ki-outline ki-moon theme-dark-show fs-2x"></i>
            </a>
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                data-kt-menu="true" data-kt-element="theme-mode-menu">
                <div class="menu-item px-3 my-0">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                        <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-night-day fs-2"></i>
                        </span>
                        <span class="menu-title">Light</span>
                    </a>
                </div>
                <div class="menu-item px-3 my-0">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                        <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-moon fs-2"></i>
                        </span>
                        <span class="menu-title">Dark</span>
                    </a>
                </div>
                <div class="menu-item px-3 my-0">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                        <span class="menu-icon" data-kt-element="icon">
                            <i class="ki-outline ki-screen fs-2"></i>
                        </span>
                        <span class="menu-title">System</span>
                    </a>
                </div>
            </div>
        </div>
    </div>