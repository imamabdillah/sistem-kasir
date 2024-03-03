<!-- resources/views/pdf/invoice.blade.php -->

@include('layout.base')

<body>
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
                                            <h5 class="mb-2"><strong>Order ID#
                                                    {{ $orderItems->first()->order_id }}</strong></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-item p-4 mb-4">
                                @foreach ($orderItems as $orderItem)
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
                                <!-- Tambahkan tombol untuk mencetak invoice -->
                                <button id="print-invoice-button" onclick="printInvoice()"
                                    class="btn btn-primary py-3 px-5">
                                    Print Invoice <i class="ms-2 fas fa-print"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printInvoice() {
            window.print();
        }
    </script>

    @include('layout.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tambahkan script lain yang diperlukan -->
</body>

</html>
