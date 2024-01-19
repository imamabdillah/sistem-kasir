@include('layout.base')

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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

    <!-- Carousel Start -->

    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src= '{!! asset('assets/img/bg.jpg') !!}'class="w-100" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Food Court Kenangan</h1>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href=""
                                        class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src='{!! asset('assets/img/bg.jpg') !!}' alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Food Court Kenangan</h1>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href=""
                                        class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px">
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

    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class=" container">
            <div class="row g-0 gx-5 align-items-end text-center">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 5000px;">
                        <h1 class="text-center">Our Tenants</h1>
                        <p>Berikut ini merupakan daftar tenant yang terdapat di Foodcourt Kenangan.</p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src='{!! asset('assets/img/product-1.jpg') !!}' alt="">
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        01</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">Tenant 1</a>
                                    <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-shopping-bag text-primary me-2"></i>Menu</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src='{!! asset('assets/img/product-2.png') !!}' alt="">
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        02</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">Tenant 2</a>
                                    <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-shopping-bag text-primary me-2"></i>Menu</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src='{!! asset('assets/img/product-3.jpg') !!}' alt="">
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        03</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">Tenant 3</a>
                                    <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-shopping-bag text-primary me-2"></i>Menu</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src='{!! asset('assets/img/product-4.jpg') !!}' alt="">
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        04</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">Tenant 4</a>
                                    <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href=""><i
                                                class="fa fa-shopping-bag text-primary me-2"></i>Menu</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Show More Tenant</a>
                        </div>
                        <div class="section-title position-relative text-center mx-auto mb-5 pb-3"
                            style="max-width: 1000px;">
                            <h2 class="text-primary font-secondary">-Food Court Kenangan-</h2>
                            <h1 class="display-5 text-uppercase">Tenant</h1>
                            <div class="card w-xxl-75">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product End -->

            <!-- Appointment Start -->
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2> Contact </h2>
                    <p>Contact Us</p>
                </div>
            </div>

            <div data-aos="fade-up">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://maps.google.com/maps?q=foodcourt%20kenangan&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                    frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="row g-4">
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                            style="width: 65px; height: 65px;">
                                            <i class="fa fa-2x fa-phone-alt text-primary"></i>
                                        </div>
                                        <div class="ms-4">
                                            <h3 class="mb-2">Location</h3>
                                            <p class="mb-0">Jl. Jetis Permai Gg. 13, Gentan, Kec. Baki, Kabupaten
                                                Sukoharjo,
                                                Jawa Tengah 57556 </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex">
                                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                            style="width: 65px; height: 65px;">
                                            <i class="fa fa-2x fa-phone-alt text-primary"y"></i>
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
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" placeholder="Your Name"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" placeholder="Your Email"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Subject"
                                        style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="7" placeholder="Message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send
                                        Message</button>
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
    @include('layout.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
</body>

</html>
