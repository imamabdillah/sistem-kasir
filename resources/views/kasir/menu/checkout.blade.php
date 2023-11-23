@extends('layout.base')

<>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small>Follow us:</small>
                <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="tenant.html" class="nav-item nav-link active">Tenant</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="feature.html" class="dropdown-item">Our Features</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">FOOD COURT KENANGAN</h1>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href=""
                                        class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">FOOD COURT KENANGAN</h1>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href=""
                                        class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Jobs Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <a href="tenant.html">
                <button class="carousel-control-prev badge " type="button">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
            </a>
            <h4 class="col-md-3 d-flex flex-column align-items-start align-items-md-end me-4">Your Order</h4>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3"><strong>Order ID 00001</strong></h5>
                                        <span class="text-truncate me-3"><i
                                                class="text-primary me-2"></i><strong>Dinar</strong></span>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-4"></div>
                                    <small class="text-truncate"><strong>Dine in</strong>
                                        <span class="ms-2"><strong>&middot;</strong></span>
                                        <span class="ms-2"><strong>T-10</strong></span>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded-pill" src="img/mie-goreng.jpg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3"><strong>Mie Goreng</strong></h5>
                                        <span class="text-truncate me-3">Super pedas</span>
                                        <div class="text-start pt-3">
                                            <span class=" btn btn-primary badge bg-primary p-2 rounded-pill"><i
                                                    class="fas fa-plus me-0 fs-0"></i></span>
                                            <span class="ms-2"><Strong>1</Strong></span>
                                            <span class="btn btn-primary badge bg-danger me-1 p-2 ms-2 rounded-pill"><i
                                                    class="fas fa-minus me-0 fs-0"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                    </div>
                                    <h5 class="text-primary pt-5">Rp. 10.000,-</h5>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded-pill" src="img/cimol.jpeg"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3"><strong>Cimol</strong></h5>
                                        <span class="text-truncate me-3">Super pedas</span>
                                        <div class="text-start pt-3">
                                            <span
                                                class="btn btn-primary badge bg-primary p-2 rounded-pill btn btn-primary"><i
                                                    class="fas fa-plus me-0 fs-0"></i></span>
                                            <span class="ms-2"><Strong>3</Strong></span>
                                            <span class="btn btn-primary badge bg-danger me-1 p-2 ms-2 rounded-pill"><i
                                                    class="fas fa-minus me-0 fs-0"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="pt-5">
                                        <h5 class="text-primary">Rp. 25.000,-</h5>
                                        <h6 class="text-body text-decoration-line-through">Rp. 30.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-item2 p-2 mb-4">
                            <div class="row g-4 table-responsive">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <span class="btn p-2 text-start">
                                        <i class="fas fa-plus fa-2x text-body ms-2">
                                            <span class="ms-2">Add</span>
                                        </i>
                                    </span>
                                </div>
                                <div
                                    class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="btn p-2 text-end text-align">
                                        <span class="fa-2x text-primary">Note</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 text-start">
                                    <span class="badge bg-primary p-2 ms-3 rounded-pill"><i
                                            class="fas fa-dollar me-0 fs-0"></i></span>
                                    <span class="ms-2"><strong>Payment Options</strong></span>

                                    <div class="text-start">
                                        <h6 class="ms-3"><strong>Payment Details</strong></h6>
                                        <div class="ms-4 p-0">
                                            <span class="">Total Items</span>
                                            <span class="d-block">Subtotal</span>
                                            <span class="d-block">TAX</span>
                                            <span class="d-block">Discount</span>
                                            <span class="d-block">Payabel Acount</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="btn pt-0 text-end text-align">
                                        <span
                                            class="fw-bold d-block fs-6 p-0 text-start text-primary"><Strong>Cash</Strong>
                                            <span class="fas fa-chevron-right ms-1"></span>
                                        </span>
                                    </div>
                                    <div class="text-start p-3">
                                        <div class="pt-1">
                                            <span class="d-block ms-4">4 Items</span>
                                            <span class="d-block ms-4">Rp. 40.000</span>
                                            <span class="d-block ms-4">Rp. 3.000</span>
                                            <span class="d-block text-primary"><i class="fas fa-minus me-2"></i> Rp.
                                                2.500</span>
                                            <span class="d-block ms-4">Rp. 39.500</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-primary py-3 px-5" href="">Processing Payments<i
                                    class=" ms-2 fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jobs End -->

    @include('layout.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>



    </body>
