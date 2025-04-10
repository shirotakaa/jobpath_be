<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a href="{{ route('company.landing') }}" class="d-flex" style="width: 138px; height: 43px;">
                        <img alt="JobPath" src="{{ Storage::url($identitas->logo_dark) }}"
                        style="width: 100%; height: 100%; object-fit: cover;" />
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li>
                                <a class="active" href="{{ route('company.landing') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('company.job') }}">Pekerjaan</a>
                            </li>
                            <li>
                                <a href="{{ route('company.pelamar') }}">Pelamar</a>
                            </li>
                            <li>
                                <a href="{{ route('company-faq') }}">FAQ</a>
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
            <div class="header-right">
                <div class="block-signin">
                    <a href="{{ route('company.addjob') }}" class="btn btn-default btn-shadow ml-10 hover-up">Add Job Now</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <?php
                $user = Auth::guard('perusahaan')->user();
            ?>

            <div class="user-account">
                <img src="<?= $user->logo ?>" alt="<?= $user->nama_perusahaan ?>" class="w-100 h-100 object-fit-cover" />
                <div class="content">
                    <h6 class="user-name"><?= $user->nama_perusahaan ?></h6>
                    <p class="font-xs text-muted"><?= $user->email ?></p>
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
                                <a class="active" href="{{ route('company.landing') }}">Home</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('company.job') }}">Pekerjaan</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('company.pelamar') }}">Pelamar</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('company-faq') }}">FAQ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Your Account</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="{{ route('companyprofile') }}">Profil Saya</a></li>
                        <li>
                            <form id="logout-form" action="{{ route('perusahaan.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="block-signin mt-3 d-flex align-items-center mobile-wrap">
                    <a href="{{ route('company.addjob') }}" class="btn btn-default btn-shadow hover-up">Add Job Now</a>
                </div>
            </div>
        </div>
    </div>
</div>