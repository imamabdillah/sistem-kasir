@include('layout.base')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    @include('layout.kasirnav')
    <!-- Navbar End -->

    <!-- About Start -->
    <div class="container-fluid pt-5" style="margin-top: 100px;">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Check Out</h2>
                <h1 class="display-4 text-uppercase">Presensi Keluar</h1>
            </div>
            <div class="justify-content-center text-center">
                <!-- Google Maps Embed -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9741307531685!2d110.778449!3d-7.577794599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a15ebf40a24db%3A0x45924a20fea02b47!2sFOOD%20COURT%20%22KENANGAN%22!5e0!3m2!1sen!2sid!4v1702871802155!5m2!1sen!2sid"
                    width="100%" height="720" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div> <br>
            <h3 class="text-primary font-secondary">Check Out</h3>
            <form action="{{ route('presensiOut') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <input type="hidden" name="latitude">
                    <input type="hidden" name="longitude">

                    <!-- Get Location Button -->
                    <button type="button" id="getLocationBtn">Get Location</button>
                    <label>
                        <h6>Tanggal</h6>
                    </label>
                    <input type="date" name="checkout_date" required>
                    <label>
                        <h6>Time</h6>
                    </label>
                    <input type="time" name="checkout_time" required>
                    <label>
                        <h6>Keterangan</h6>
                    </label>
                    <input type="text" name="checkout_note" placeholder="Keluar" required>
                    <label>
                        <h6>File</h6>
                    </label>
                    <div class="drag-area">
                        <!-- Drag and drop area -->
                        <label for="file" class="file-label">
                            <input id="file" type="file" name="photo" class="hidden" required>
                            Browse File
                        </label>
                        <p>Maximum Size: 3 MB</p>
                    </div>


                    <script src="js/drag&drop.js"></script>
                    <br><br>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <button type="submit" class="btn btn-primary presensi2" onclick="showSuccessAlert()">Check
                            Out</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">F<span class="text-secondary">oo</span>dy</h1>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                        stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <script>
        function showSuccessAlert() {
            alert('Presensi Berhasil!\nTerima kasih, presensi Anda berhasil dicatat!');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan elemen-elemen formulir
            const latitudeInput = document.querySelector('input[name="latitude"]');
            const longitudeInput = document.querySelector('input[name="longitude"]');

            // Fungsi untuk mendapatkan geolokasi pengguna
            function getGeolocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }

            // Fungsi untuk menampilkan posisi geolokasi
            function showPosition(position) {
                latitudeInput.value = position.coords.latitude;
                longitudeInput.value = position.coords.longitude;
            }

            // Mendengarkan klik pada tombol "Get Location"
            document.getElementById('getLocationBtn').addEventListener('click', function(event) {
                event.preventDefault();
                getGeolocation();
            });
        });
    </script>

</body>
