@extends('layout.adminheader')

<body>

    <div id="kt_app_content" class="app-content flex-column-fluid">
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
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-ecommerce-product-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search Product" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                            <!--begin::Select2-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                                data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                                <option></option>
                                <option value="all">All</option>
                                <option value="published">Published</option>
                                <option value="scheduled">Scheduled</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="{{ route('create') }}" class="btn btn-primary">Add
                            Product</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                                            data-kt-check-target="#kt_ecommerce_products_table .form-check-input"
                                            value="1" />
                                    </div>
                                </th>
                                <th class="min-w-100px">Nama Menu</th>
                                <th class="text-end min-w-100px">deskripsi</th>
                                <th class="text-end min-w-100px">harga</th>
                                <th class="text-end min-w-100px">kategori</th>
                                <th class="text-end min-w-100px">tenant</th>
                                <th class="text-end min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                            <!--begin::Table row-->
                            @foreach ($menus as $menu)
                                <tr>
                                    <!-- Checkbox -->
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox"
                                                value="{{ $menu->id }}" />
                                        </div>
                                    </td>

                                    <!-- Nama Menu -->
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="" class="symbol symbol-50px">
                                                <span class="symbol-label"
                                                    style="background-image: url('{{ asset('storage/foto_produk/' . $menu->foto_produk) }}');"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="" class="text-gray-800 text-hover-primary fs-5 fw-bold"
                                                    data-kt-ecommerce-product-filter="product_name">{{ $menu->nama }}</a>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Deskripsi -->
                                    <td class="text-end pe-0">
                                        <span class="fw-bold">{{ $menu->deskripsi }}</span>
                                    </td>

                                    <!-- Harga -->
                                    <td class="text-end pe-0">{{ 'Rp ' . number_format($menu->harga, 0, ',', '.') }}
                                    </td>

                                    <!-- Kategori -->
                                    <!-- Kategori -->
                                    <td class="text-end pe-0">
                                        {{ $menu->category->nama }}
                                    </td>

                                    <!-- Tenant -->
                                    <td class="text-end pe-0">
                                        {{ $menu->tenant->nama }}
                                    </td>


                                    <!-- Actions (Edit, Delete, etc.) -->
                                    <td class="text-end min-w-70px">
                                        <a href="{{ route('edit', $menu->id) }}"
                                            class="btn btn-sm btn-icon btn-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <button class="btn btn-sm btn-icon btn-danger"
                                            onclick="confirmDelete('{{ route('destroy', $menu->id) }}')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            <!--end::Table row-->
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
    <script>
        function confirmDelete(url, menuId) {
            var confirmation = confirm('Apakah Anda yakin ingin menghapus menu ini?');
            if (confirmation) {
                // Jika pengguna menekan "OK", lakukan permintaan DELETE menggunakan fetch
                fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            // Handle jika permintaan berhasil
                            return response.json();
                        } else {
                            throw new Error('Gagal menghapus menu');
                        }
                    })
                    .then(data => {
                        // Handle data setelah penghapusan berhasil
                        alert(data.message);

                        // Perbarui tampilan atau hapus menu dari DOM
                        var menuElement = document.getElementById('menu_' + menuId);
                        if (menuElement) {
                            menuElement.remove(); // Hapus elemen menu dari DOM
                        }

                        // Tambahkan logika lain setelah penghapusan jika diperlukan
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                // Jika pengguna membatalkan penghapusan
                console.log('Penghapusan dibatalkan.');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var addToCartButtons = document.querySelectorAll('.btn-add-to-cart');

            addToCartButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var menuId = this.getAttribute('data-menu-id');

                    fetch('/add-to-cart/' + menuId, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            alert(data.success); // Tampilkan pesan sukses
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        });
    </script>


</body>

</html>
