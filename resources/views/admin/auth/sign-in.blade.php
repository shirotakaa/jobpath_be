<!DOCTYPE html>
<html lang="en">

<head>
	<base href="" />
	<base href="../" />
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
	<link rel="shortcut icon" href="assets/admin/media/logos/icon-dark.png" />
	<!--Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link href="assets/admin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/admin/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank">
	<!--begin::Theme mode setup on page load-->
	<script>var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if (localStorage.getItem("data-bs-theme") !== null) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
	<!--end::Theme mode setup on page load-->

	<div class="d-flex flex-column flex-root" id="kt_app_root">
		<div class="d-flex flex-column flex-lg-row flex-column-fluid">
			<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
				<div class="d-flex flex-center flex-column flex-lg-row-fluid">
					<div class=" w-100 w-lg-500px p-lg-10">
						<form id="kt_sign_in_form" data-kt-redirect-url="{{ route('dashboard') }}" action="{{ route('login-admin') }}" method="POST">
							@csrf
							<div class="text-center mb-11">
								<h1 class="text-gray-900 fw-bolder mb-3">Sign In</h1>
								<div class="text-gray-500 fw-semibold fs-6">Job Path Jalur Menuju Job Impian</div>
							</div>
							<hr class="text-gray-500 my-14">
							</hr>
							<div class="fv-row mb-5">
								<input type="text" placeholder="Masukkan Username, Email, atau No. Telepon" name="email"
									autocomplete="off" class="form-control bg-transparent" />
							</div>
							<div class="fv-row mb-8 position-relative">
								<input type="password" placeholder="Masukkan Password" name="password" id="password"
									autocomplete="off" class="form-control bg-transparent" />
									<span id="togglePassword" class="btn btn-sm btn-icon position-absolute end-0 top-50 translate-middle-y me-3">
										<i class="bi bi-eye-slash fs-2" id="toggleIcon"></i>
									</span>
							</div>
							<div class="d-grid mb-10">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
									<span class="indicator-label">Sign In</span>
									<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
						</form>
					</div>
				</div>
				<div class="d-flex justify-content-center text-center">
					<div class="me-10">
						<div class="text-dark order-2 order-md-1">
							<span class="text-muted fw-semibold me-1">
								<script>
									document.write(new Date().getFullYear());
								</script>
								©
							</span> <a href="#" target="_blank" class="text-gray-800 text-hover-primary">JOB PATH.</a>
							<br>
							All Rights Reserved Our Team
						</div>
					</div>
				</div>

				<div class="w-lg-500px d-flex flex-stack px-10 mx-auto">

				</div>
			</div>

			<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
				style="background-image: url(assets/admin/media/misc/auth-bg.png)">
				<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
					<a href="index.html" class="mb-0 mb-lg-2">
						<img alt="Logo" src="assets/admin/media/JobPathLight.svg" class="h-60px h-lg-75px" />
					</a>
					<!-- <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">JOB PATH</h1> -->
					<div class="d-none d-lg-block text-white fs-base text-center">
						Selamat datang di JobPath, platform eksklusif yang menghubungkan pencari kerja dengan lembaga
						pendidikan anda.
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--begin Javascript-->
	<script>var hostUrl = "assets/admin/";</script>

	<script src="assets/admin/plugins/global/plugins.bundle.js"></script>
	<script src="assets/admin/js/scripts.bundle.js"></script>

	<script src="assets/admin/js/custom/authentication/sign-in/general.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function () {
			var togglePassword = document.getElementById("togglePassword");
			var passwordInput = document.getElementById("password");
			var toggleIcon = document.getElementById("toggleIcon");

			togglePassword.addEventListener("click", function () {
				if (passwordInput.type === "password") {
					passwordInput.type = "text";
					toggleIcon.classList.remove("bi-eye-slash");
					toggleIcon.classList.add("bi-eye");
				} else {
					passwordInput.type = "password";
					toggleIcon.classList.remove("bi-eye");
					toggleIcon.classList.add("bi-eye-slash");
				}
			});
		});
	</script>

	<!--end Javascript-->
</body>

</html>