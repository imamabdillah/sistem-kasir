@include('layout.base')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
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
                    <a href="tenant.html" class="nav-item nav-link active">Home</a>
                    <a href="tenant.html" class="nav-item nav-link ">Promo</a>
                </div>
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <div class="nav-profile-img">
                            <img src="assets/images/faces/face28.png" alt="image">
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-black font-weight-bold">Henry Klein</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                        aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                        <div class="p-3 text-center bg-primary">
                            <img class="img-avatar img-avatar48 img-avatar-thumb" src="assets/images/faces/face28.png"
                                alt="">
                        </div>
                        <div class="p-2">
                            <h5 class="dropdown-header text-uppercase pl-2 text-dark">User Options</h5>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="#">
                                <span>Inbox</span>
                                <span class="p-0">
                                    <span class="badge badge-primary">3</span>
                                    <i class="mdi mdi-email-open-outline ml-1"></i>
                                </span>
                            </a>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="#">
                                <span>Profile</span>
                                <span class="p-0">
                                    <span class="badge badge-success">1</span>
                                    <i class="mdi mdi-account-outline ml-1"></i>
                                </span>
                            </a>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="javascript:void(0)">
                                <span>Settings</span>
                                <i class="mdi mdi-settings"></i>
                            </a>
                            <div role="separator" class="dropdown-divider"></div>
                            <h5 class="dropdown-header text-uppercase  pl-2 text-dark mt-2">Actions</h5>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="#">
                                <span>Lock Account</span>
                                <i class="mdi mdi-lock ml-1"></i>
                            </a>
                            <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                                href="#">
                                <span>Log Out</span>
                                <i class="mdi mdi-logout ml-1"></i>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                        data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-email-outline"></i>
                        <span class="count-symbol bg-success"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="messageDropdown">
                        <h6 class="p-3 mb-0 bg-primary text-white py-4">Messages</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message
                                </h6>
                                <p class="text-gray mb-0"> 1 Minutes ago </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message
                                </h6>
                                <p class="text-gray mb-0"> 15 Minutes ago </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated
                                </h6>
                                <p class="text-gray mb-0"> 18 Minutes ago </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">4 new messages</h6>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                        data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                        aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0 bg-primary text-white py-4">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-calendar"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                                <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-settings"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                                <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="mdi mdi-link-variant"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                                <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <h6 class="p-3 mb-0 text-center">See all notifications</h6>

                    </div>
                    <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-secondary rounded-pill py-sm-3 px-sm-5">Logout</button>
                        </form>
                    </div>
                </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->




    <!-- About Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Foodcourt</h2>
                <h1 class="display-4 text-uppercase">Kenangan</h1>
            </div>
            <form class="row gx-4 gy-2 align-items-center justify-content-center">
                <div class="col-xl-4  mb-xl-10">
                    <div class="input-group-icon"><i class="fa fa-search text-body input-box-icon"></i>
                        <input class="form-control input-box form-food-control" type="text"
                            placeholder="Search" />
                    </div>
                </div>
                <div class="d-grid gap-3 col-sm-auto">
                    <button class="btn btn-primary search-border" type="submit">SEARCH</button>
                </div>
            </form>
            <br>
            <h4 class="text-primary font-secondary">Tenant</h4>
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div>
                        <h1 class="display-5 mb-3">Daftar Tenant</h1>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">

                        <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                @foreach ($tenantInfos as $tenantInfo)
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100 gambar-kecil"
                                            src="{{ asset('storage/tenant/foto/' . $tenantInfo->foto_tenant) }}"
                                            alt="Tenant Image">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2"
                                            href="{{ route('tenant.detail', ['id' => $tenantInfo->tenant_id]) }}">{{ $tenantInfo->tenant->nama }}</a>
                                        <!-- Add more details from TenantInfo model as needed -->
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <!-- Pigination -->
                <div class="pagination col-12 justify-content-center wow fadeInUp" data-wow-delay="0.1s"">
                    <a href="#">&laquo;</a>
                    <a class="active" href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">&raquo;</a>
                </div>
                <br>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">Kenangan</h1>
                    <p>Foodcourt Kenangan ini beralamatkan di Jl. Jetis Permai Gg. 13, Gentan, Kec. Baki, Kabupaten
                        Sukoharjo, Jawa Tengah 57556.</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>CQCH+QF3, Jl. Jetis Permai Gg. 13, Gentan, Kec. Baki,
                        Kabupaten Sukoharjo, Jawa Tengah 57556</p>
                    <p><i class="fa fa-phone-alt me-3"></i>++012 345 67890</p>
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
                    <p>Join as a member at this impressive food court, there will be lots of promotions for you</p>
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
