@include('layout.base')


<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
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
            <div>
                <a href="{{ '/login' }}" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Login</a>
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

<div class="container-fluid">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Inactive Account</div>

                <div class="card-body text-center">
                    <p>Your account is currently inactive. Please wait for admin approval.</p>
                    <p>Contact the administrator for more information.</p>
                </div>
            </div>
        </div>
    </div>
</div>
