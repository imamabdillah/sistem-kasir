@include('layout.base')

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('layout.kasirnav')
    <!-- Navbar End -->

    <!-- Check In Section Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Check In</h2>
                <h1 class="display-4 text-uppercase">Presensi Masuk</h1>
            </div>
            <div class="justify-content-center text-center">
                <!-- Google Maps Embed -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.9741307531685!2d110.778449!3d-7.577794599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a15ebf40a24db%3A0x45924a20fea02b47!2sFOOD%20COURT%20%22KENANGAN%22!5e0!3m2!1sen!2sid!4v1702871802155!5m2!1sen!2sid"
                    width="100%" height="720" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <br>
            <h3 class="text-primary font-secondary">Check In</h3>
            <form action="{{ route('presensiIn') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-content">
                    <input type="hidden" name="latitude">
                    <input type="hidden" name="longitude">

                    <!-- Get Location Button -->
                    <button type="button" id="getLocationBtn">Get Location</button>
                    <label>
                        <h6>Tanggal</h6>
                    </label>
                    <input type="date" name="checkin_date" required>
                    <label>
                        <h6>Time</h6>
                    </label>
                    <input type="time" name="checkin_time" required>
                    <label>
                        <h6>Keterangan</h6>
                    </label>
                    <input type="text" name="checkin_note" placeholder="Masuk" required>
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
                            In</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>

    <!-- Check In Section End -->


    <!-- ... (Footer dan Back to Top) ... -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.7.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Function to show the success modal
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
