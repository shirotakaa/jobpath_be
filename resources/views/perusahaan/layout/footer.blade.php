<footer class="footer mt-50">
    <div class="container">
        <div class="row align-items-start">
            <!-- Kolom kiri (logo dan deskripsi) -->
            <div class="col-md-4 col-sm-12">
                <a href="{{ route('company.landing') }}">
                    <img alt="JobPath" src="{{ Storage::url($identitas->logo_dark) }}"
                         style="width: 134px; height: 43px; object-fit: cover;" />
                </a>
                <div class="mt-20 mb-20" style="width: 70%;">
                    Temukan peluang kerja terbaik untuk masa depan Anda. Bangun karier yang sesuai dengan minat dan keahlian Anda.
                </div>
            </div>

            <!-- Spacer untuk mendorong ke kanan -->
            <div class="col-md-4"></div>

            <!-- Kolom kanan (navigasi dan lokasi) -->
            <div class="col-md-4 d-flex justify-content-end">
                <div class="d-flex gap-5">
                    <!-- Navigasi -->
                    <div>
                        <h6>Navigasi</h6>
                        <ul class="menu-footer mt-40">
                            <li><a href="{{ route('company.landing') }}">Home</a></li>
                            <li><a href="{{ route('company.job') }}">Pekerjaan</a></li>
                            <li><a href="{{ route('company.pelamar') }}">Pelamar</a></li>
                            <li><a href="{{ route('company-faq') }}">FAQ</a></li>
                        </ul>
                    </div>

                    <!-- Lokasi dan sosmed -->
                    <div>
                        <h6>Lokasi</h6>
                        <ul class="menu-footer mt-40">
                            <li><a>Jl. Tanimbar No.2 Kasin, Malang</a></li>
                        </ul>
                        <div class="footer-bottom footer-bottom-sosial mt-50">
                            <div class="footer-social text-left">
                                <a href="#" class="icon-socials icon-facebook"></a>
                                <a href="#" class="icon-socials icon-twitter"></a>
                                <a href="#" class="icon-socials icon-instagram"></a>
                                <a href="#" class="icon-socials icon-linkedin"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer bawah -->
        <div class="footer-bottom mt-50">
            <div class="row">
                <div class="col-md-12 text-center">
                    &copy; 2025 Jobpath (Lowongan Kerja)
                </div>
            </div>
        </div>
    </div>
</footer>
