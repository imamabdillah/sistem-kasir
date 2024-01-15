@extends('layout.base')

<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
@include('layout.kasirnav')
<!-- Navbar End -->

<!-- Order Start -->
<div class="row" style="margin-top: 100px;">
    <div class="col-md-3 d-flex flex-column align-items-start align-items-md-end me-4">

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
                            <div class="col-sm-12 col-md-8 text-start">
                                <span class="badge bg-primary p-2 ms-3 rounded-pill">
                                    <i class="fas fa-dollar me-0 fs-0"></i>
                                </span>
                                <span class="ms-2"><strong>Payment Details</strong></span>

                                <div class="text-start">
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
                            <button type="submit" class="btn btn-primary py-3 px-5" id="checkoutButton">
                                Processing Payments <i class="ms-2 fas fa-arrow-right"></i>
                            </button>

                        </form>
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

                    {{-- <div class="job-item2 p-2 mb-4">
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
                    </div> --}}

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


{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    const csrfTokenElement = document.head.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenElement ? csrfTokenElement.content : null;

    let cartItems = [];

    function addToCart(menuId, menuNama, menuHarga, tenant) {
        fetch(`{{ route('cart.addToCart', ['tenant' => ':tenant']) }}`.replace(':tenant', tenant), {
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

    function removeFromCart(menuId, tenant) {
        fetch(`{{ route('cart.removeFromCart', ['tenant' => ':tenant']) }}`.replace(':tenant', tenant), {
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

    function updateCartViewAJAX(tenant) {
        fetch(`{{ route('update-cart-view', ['tenant' => ':tenant']) }}`.replace(':tenant', tenant), {
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
