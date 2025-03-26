@extends('user.layout.main')
@section('content')


    <!-- Content -->
    <main class="main">
        <div class="container mt-90 mt-md-30">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <section class="mb-50">
                        <div class="row">
                            <div class="col-xl-9 col-md-12 mx-auto">
                                <div class="contact-from-area padding-20-row-col">
                                    <h5 class="text-blue text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Kirim Jejak Karirmu</h5>
                                    <h2 class="section-title mt-15 mb-10 text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Bangga Jadi Alumni!</h2>
                                    <p class="text-muted mb-30 font-md text-center wow animate__animated animate__fadeInUp" data-wow-delay=".1s">Bagikan perjalanan karirmu dan inspirasi bagi generasi berikutnya. Informasi yang kamu isi akan membantu membangun jaringan alumni yang lebih kuat.</p>
                                    <form class="contact-form-style mt-80" id="contact-form" action="{{ route('storeAlumni') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <label for="pekerjaan">Pekerjaan</label>
                                                    <input id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan Anda" type="text" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <label for="perusahaan">Nama Perusahaan</label>
                                                    <input id="perusahaan" name="perusahaan" placeholder="Masukkan tempat perusahaan Anda bekerja" type="text" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <label for="instagram">Instagram</label>
                                                    <input id="instagram" name="instagram" placeholder="https://www.instagram.com/" type="url" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="input-style mb-20">
                                                    <label for="linkedin">LinkedIn</label>
                                                    <input id="linkedin" name="linkedin" placeholder="https://www.linkedin.com/in/" type="url" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="input-style mb-20">
                                                    <label for="photo">Unggah Foto Profesional</label>
                                                    <div class="file-upload-wrapper" id="drop-area">
                                                        <input id="photo" name="foto" type="file" accept="image/*" class="file-input" onchange="previewImage(event)" hidden />
                                                        <div id="upload-box" class="upload-box" onclick="document.getElementById('photo').click()">
                                                            <img src="assets/user/imgs/drag and drop.png" alt="Upload Icon" class="upload-icon" />
                                                            <p id="upload-text">Seret & Lepas atau Klik untuk Mengunggah</p>
                                                            <p id="file-name" class="file-name d-none"></p>
                                                        </div>
                                                        <img id="preview" src="" alt="Preview" class="preview-img d-none" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 text-center">
                                                <button class="btn btn-default float-right" type="submit">Kirim Data</button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="form-messege"></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
    <!-- End Content -->
   
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            const fileNameDisplay = document.getElementById('file-name');
            
            if (file) {
                fileNameDisplay.textContent = file.name;
                fileNameDisplay.classList.remove('d-none');
            }
        }
        
        const dropArea = document.getElementById("drop-area");
        dropArea.addEventListener("dragover", (event) => {
            event.preventDefault();
            dropArea.classList.add("dragging");
        });
        
        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("dragging");
        });
        
        dropArea.addEventListener("drop", (event) => {
            event.preventDefault();
            dropArea.classList.remove("dragging");
            
            const fileInput = document.getElementById("photo");
            fileInput.files = event.dataTransfer.files;
            previewImage({ target: fileInput });
        });
    </script>

@endsection