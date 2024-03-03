@include('layout.base')

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">

    @include('layout.kasirnav')

    <div id="kt_app_content" class="app-content flex-column-fluid" style="margin-top: 150px;">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Products-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <h4>{{ 'Total Transaksi: Rp ' . number_format($totalHargaTransaksi, 0, ',', '.') }}
                            </h4>
                        </div>
                        <!--end::Search-->
                    </div>

                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table tabel-layout="fixed"class="table align-middle table-row-dashed fs-6 gy-5"
                        id="kt_ecommerce_products_table">
                        <!--begin::Table head-->
                        <thead>
                            <tr>
                                <th class="w-10px pe-2">No</th>
                                <th class="text-center min-w-0px">Order ID</th>
                                <th class="text-center min-w-100px">Total Price</th>
                                <th class="text-center min-w-100px">Payment Method</th>
                                <th class="text-center min-w-100px">Status</th>
                                <th class="text-center min-w-100px">Operator</th>
                                <th class="text-center min-w-100px">Transaction Time</th> <!-- New column for transaction time -->

                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600 text-center pe-0">
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->order_id }}</td>
                                    <td> {{ 'Rp ' . number_format($transaction->total_price, 0, ',', '.') }}</td>
                                    <td>{{ $transaction->payment_method }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td>{{ $transaction->users->name }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Products-->
        </div>
        <!--end::Content container-->
    </div>

    <!--end::Drawers-->
    <!--begin::Scrolltop-->

    <!--end::Scrolltop-->
    <!--begin::Modals-->




    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

</body>
