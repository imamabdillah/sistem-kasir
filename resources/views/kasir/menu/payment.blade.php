@include('layout.base')

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('layout.kasirnav')
    <!-- Navbar End -->

    <!-- Payment Options Start -->
    <div class="container-xxl py-6 mt-6" style="margin-top: 80px;">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="tab-content">
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-2"><strong>Order ID# {{ $transaction->order->id }}</strong>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-item p-4 mb-4">
                                @foreach ($transaction->order->orderItems as $orderItem)
                                    <div class="row g-4" style="margin-block-end: 30px">
                                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                            <div class="text-start ps-4">
                                                <h5 class="mb-8">{{ $orderItem->quantity }}
                                                    <span class="ms-4">{{ $orderItem->nama }}</span>
                                                </h5>
                                                <div class="ms-md-2 p-0">
                                                    <span class="d-block ms-4">{{ $orderItem->note }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                            <div class="pt-2">
                                                <h5 class="text-primary">Rp.
                                                    {{ number_format($orderItem->harga * $orderItem->quantity, 0, ',', '.') }}
                                                </h5>
                                                <!-- Jika ada diskon -->
                                                @if ($orderItem->discount_price > 0)
                                                    <h6 class="text-body text-decoration-line-through">
                                                        Rp. {{ number_format($orderItem->original_price, 0, ',', '.') }}
                                                    </h6>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-md-8 text-start">
                                    <div class="text-start">
                                        <h6 class="ms-3"><strong>Payment Details</strong></h6>
                                        <div class="ms-4 p-0">
                                            <span class="">Total Items</span>
                                            <span class="d-block">Subtotal</span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-12 col-md-3 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="text-start p-4">
                                        <div class="pt-1">
                                            <span class="d-block ms-5">{{ $totalItems }} Items</span>
                                            <span class="d-block ms-5">Rp.
                                                {{ number_format($totalPrice, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div><br />
                            <div class="mt-8">
                                <button id="tunai-button" onclick="openCashPaymentPopup()" type="submit"
                                    class="btn btn-primary py-3 px-5">
                                    Tunai <i class="ms-2 fas fa-arrow-right"></i>
                                </button>
                                <button id="pay-button" type="submit" class="btn btn-primary py-3 px-5">
                                    Non-Tunai <i class="ms-2 fas fa-arrow-right"></i>
                                </button>
                            </div><br />
                            <button id="order-button" type="button" class="btn btn-primary py-3 px-5"
                                onclick="redirectToKasirMenu()" style="display: none">
                                Buat Order <i class="ms-2 fas fa-arrow-right"></i>
                            </button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popup pembayaran tunai -->
    <div id="cashPaymentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCashPaymentPopup()">&times;</span>
            <h2>Pembayaran Tunai</h2>
            <p>
            <div class="ms-4 p-0">
                <span class="d-block">Order ID: {{ $transaction->order->id }}</span>
                <span class="d-block">Total Price:
                    {{ 'Rp ' . number_format($transaction->order->total_price, 0, ',', '.') }}</span>
            </div>
            </p>
            <!-- Tambahkan tombol untuk menyelesaikan pembayaran tunai -->
            <button onclick="payWithCash()">Selesaikan Pembayaran</button>
        </div>
    </div>


    @include('layout.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let tenantValue = '{{ auth()->user()->tenant_id }}';
        //pembayaran midtrans
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from the previous step
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
        // Inisialisasi status pembayaran
        let paymentStatus = 'pending';

        // Panggil fungsi untuk mendapatkan status pembayaran saat halaman dimuat
        getPaymentStatus();

        // Fungsi untuk mendapatkan status pembayaran dari server
        function getPaymentStatus() {
            $.ajax({
                type: 'GET',
                url: '{{ route('get-payment-status', ['orderId' => $transaction->order->id]) }}',
                success: function(response) {
                    if (response.status) {
                        paymentStatus = response.status;
                        handleOrderButtonVisibility();
                    }
                },
                error: function(error) {
                    console.error('Error getting payment status:', error.responseJSON);
                }
            });
        }

        // Fungsi untuk menangani tampilan tombol "Buat Order" berdasarkan status pembayaran
        function handleOrderButtonVisibility() {
            if (paymentStatus === 'success') {
                $('#order-button').show();
            } else {
                $('#order-button').hide();
            }
        }

        // Fungsi untuk menangani pembayaran sukses
        function handlePaymentSuccess(result) {
            let orderId = result.order_id;
            $.ajax({
                type: 'POST',
                url: '{{ route('handle-payment-success') }}',
                data: {
                    order_id: orderId,
                    payment_type: result.payment_type,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    console.log('Payment success handled:', response);
                    if (response.message && response.message === 'Pembayaran berhasil') {
                        paymentStatus = 'success';
                        alert('Pembayaran berhasil!');
                        redirectToKasirMenu();
                    } else {
                        console.error('Server response indicates an error:', response);
                        paymentStatus = 'pending';
                    }
                },
                error: function(error) {
                    console.error('Error handling payment success:', error.responseJSON);
                    paymentStatus = 'error';
                }
            });
        }

        // Fungsi untuk membuat pesanan dan mengarahkan ke halaman kasir
        function redirectToKasirMenu() {
            if (paymentStatus === 'success') {
                console.log('Order created!');
                window.location.href = '{{ route('kasir.menu.index', ['tenant' => ':tenant']) }}'.replace(':tenant',
                    tenantValue);
            } else {
                alert('Selesaikan pembayaran terlebih dahulu.');
            }
        }
        function redirectToInvoice() {
            window.location.href = '{{ route('invoice') }}';
        }

        // Fungsi untuk menangani pembayaran pending (opsional)
        function handlePaymentPending(result) {
            // Logika khusus JavaScript untuk pembayaran yang tertunda
        }

        // Fungsi untuk menangani kesalahan pembayaran (opsional)
        function handlePaymentError(result) {
            console.error('Payment error:', result);
        }

        // Fungsi untuk membuka popup pembayaran tunai
        function openCashPaymentPopup() {
            var cashPaymentModal = document.getElementById('cashPaymentModal');
            cashPaymentModal.style.display = 'block';
        }

        // Fungsi untuk menutup popup pembayaran tunai
        function closeCashPaymentPopup() {
            var cashPaymentModal = document.getElementById('cashPaymentModal');
            cashPaymentModal.style.display = 'none';
        }

        // Fungsi untuk menangani pembayaran tunai
        function payWithCash() {
            console.log('Pembayaran tunai diproses!');
            paymentStatus = 'cash';
            $.ajax({
                type: 'POST',
                url: '{{ route('handle-cash-payment') }}',
                data: {
                    order_id: '{{ $transaction->order->id }}',
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    console.log('Cash payment processed:', response);
                    if (response.message && response.message === 'Pembayaran tunai berhasil') {
                        paymentStatus = 'success';
                        alert('Pembayaran tunai berhasil!');
                        redirectToInvoice(); // Redirect directly after cash payment success
                    } else {
                        console.error('Server response indicates an error:', response);
                    }
                },
                error: function(error) {
                    console.error('Error processing cash payment:', error.responseJSON);
                }
            });
            closeCashPaymentPopup();
            $('#tunai-button').prop('disabled', true);
        }
    </script>

</body>
