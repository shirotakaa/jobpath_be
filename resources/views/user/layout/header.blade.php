<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a href="{{ route('user.index') }}" class="d-flex" style="width: 138px; height: 43px;">
                        <img alt="JobPath" src="{{ Storage::url($identitas->logo_dark) }}" style="width: 100%; height: 100%; object-fit: cover;" />
                    </a>
                </div>
                <div class="header-nav mt-0" style="margin: 0px">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li>
                                <a class="active" href="{{ route('user.index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('daftar-pekerjaan') }}">Daftar Pekerjaan</a>
                            </li>
                            <li>
                                <a href="{{ route('perusahaan') }}">Perusahaan</a>
                            </li>
                            <li>
                                <a href="{{ route('jejak-alumni') }}">Jejak Alumni</a>
                            </li>
                            <li>
                                <a href="{{ route('faq-user') }}">FAQ</a>
                            </li>
                        </ul>
                    </nav>
                    
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</div>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="user-account">
                <img src="assets/user/imgs/avatar/ava_1.png" alt="JobPath" class="w-100 h-100 object-fit-cover"/>
                <div class="content">
                    <h6 class="user-name">Howdy</h6>
                    <p class="font-xs text-muted">howdy@gmail.com</p>
                </div>
            </div>
            <div class="burger-icon burger-icon-white">
                <span class="burger-icon-top"></span>
                <span class="burger-icon-mid"></span>
                <span class="burger-icon-bottom"></span>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children">
                                <a class="active" href="{{ route('user.index') }}">Home</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('daftar-pekerjaan') }}">Daftar Pekerjaan</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('perusahaan') }}">Perusahaan</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('jejak-alumni') }}">Jejak Alumni</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('faq-user') }}">FAQ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Your Account</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="profile-user.html">Profil Saya</a></li>
                        <li><a href="{{ route('profile-save-job') }}">Pekerjaan Tersimpan</a></li>
                        <li><a href="{{ route('user.lamaran') }}">Lamaran Saya</a></li>
                        <li><a href="{{ route('profile-change-pw') }}">Ubah Kata Sandi</a></li>
                        <li><a href="index.html">Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>