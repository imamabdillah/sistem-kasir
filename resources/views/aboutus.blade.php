@include('layout.base')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h3 class="fw-bold font-secondary m-0"><span class=" text-dark">KENANGAN</span></h3>
        </a>

        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ '/' }}" class="nav-item nav-link active">Home</a>
                <a href="{{ '/aboutus' }}" class="nav-item nav-link">About Us</a>
                <a href="{{ '/tenant' }}" class="nav-item nav-link">Tenant</a>
                <a href="{{ '/contactus' }}" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn-sm-square bg-white rounded-circle-primary ms-3" href="">
                    <small class="fa fa-search text-body"></small>
                </a>
                <a class=" btn-sm-square bg-white rounded-circle-primary ms-3" href="">
                    <small class="fa fa-user text-body"></small>
                </a>

            </div>
            <div>
                <a href="{{ '/login' }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Login</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="container">
            <h1 class="display-3 mb-3  slideInDown">About Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-75" style="min-height: 75px">
                        <img class="position-absolute w-100 h-100" src='{!! asset('assets/img/about.jpg') !!}' alt=""
                            style="object-fit: cover" />
                        <div class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
                            style="width: 200px; height: 200px">
                            <div class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3">
                                <h1 class="text-white">5</h1>
                                <h2 class="text-white">Years</h2>
                                <h5 class="text-white mb-0">Experience</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="border-start border-5 border-primary ps-4 mb-5">
                            <h6 class="text-body text-uppercase mb-2">About Us</h6>
                            <h1 class="display-6 mb-0">
                                Food Court Kenangan
                            </h1>
                        </div>
                        <p>
                            Foodcourt Kenangan selalu berupaya memenuhi kepuasan para pelanggan dengan menawarkan
                            pilihan menu makanan berkualitas,
                            layanan unggul, fasilitas yang memadai, dan mencipkatan suasana yang mengundang
                            kenikmatan
                        </p>
                        <p class="mb-4">
                            Foodcourt Kenangan ini beralamatkan
                            di Jl. Jetis Permai Gg. 13, Gentan, Kec. Baki, Kabupaten Sukoharjo, Jawa Tengah 57556.
                        </p>
                        <div class="border-top mt-4 pt-4">
                            <div class="row g-4">
                                <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.1s">
                                    <i class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"></i>
                                    <h6 class="mb-0">70++ tenants</h6>
                                </div>
                                <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.3s">
                                    <i class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"></i>
                                    <h6 class="mb-0">700 Pengunjung</h6>
                                </div>
                                <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.5s">
                                    <i class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"></i>
                                    <h6 class="mb-0">Kuliner Terlengkap</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Carousel Start -->
    <div class=" position-relative text-center mx-auto mb-5 pb-3" style="max-width: 1000px;">
        <h2 class="text-primary font-secondary">-Benefit-</h2>
        <h1 class="display-5">Food Court Kenangan</h1>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div data-aos="fade-up">
                <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="col-lg-4">
                        <div class="nav nav-pills d-flex justify-content-between w-150 h-150m">
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                                <h3 class="m-0">01. Tempat Luas & Bersih</h3>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                                <h3 class="m-0">02. Lokasi Strategis</h3>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                                <h3 class="m-0">03. Zona Bermain Anak</h3>
                            </button>
                            <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                                <h3 class="m-0">04. Fasilitas Lengkap</h3>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content w-100">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 400px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100"
                                                src="assets/img/Tempat.png" style="object-fit: cover;"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">Tempat Luas & Bersih</h1>
                                        <p class="mb-4">Tempat yang luas dan bersih serta terdapat bermacam-macam
                                            tenant makanan,sehingga anda tidak perlu bingung dalam memilih hidangan
                                        </p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Beraneka Macam Tenant</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Ramah dikantong</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Tempat Bersih dan Nyaman
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 400px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100"
                                                src="assets/img/Lokasi.jpg" style="object-fit: cover;"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">Lokasi Strategis</h1>
                                        <p class="mb-4">Lokasi yang terletak disamping jalan raya membuat
                                            konsumen mudah menemukan letak foodcourt</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Akses Mudah</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Keamanan Terjaga</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Dekat Pusat Kota</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-3">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 400px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100"
                                                src="assets/img/Main.png" style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">Zona Bermain Anak</h1>
                                        <p class="mb-4">Selain untuk menikmati hidangan,terdapat pula zona
                                            bermain anak sehingga anak tidak bosan ketika mengunjungi foodcourt</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Aneka Macam Permainan Anak
                                        </p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Tempat Bermain yang Bersih
                                            dan Terjaga</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Area Bermain yang Luas</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-4">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 400px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute img-fluid w-100 h-100"
                                                src="assets/img/Fasilitas.png" style="object-fit: cover;"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h1 class="mb-3">Fasilitas Lengkap</h1>
                                        <p class="mb-4">Fasilitas lengkap dan memadai sehingga,pengunjung tidak
                                            perlu risau untuk memilih foodcourt kenangan sebagai destinasi makan
                                            anda</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Mushola</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Parking Area</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Toilet</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel End -->
                <!-- Pict Start -->
                <div class="gallery">
                    <p><span class="mb-4 text-primary me-2">#</span>GalleryTenant</p>
                    <h1 class="display-5 mb-4">
                        Gallery
                        <span class="text-primary">Foodcourt</span>
                        <p><span class="text-primary">Kenangan</span></p>
                    </h1>
                </div>
                <div class="row g-4">

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div class="row g-4">
                            <div class="col-12">
                                <a class="animal-item" href="assets/img/5.png" data-lightbox="animal">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="assets/img/5.png" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <a class="animal-item" href="assets/img/luas-fc.jpg" data-lightbox="animal">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="assets/img/luas-fc.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s"
                        style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <div class="row g-4">
                            <div class="col-12">
                                <a class="animal-item" href="assets/img/about.jpg" data-lightbox="animal">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="assets/img/about.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <a class="animal-item" href="assets/img/kolase.webp" data-lightbox="animal">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="assets/img/kolase.webp" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <div class="row g-4">
                            <div class="col-12">
                                <a class="animal-item" href="assets/img/parkir-fc.jpg" data-lightbox="animal">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="assets/img/parkir-fc.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                            <div class="col-12">
                                <a class="animal-item" href="assets/img/bermain.jpg" data-lightbox="animal">
                                    <div class="position-relative">
                                        <img class="img-fluid" src="assets/img/bermain.jpg" alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pict End -->

                <!-- Appointment Start -->
                <div class="container-xxl py-5">
                    <div class="container">
                        <div data-aos="fade-up">
                            <div class=" position-relative text-center mx-auto mb-5 pb-3" style="max-width: 1000px;">
                                <h2 class="text-primary font-secondary">-Contact-</h2>
                                <h1 class="display-5">Contact Us</h1>
                            </div>
                            <iframe style="border:0; width: 100%; height: 350px;"
                                src="https://maps.google.com/maps?q=foodcourt%20kenangan&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="container-xxl py-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="row g-4">
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                                        style="width: 65px; height: 65px;">
                                                        <i class="fa fa-2x fa-map-marker-alt text-primary"y"></i>
                                                    </div>
                                                    <div class="ms-4">
                                                        <h3 class="mb-2">Location</h3>
                                                        <p class="mb-0">Jl. Jetis Permai Gg. 13, Gentan, Kec.
                                                            Baki, Kabupaten
                                                            Sukoharjo,
                                                            Jawa Tengah 57556 </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                                        style="width: 65px; height: 65px;">
                                                        <i class="fa fa-2x fa-clock text-primary"y"></i>
                                                    </div>
                                                    <div class="ms-4">
                                                        <h3 class="mb-2">Open Hours</h3>
                                                        <p class="mb-0">Senin - Minggu</br>
                                                            08.00 AM - 20.00 PM
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                                        style="width: 65px; height: 65px;">
                                                        <i class="fa fa-2x fa-envelope-open text-primary"></i>
                                                    </div>
                                                    <div class="ms-4">
                                                        <h3 class="mb-2">Email</h3>
                                                        <p class="mb-0">foodcourtkenangan@gmail.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex">
                                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                                        style="width: 65px; height: 65px;">
                                                        <i class="fa fa-2x fa-phone-alt text-primary""></i>
                                                    </div>
                                                    <div class="ms-4">
                                                        <h3 class="mb-2">call</h3>
                                                        <p class="mb-0">081227570155</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold font-secondary text-primary m-0"><span class=" text-primary">KENANGAN</span>
                    </h1>
                    <p>Foodcourt Kenangan ini beralamatkan di Jl. Jetis Permai Gg. 13, Gentan, Kec. Baki, Kabupaten
                        Sukoharjo, Jawa Tengah 57556.</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>CQCH+QF3, Jl. Jetis Permai Gg. 13, Gentan, Kec.
                        Baki, Kabupaten Sukoharjo, Jawa Tengah 57556</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p><i
                            class="fa fa-envelope me-3"></i>https://food-court-kenangan.business.site/?utm_source=gmb&utm_medium=referral
                    </p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">Home</a>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Tenant</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Join as a member at this impressive food court, there will be lots of promotions for you</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->


</body>
