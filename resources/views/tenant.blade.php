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
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">FOOD COURT KENANGAN</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src= '{!! asset('assets/img/bg.jpg') !!}'class="w-100" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">FOOD COURT KENANGAN</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><br>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h6 class=" text-start text-primary text-uppercase">Foodcourt Kenangan</h6>
                <h1 class="mb-4">TENANTS</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam
                    et
                    eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet
                </p>
                <div class=" image row g-2 ">
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">70++</h2>
                                <p class="mb-0">Tenant</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                        <div class="border rounded p-1">
                            <div class="border rounded text-center p-4">
                                <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                <h2 class="mb-1" data-toggle="counter-up">700</h2>
                                <p class="mb-0">Pengunjung</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class=" explore btn btn-primary py-3 px-5 mt-2" href="">JOIN TENANT</a>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s"
                            src="assets/img/bermain.jpg"
                            style="margin-top: 25%; visibility: visible; animation-delay: 0.1s; animation-name: zoomIn;">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="assets/img/about.jpg"
                            style="visibility: visible; animation-delay: 0.3s; animation-name: zoomIn;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="assets/img/parkir.jpg"
                            style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s"
                            src="assets/img/luas-fc.jpg"
                            style="visibility: visible; animation-delay: 0.7s; animation-name: zoomIn;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Our">
        <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Our Tenants</h1>
            <p>Berikut ini merupakan daftar tenant yang terdapat di Foodcourt Kenangan.</p>
        </div>
    </div>
    </div>
    <div class="Our">
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-1.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    01</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail1' }}">Tenant 1</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-2.png') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    02</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail2' }}">Tenant 2</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-3.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    03</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail3' }}">Tenant 3</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-4.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    08</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail4' }}">Tenant 4</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-5.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    05</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail5' }}">Tenant 5</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-6.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    06</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail6' }}">Tenant 6</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-7.jpe') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    07</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail7' }}">Tenant 7</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-7.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    08</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail8' }}">Tenant 8</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-9.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    09</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail9' }}">Tenant 9</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-10.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    10</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail10' }}">Tenant 10</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-11.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    11</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail11' }}">Tenant 11</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                        <div class="product-item">
                            <div class="position-relative bg-light overflow-hidden">
                                <img class="img-fluid w-100" src='{!! asset('assets/img/product-12.jpg') !!}' alt="">
                                <div
                                    class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    12</div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5 mb-2" href="{{ '/detail12' }}">Tenant 12</a>
                                <span class="text-primary me-1">Menjual berbagai macam makanan</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h4 class=" text-primary section-title">Appointment</h4>
                        <h1 class="display-5 mb-4">Registration Tenant</h1>
                        <p class="mb-4">Untuk bergabung dengan kami di Foodcourt Kenangan.<br />
                            Silahkan isi form berikut!!</p>
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-light"
                                        style="width: 65px; height: 65px;">
                                        <i class="fa fa-2x fa-phone-alt text-primary"></i>
                                    </div>
                                    <div class="ms-4">
                                        <p class="mb-2">Call Us Now</p>
                                        <h3 class="mb-0">+012 345 6789</h3>
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
                                        <p class="mb-2">Mail Us Now</p>
                                        <h3 class="mb-0">info@example.com</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s"
                        style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" placeholder="Your Name"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control" placeholder="Your Email"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control" placeholder="Your Address"
                                    style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <select class="form-select" style="height: 55px;">
                                    <option selected="">Categories product</option>
                                    <option value="1">Makanan</option>
                                    <option value="2">Minuman</option>
                                    <option value="3">Makanan & Minuman</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="Number" id="No" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="No Telp" data-target="#date" data-toggle="datetimepicker"
                                        style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="Name" id="name" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input"
                                        placeholder="Your Name Product" data-target="#time"
                                        data-toggle="datetimepicker" style="height: 55px;">
                                </div>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Join Us</button>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        Baki,
                        Kabupaten Sukoharjo, Jawa Tengah 57556</p>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
