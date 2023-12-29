<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="" class="nav-item nav-link active">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Presensi</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('presensimasuk') }}" class="dropdown-item">Masuk</a>
                        <a href="{{ route('presensikeluar') }}" class="dropdown-item">Keluar</a>
                    </div>
                </div>
                <a href="" class="nav-item nav-link">Transaksi</a>
            </div>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5">Logout</button>
                </form>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-user text-body"></small>
                </a>
            </div>
        </div>
    </nav>
</div>
