<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HeroLandingController;
use App\Http\Controllers\IdentitasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FaqContentController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\JejakAlumniController;
use App\Http\Controllers\PerusahaanContentController;
use App\Http\Controllers\UserProfileController;
use App\Models\Pelamar;

// Route::get('/', function () {
//     return view('guest.index');
// });

Route::get('/', function () {
    return view('guest.index');
})->name('guest.index');

Route::get('/', [IdentitasController::class, 'guestIndex'])->name('guest.index');
Route::get('/guest-jejak-alumni', [IdentitasController::class, 'guestJejakAlumni'])->name('guest-jejak-alumni');
Route::get('/guest-list-perusahaan', [IdentitasController::class, 'guestPerusahaan'])->name('guest-list-perusahaan');
Route::get('/guest-faq', [IdentitasController::class, 'guestFaq'])->name('guest-faq');

Route::get('/guest-perusahaan', [IdentitasController::class, 'PerusahaanGuest'])->name('guest-perusahaan');
Route::get('/guest-faq-perusahaan', [IdentitasController::class, 'PerusahaanFaq'])->name('guest-faq-perusahaan');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/pengaturan-identitas', [AdminController::class, 'pengaturanIdentitas'])->name('pengaturan-identitas');

Route::get('/hero-landing', [AdminController::class, 'heroLanding'])->name('hero-landing');

Route::get('/hero', [HeroLandingController::class, 'index'])->name('hero-landing');
Route::get('/identitas', [IdentitasController::class, 'index'])->name('pengaturan-identitas');

Route::get('/admin/perusahaan-landing', [AdminController::class, 'perusahaanLanding'])->name('admin.perusahaanLanding');
Route::put('/admin/perusahaan-landing/{id}', [AdminController::class, 'updatePerusahaanLanding'])->name('admin.updatePerusahaanLanding');

Route::get('/perusahaan-landing', [AdminController::class, 'perusahaanLanding'])->name('perusahaan-landing');
Route::get('/landing-perusahaan', [AdminController::class, 'landingPerusahaan'])->name('landing-perusahaan');
Route::get('/alumni-landing', [AdminController::class, 'alumniLanding'])->name('alumni-landing');

Route::get('/admin/alumni-landing', [AdminController::class, 'alumniLanding'])->name('admin.alumniLanding');
Route::put('/admin/alumni-landing/{id}', [AdminController::class, 'updateAlumniLanding'])->name('admin.updateAlumniLanding');

Route::get('/admin/perusahaan-content', [PerusahaanContentController::class, 'edit'])->name('perusahaan_content.edit');
Route::put('/admin/perusahaan-content/{id}', [PerusahaanContentController::class, 'update'])->name('perusahaan_content.update');

Route::get('/kategori-pekerjaan', [AdminController::class, 'kategoriPekerjaan'])->name('kategori-pekerjaan');
Route::get('/kelola-perusahaan', [AdminController::class, 'kelolaPerusahaan'])->name('kelola-perusahaan');
Route::get('/kelola-jurusan', [AdminController::class, 'kelolaJurusan'])->name('kelola-jurusan');

// Route::get('/data-user', [AdminController::class, 'dataUser'])->name('data-user');
Route::get('/data-user', [AdminController::class, 'kelolaSiswa'])->name('data-user');


Route::get('/profil', [AdminController::class, 'profil'])->name('profil');
Route::get('/edit-profil', [AdminController::class, 'editProfil'])->name('edit-profil');

Route::get('/sign-in', [AuthController::class, 'signIn'])->name('sign-in');
Route::post('/login-admin', [AuthController::class, 'loginAdmin'])->name('login-admin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'signIn'])->name('login');

Route::post('/login-siswa', [AuthController::class, 'loginSiswa'])->name('login-siswa');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Siswa
Route::get('/index', [AuthController::class, 'index'])->name('user.index');

Route::resource('jurusan', JurusanController::class);
Route::resource('hero-landing', HeroLandingController::class);

Route::get('/identitas/edit', [IdentitasController::class, 'edit'])->name('identitas.edit');
Route::put('/identitas/update', [IdentitasController::class, 'update'])->name('identitas.update');

Route::resource('perusahaan', PerusahaanController::class);
Route::get('/register-perusahaan', function () {
    return view('perusahaan.auth.register-perusahaan');
})->name('register-perusahaan');
Route::get('/login-perusahaan', function () {
    return view('perusahaan.auth.login-perusahaan');
})->name('login-perusahaan');

// Route::post('/login-perusahaan', [AuthController::class, 'loginPerusahaan'])->name('login-perusahaan.submit');

Route::get('/index-perusahaan', [IdentitasController::class, 'PerusahaanGuest'])->name('index-perusahaan');
Route::get('/company-landing', [UserController::class, 'landing'])->name('company.landing');

Route::get('/company-job', [UserController::class, 'job'])->name('company.job');
Route::delete('/company-job/{id}', [PekerjaanController::class, 'destroy'])->name('pekerjaan.deletejob');

Route::get('/company-profile', [UserController::class, 'profile'])->name('companyprofile');
Route::get('/company-change-pw', [UserController::class, 'PwChange'])->name('company-change-pw');
Route::get('/company-faq', [UserController::class, 'faqCompany'])->name('company-faq');

Route::get('/profile-save-job', [UserController::class, 'saveJob'])->name('profile-save-job');
Route::get('/profile-change-pw', [UserController::class, 'changePw'])->name('profile-change-pw');

Route::get('/tambah-pekerjaan', [AdminController::class, 'kelolaPekerjaan'])->name('tambah-pekerjaan');
// Route::get('/tambah-pekerjaan', [AdminController::class, 'tambahPekerjaan'])->name('tambah-pekerjaan');

Route::get('/detail-pekerjaan', [UserController::class, 'detailPekerjaan'])->name('detail-pekerjaan');

Route::get('/jejak-alumni', [UserController::class, 'jejakAlumni'])->name('jejak-alumni');
Route::get('/faq-user', [UserController::class, 'faqUser'])->name('faq-user');
Route::get('/jejak-alumni-form', [UserController::class, 'jejakAlumniForm'])->name('jejak-alumni-form');

Route::get('/profile', [UserController::class, 'profil'])->name('profile');
Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('siswa.show');
Route::middleware(['auth:siswa'])->group(function () {
    Route::put('/profil/update', [UserProfileController::class, 'update'])->name('siswa.profil.update');
});

Route::get('/perusahaan', [UserController::class, 'perusahaan'])->name('perusahaan');

Route::get('/admin/profil', [AdminProfileController::class, 'index'])->name('admin.profil');
Route::get('/admin/profil.edit', [AdminProfileController::class, 'edit'])->name('admin.profil.edit');
Route::put('/admin/profil', [AdminProfileController::class, 'update'])->name('admin.profil.update');




Route::get('/login-perusahaan', [AuthController::class, 'showLoginFormPerusahaan'])->name('login-perusahaan');
Route::post('/login-perusahaan', [AuthController::class, 'loginPerusahaan'])->name('login-perusahaan.submit');

// Route::get('/data-user', [SiswaController::class, 'index'])->name('data-user.index');
Route::resource('siswa', SiswaController::class);


Route::resource('faq', FaqController::class);
Route::resource('faq-content', FaqContentController::class)->only(['update']);

// Route untuk admin
Route::get('/pekerjaan', [PekerjaanController::class, 'index'])->name('pekerjaan.index');
Route::get('/pekerjaan/kelola', [PekerjaanController::class, 'kelolaPerusahaan'])->name('pekerjaan.kelola');
Route::post('/pekerjaan/store-admin', [PekerjaanController::class, 'storeAdmin'])->name('pekerjaan.storeAdmin');
Route::get('/pekerjaan/{pekerjaan}/edit', [PekerjaanController::class, 'edit'])->name('pekerjaan.edit');
Route::put('/pekerjaan/{id_pekerjaan}', [PekerjaanController::class, 'update'])->name('pekerjaan.update');
Route::delete('/pekerjaan/{pekerjaan}', [PekerjaanController::class, 'destroy'])->name('pekerjaan.destroy');

Route::put('/pekerjaan/{pekerjaan}/available', [PekerjaanController::class, 'available'])->name('pekerjaan.available');
Route::put('/pekerjaan/{pekerjaan}/expired', [PekerjaanController::class, 'expired'])->name('pekerjaan.expired');
Route::put('/pekerjaan/{pekerjaan}/approved', [PekerjaanController::class, 'approved'])->name('pekerjaan.approved');
Route::put('/pekerjaan/{pekerjaan}/rejected', [PekerjaanController::class, 'rejected'])->name('pekerjaan.rejected');
;

// Route untuk user
Route::post('/pekerjaan/store-user', [PekerjaanController::class, 'storeUser'])->name('pekerjaan.storeUser');

Route::get('/company-add-job', [UserController::class, 'addjob'])->name('company.addjob');

Route::get('/daftar-pekerjaan', [UserController::class, 'daftarPekerjaan'])->name('daftar-pekerjaan');
Route::get('/detail-pekerjaan/{judul_pekerjaan}', [UserController::class, 'detailPekerjaan'])->name('detail-pekerjaan');
// Simpan lamaran kerja
Route::post('/lamar-pekerjaan', [PelamarController::class, 'store'])->name('pelamar.store');

Route::get('/company-pelamar', [UserController::class, 'pelamar'])->name('company.pelamar');
Route::delete('/pelamar/{id_pelamar}', [PelamarController::class, 'destroy'])->name('pelamar.destroy');
Route::get('/lamaran', [UserController::class, 'lamaran'])->name('user.lamaran');
Route::get('/get-pelamar-detail/{id}', function($id) {
    $pelamar = Pelamar::join('pekerjaan', 'pelamar.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
        ->where('pelamar.id_pelamar', $id)
        ->select(
            'pekerjaan.lokasi',
            'pekerjaan.rentang_gaji',
            'pekerjaan.about_job'
        )
        ->first();

    return response()->json($pelamar);
}); 
Route::put('/pelamar/{id}', [PelamarController::class, 'update'])->name('pelamar.update');
Route::put('/pelamar/update-kelanjutan/{id_pelamar}', [PelamarController::class, 'updateKelanjutan'])->name('pelamar.update-kelanjutan');
Route::put('/pelamar/{pelamar}/approved', [PelamarController::class, 'approved'])->name('pelamar.approved');
Route::put('/pelamar/{pelamar}/rejected', [PelamarController::class, 'rejected'])->name('pelamar.rejected');

Route::post('/store-alumni', [JejakAlumniController::class, 'storeAlumni'])->name('storeAlumni');

Route::get('data-pekerjaan-alumni', [JejakAlumniController::class, 'index'])->name('data-pekerjaan-alumni');
// Route::get('data-pekerjaan-alumni', [AdminController::class, 'kelolaAlumni'])->name('data-pekerjaan-alumni');

Route::post('jejakalumni/store', [JejakAlumniController::class, 'storeAdminAlumni'])->name('jejakalumni.store');
// Route::get('jejakalumni', [JejakAlumniController::class, 'index'])->name('jejakalumni.index');
Route::get('jejakalumni/create', [JejakAlumniController::class, 'create'])->name('jejakalumni.create');
Route::get('jejakalumni/{id}/edit', [JejakAlumniController::class, 'edit'])->name('jejakalumni.edit');
Route::put('jejakalumni/{id}', [JejakAlumniController::class, 'update'])->name('jejakalumni.update');
Route::delete('jejakalumni/{id}', [JejakAlumniController::class, 'destroy'])->name('jejakalumni.destroy');
Route::put('/jejakalumni/{jejakAlumni}/approved', [JejakAlumniController::class, 'approve'])->name('jejakalumni.approve');
Route::put('/jejakalumni/{jejakAlumni}/rejected', [JejakAlumniController::class, 'reject'])->name('jejakalumni.reject');

