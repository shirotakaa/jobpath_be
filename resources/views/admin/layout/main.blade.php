<!DOCTYPE html>
<html lang="en">

<head>
    <title>JobPath - Cari Kerja Impian</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="JobPath adalah platform pencarian kerja modern untuk membantu Anda menemukan pekerjaan impian dengan fitur lengkap. Cocok untuk pencari kerja dari berbagai bidang." />
    <meta name="keywords"
        content="JobPath, lowongan kerja, pencari kerja, karir, pekerjaan, job seeker, portal kerja, rekrutmen, peluang kerja" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="JobPath - Solusi Cerdas untuk Karir Anda" />

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('assets/admin/media/logos/icon-dark.png') }}" />

    {{-- Google Fonts --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    {{-- Plugin Styles --}}
    <link href="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/plugins/custom/select2/select2.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.bundle.css') }}" rel="stylesheet">


    {{-- Main Styles --}}
    <link href="{{ asset('assets/admin/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
	data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-toolbar="true"
	data-kt-app-sidebar-push-footer="true" class="app-default">
	<script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">


            @include('admin.layout.sidebar')
            @include('admin.layout.header')
            @yield('content')
            @include('admin.layout.footer')


		</div>
	</div>
    

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-outline ki-arrow-up"></i>
	</div>
    
    <script>var hostUrl = "{{ asset('assets/admin/') }}";</script>
    <script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom/pages/user-profile/general.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom/pages/user-profile/submit.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/custom/select2/select2.bundle.js') }}"></script>
    <script src="{{ asset('../assets/admin/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>


		<!--begin::Custom Javascript(used for this page only)-->
		<script src="assets/admin/js/widgets.bundle.js"></script>
		<script src="assets/admin/js/custom/widgets.js"></script>
		<script src="assets/admin/js/custom/custom-widgets/widget-1.js"></script>
		<script src="assets/admin/js/custom/custom-widgets/widget-2.js"></script>
		<script src="assets/admin/js/custom/apps/chat/chat.js"></script>
		<script src="assets/admin/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/admin/js/custom/utilities/modals/users-search.js"></script>

</body>

</html>