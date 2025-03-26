<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a href="{{ route('guest.index') }}" class="d-flex" style="width: 138px; height: 43px;">
                        <img alt="JobPath" src="{{ Storage::url($identitas->logo_dark) }}"
                            style="width: 100%; height: 100%; object-fit: cover;" />
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu d-none d-xl-block">
                        <ul class="main-menu">
                            <li>
                                <a href="{{ route('guest.index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('guest-list-perusahaan') }}">Perusahaan</a>
                            </li>
                            <li>
                                <a href="{{ route('guest-jejak-alumni') }}">Jejak Alumni</a>
                            </li>
                            <li>
                                <a href="{{ route('guest-faq') }}">FAQ</a>
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
                    <a href="#" class="btn btn-default btn-shadow ml-40 hover-up" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Login</a>
                    <a href="{{ route('guest-perusahaan') }}"
                        class="btn btn-default btn-shadow ml-10 hover-up">Perusahaan</a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top" style="padding: 34px 70px 70px 70px;">
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
                                <a href="{{ route('guest.index') }}">Home</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('perusahaan') }}">Perusahaan</a>
                            </li>
                            <li class="has-children">
                                <a href="{{ route('guest-jejak-alumni') }}">Jejak Alumni</a>
                            </li>
                            <li class="has-children">
                                <a href="faq-user.html">FAQ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="block-signin mt-3">
                    <a href="#" class="btn btn-default btn-shadow me-2 hover-up" data-bs-toggle="modal"
                        data-bs-target="#loginModal">Login</a>
                    <a href="{{ route('index-perusahaan') }}"
                        class="btn btn-default btn-shadow hover-up">Perusahaan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End header-->