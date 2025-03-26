    <!-- Footer -->
    <footer class="footer mt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <a href="{{ route('guest.index') }}">
                        <img alt="JobPath" src="{{ Storage::url($identitas->logo_dark) }}"
                            style="width: 134px; height: 43px; object-fit: cover;" />
                    </a>
                    <div class="mt-20 mb-20" style="width: 70%;">{{ $identitas->deskripsi }}</div>
                </div>
                <div class="col-md-2 col-xs-6">
                    <h6>Navigasi</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="{{ route('guest.index') }}">Home</a></li>
                        <li><a href="#">Daftar Perusahaan</a></li>
                        <li><a href="{{ route('guest-jejak-alumni') }}">Jejak Alumni</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-xs-6">
                    <h6>Informasi</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">Landing Page Perusahaan</a></li>
                        <li><a href="#">Form Alumni</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-xs-6">
                    <h6>Bantuan</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Pusat Bantuan</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                        <li><a href="#">Panduan Pengguna</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-xs-6">
                    <h6>Legal</h6>
                    <ul class="menu-footer mt-40">
                        <li><a href="#">Hak Cipta</a></li>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat Penggunaan</a></li>
                        <li><a href="#">Laporan Masalah</a></li>
                    </ul>
                </div>


            </div>
            <div class="footer-bottom mt-50">
                <div class="row">
                    <div class="col-md-6" style="width: 100%;">
                        <div class="footer-social text-center">
                            @if (!empty($identitas->facebook))
                                <a href="{{ $identitas->facebook }}" class="icon-socials icon-facebook"
                                    target="_blank"></a>
                            @endif
                            @if (!empty($identitas->instagram))
                                <a href="{{ $identitas->instagram }}" class="icon-socials icon-instagram"
                                    target="_blank"></a>
                            @endif
                            @if (!empty($identitas->youtube))
                                <a href="{{ $identitas->youtube }}" target="_blank" class="me-2">
                                    <i class="bi bi-youtube"></i>
                                </a>
                            @endif
                            @if (!empty($identitas->tiktok))
                                <a href="{{ $identitas->tiktok }}" class="icon-socials icon-tiktok" target="_blank"></a>
                            @endif
                            @if (!empty($identitas->whatsapp))
                                <a href="https://wa.me/{{ $identitas->whatsapp }}" class="icon-socials icon-whatsapp"
                                    target="_blank"></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Tombol Login -->
