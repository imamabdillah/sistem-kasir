@extends('layout.base')

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
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
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

<!-- Order Start -->
<div class="row" style="margin-top: 80px;">
    <div class="col-md-3 d-flex flex-column align-items-start align-items-md-end me-4">
        <a href="{{ route('kasir.menu.index') }}">
            <button class="carousel-control-prev badge" type="button">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
        </a>
        <h4>Your Order</h4>
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
                    @foreach ($carts as $cartItem)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <!-- Tampilkan informasi masing-masing item cart di sini -->
                                    <img class="flex-shrink-0 img-fluid border rounded-pill"
                                        src="{{ asset('storage/foto_produk/' . $cartItem->menu->foto_produk) }}"
                                        alt="{{ $cartItem->menu->nama }}"style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3 ms-3"><strong>{{ $cartItem->menu->nama }}</strong></h5>
                                        {{-- <span class="text-truncate me-3">{{ $cartItem->menu->deskripsi }}</span> --}}
                                        <div class="text-start pt-3">
                                            <span class="badge bg-primary p-2 ms-3 rounded-pill btn-add-to-cart"
                                                data-menu-id="{{ $cartItem->menu->id }}"
                                                onclick="addToCart({{ $cartItem->menu->id }}, '{{ $cartItem->menu->nama }}', {{ $cartItem->menu->harga }})">
                                                <i class="fas fa-plus me-0 fs-0"></i>
                                            </span>
                                            <span class="ms-2"
                                                id= "total-items-{{ $cartItem->menu->id }}"><Strong>{{ $cartItem->quantity }}</Strong></span>
                                            <span class="badge bg-danger ms-2 me-1 p-2 rounded-pill"
                                                onclick="removeFromCart('{{ $cartItem->menu->id }}')">
                                                <i class="fas fa-minus me-0 fs-0"></i>
                                            </span>
                                        </div>
                                        <div class="ms-3 pt-4">
                                            <strong>Catatan:</strong> {{ $cartItem->note }}
                                        </div>
                                    </div>

                                </div>

                                <div
                                    class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <!-- Tampilkan informasi masing-masing item cart di sini -->
                                    <h5 class="text-primary pt-5" id="total-price-{{ $cartItem->menu->id }}">
                                        {{ 'Rp ' . number_format($cartItem->menu->harga * $cartItem->quantity, 0, ',', '.') }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach

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
                                <span class="badge bg-primary p-2 ms-3 rounded-pill">
                                    <i class="fas fa-dollar me-0 fs-0"></i>
                                </span>
                                <span class="ms-2"><strong>Payment Options</strong></span>

                                <div class="text-start">
                                    <h6 class="ms-3"><strong>Payment Details</strong></h6>
                                    <div class="ms-4 p-0">
                                        <!-- Menampilkan jumlah total item -->
                                        <span class="">Total Items:</span>

                                        <!-- Menampilkan subtotal -->
                                        <span class="d-block">Subtotal:</span>

                                        <!-- Jika Anda memiliki informasi TAX, Discount, Payable Account, tampilkan di sini -->
                                        <!-- Contoh: -->
                                        {{--
                                            <span class="d-block">TAX: {{ 'Rp ' . number_format($tax, 0, ',', '.') }}</span>
                                            <span class="d-block">Discount: {{ 'Rp ' . number_format($discount, 0, ',', '.') }}</span>
                                            <span class="d-block">Payable Account: {{ 'Rp ' . number_format($payableAccount, 0, ',', '.') }}</span>
                                        --}}
                                    </div>
                                </div>
                            </div>
                            <div
                                class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="btn pt-0 text-end text-align">
                                    <span class="fw-bold d-block fs-6 p-0 text-start text-primary">
                                        <strong>Cash</strong>
                                        <span class="fas fa-chevron-right ms-1"></span>
                                    </span>
                                </div>
                                <div class="text-start p-3">
                                    <div class="pt-1">
                                        <!-- Menampilkan informasi total item dan total harga -->
                                        <span class="d-block ms-4" id="total-items2">{{ $totalItems }} Items</span>
                                        <span class="d-block ms-4"
                                            id="total-price2">{{ 'Rp ' . number_format($totalPrice, 0, ',', '.') }}</span>

                                        <!-- Menampilkan informasi TAX, Discount, Payable Account jika diperlukan -->
                                        {{--
                                            <span class="d-block ms-4">{{ 'Rp ' . number_format($tax, 0, ',', '.') }}</span>
                                            <span class="d-block ms-4">{{ 'Rp ' . number_format($discount, 0, ',', '.') }}</span>
                                        --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form id="payment-form" action="{{ route('checkout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary py-3 px-5" id="checkoutButton"
                                data-bs-toggle="modal" data-bs-target="#checkoutModal">
                                Processing Payments <i class="ms-2 fas fa-arrow-right"></i>
                            </button>

                        </form>
                    </div>

                    {{-- <div class="job-item p-4 mb-4">
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
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('layout.footer')


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
        class="bi bi-arrow-up"></i></a>


<script>
    const csrfTokenElement = document.head.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenElement ? csrfTokenElement.content : null;

    let cartItems = [];

    function addToCart(menuId, menuNama, menuHarga) {
        fetch('{{ route('cart.addToCart') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    menu_id: menuId,
                    nama: menuNama,
                    harga: menuHarga,
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Item added to cart:', data.cart);
                    // Update the entire cartItems array with the new data
                    cartItems = data.cart;

                    // Move the call to updateCartViewAJAX here
                    updateCartViewAJAX();
                } else {
                    console.error('Failed to add item to cart:', data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function removeFromCart(menuId) {
        fetch('{{ route('cart.removeFromCart') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    menu_id: menuId
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data.message);
                    // Update the entire cartItems array with the new data
                    cartItems = data.cart;

                    // Call the new function to update the view through AJAX
                    updateCartViewAJAX();
                    // Ensure this has an effect on the server (removing the item from the server-side cart)
                    // ...
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function updateCartViewAJAX() {
        fetch('{{ route('update-cart-view') }}', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            })
            .then(response => response.json())
            .then(data => {
                console.log('Data from server:', data);

                let totalItemsElement2 = document.getElementById('total-items2');
                let totalPriceElement2 = document.getElementById('total-price2');

                if (totalItemsElement2 && totalPriceElement2) {
                    totalItemsElement2.innerText = data.totalItems;
                    totalPriceElement2.innerText = formatCurrency(data.totalPrice);
                } else {
                    console.error('Error: total-items2 or total-price2 not found.');
                }

                console.log('Updating dynamic elements for cart items...');

                if (data.cartItems && Array.isArray(data.cartItems)) {
                    data.cartItems.forEach(cartItem => {
                        if (cartItem.menu && cartItem.menu.id) {
                            let menuId = cartItem.menu.id;
                            let totalItemsElement = document.getElementById(`total-items-${menuId}`);
                            let totalPriceElement = document.getElementById(`total-price-${menuId}`);

                            if (totalItemsElement && totalPriceElement) {
                                totalItemsElement.innerText = cartItem.quantity;
                                totalPriceElement.innerText = formatCurrency(cartItem.menu.harga * cartItem
                                    .quantity);
                            } else {
                                console.error(
                                    `Error: total-items-${menuId} or total-price-${menuId} not found.`);
                            }
                        }
                    });
                } else {
                    console.error('Error: cartItems is not defined or not an array.');
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function formatCurrency(amount) {
        return 'Rp ' + amount.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,');
    }


    // Tangkap submit formulir
    $(document).ready(function() {
        // Tangkap submit formulir
        $('#payment-form').submit(function(e) {
            e.preventDefault();

            // Lakukan AJAX request untuk checkout
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Tampilkan modal dengan data yang diterima
                        $('#checkoutModal').modal('show');

                        // Lakukan manipulasi modal sesuai kebutuhan
                        // Misalnya, isi modal dengan data yang diterima
                        $('#modalContent').html('Snap Token: ' + response.snap_token +
                            '<br>Order ID: ' + response.order.id +
                            '<br>Total Price: ' + response.order.total_price);

                        // Kosongkan formulir atau lakukan tindakan lain
                        // $('#payment-form')[0].reset();
                    } else {
                        // Tampilkan pesan kesalahan jika terjadi masalah
                        console.error('Error:', response.error);
                    }
                },
                error: function(error) {
                    // Tampilkan pesan kesalahan jika terjadi masalah
                    console.error('Error:', error.responseText);
                }
            });
        });
    });

    // document.getElementById('pay-button').onclick = function() {
    //     // Tampilkan konfirmasi
    //     var isConfirmed = confirm('Apakah Anda yakin ingin melanjutkan pembayaran?');

    //     // Jika pengguna mengonfirmasi, arahkan ke halaman pembayaran Snap
    //     if (isConfirmed) {
    //         window.location.href = "{{ route('checkout') }}";
    //     }
    // };
</script>

</body>
