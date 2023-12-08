@extends('layout.base')

<body>
    <!-- Spinner Start -->
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
                <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="tenant.html" class="nav-item nav-link">Tenant</a>
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
                <div class="text-center mt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5">Logout</button>
                    </form>
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

    <!-- Payment Options Start -->
    <div class="container-xxl py-6 mt-6" style="margin-top: 80px;">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="job-item p-4 mb-4">
                            <div class="mt-4">
                                <h6 class="ms-3"><strong>Transaction Details</strong></h6>
                                <div class="ms-4 p-0">
                                    <span class="d-block">Order ID: {{ $transaction->order->id }}</span>
                                    <span class="d-block">Total Price:
                                        {{ 'Rp ' . number_format($transaction->order->total_price, 0, ',', '.') }}</span>
                                </div>
                                <div class="mt-4 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary py-3 px-5">
                                        Tunai <i class="ms-2 fas fa-arrow-right"></i>
                                    </button>
                                    <button id="pay-button" type="submit" class="btn btn-primary py-3 px-5">
                                        Non-Tunai <i class="ms-2 fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Options End -->


    <!-- Payment Options End -->

    @include('layout.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
</body>

<script>
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('{{ $transaction->snap_token }}', {
            onSuccess: function(result) {
                // Your custom JavaScript logic for success
                handlePaymentSuccess(result);
            },
            onPending: function(result) {
                // Your custom JavaScript logic for pending
                handlePaymentPending(result);
            },
            onError: function(result) {
                // Your custom JavaScript logic for error
                handlePaymentError(result);
            }
        });
    };

    // Function to handle payment success
    const handlePaymentSuccess = (result) => {
        // Dapatkan ID transaksi dari respons Midtrans
        let orderId = result.order_id;

        // Kirim permintaan AJAX untuk menangani pembayaran yang berhasil di sisi server
        $.ajax({
            type: 'POST',
            url: '{{ route('handle-payment-success') }}',
            data: {
                order_id: orderId, // Ganti transaction_id dengan order_id
                payment_type: result.payment_type,
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                // Handle respons sukses dari server
                console.log('Payment success handled:', response);

                // Periksa apakah server berhasil menangani pembayaran
                if (response.message && response.message === 'Pembayaran berhasil') {
                    // Redirect pengguna ke halaman sukses atau lakukan tindakan lain
                } else {
                    // Tangani kasus di mana respons server menunjukkan kesalahan
                    console.error('Server response indicates an error:', response);
                    // Redirect pengguna ke halaman kesalahan atau lakukan tindakan lain
                }
            },
            error: function(error) {
                // Tangani respons kesalahan dari server
                console.error('Error handling payment success:', error.responseJSON);
                // Redirect pengguna ke halaman kesalahan atau lakukan tindakan lain
            }
        });
    };


    // Function to handle pending payment (optional)
    function handlePaymentPending(result) {
        // Your custom JavaScript logic for pending
    }

    // Function to handle payment error (optional)
    function handlePaymentError(result) {
        // Your custom JavaScript logic for error
        console.error('Payment error:', result);
    }
</script>
