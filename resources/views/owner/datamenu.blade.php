@include('layout.adminheader')

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">

    @include('layout.ownernav')
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    List Menu</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted text-hover-primary">Owner</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item">
                        {{ Auth::user()->tenant->nama }}
                    </li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->

            <!--end::Actions-->
        </div>
        <!--end::Toolbar container-->
    </div>

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
                                data-placeholder="Tenant" data-kt-ecommerce-product-filter="tenant" id="selectTenant">
                                <option></option>
                                <option value="all">All</option>
                                @foreach ($tenants as $tenant)
                                    <option value="{{ $tenant->id }}">{{ $tenant->nama }}</option>
                                @endforeach
                            </select>
                            <!--end::Select2-->
                        </div>
                        <!--begin::Add product-->
                        <a href="{{ route('owner.create') }}" class="btn btn-primary">Tambah Menu</a>
                        <!--end::Add product-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table tabel-layout="fixed"class="table align-middle table-row-dashed fs-6 gy-5"
                        id="kt_ecommerce_products_table">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-60px pe-2">No</th>
                                <th class="min-w-100px">Nama Menu</th>
                                <th class="text-center min-w-100px">deskripsi</th>
                                <th class="text-center min-w-100px">harga</th>
                                <th class="text-center min-w-100px">kategori</th>
                                <th class="text-center min-w-100px">tenant</th>
                                <th class="text-center min-w-70px">Actions</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fw-semibold text-gray-600">
                            <!--begin::Table row-->
                            @foreach ($menus as $menu)
                                @if ($menu->tenant_id == auth()->user()->tenant_id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="" class="symbol symbol-50px">
                                                    <span class="symbol-label"
                                                        style="background-image: url('{{ asset('storage/foto_produk/' . $menu->foto_produk) }}');"></span>
                                                </a>
                                                <div class="ms-5">
                                                    <a href=""
                                                        class="text-gray-900 text-hover-primary fs-5 fw-bold"
                                                        data-kt-ecommerce-product-filter="product_name">{{ $menu->nama }}</a>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- Deskripsi -->
                                        <td class="text-center pe-0">
                                            <span class="text-gray-800">{{ $menu->deskripsi }}</span>
                                        </td>

                                        <!-- Harga -->
                                        <td class="text-gray-800 text-center pe-0">
                                            {{ 'Rp ' . number_format($menu->harga, 0, ',', '.') }}
                                        </td>

                                        <!-- Kategori -->
                                        <td class="text-gray-800 text-center pe-0">
                                            {{ $menu->category->nama }}
                                        </td>

                                        <!-- Tenant -->
                                        <td class="text-gray-800 text-center pe-0">
                                            {{ $menu->tenant->nama }}
                                        </td>


                                        <!-- Actions (Edit, Delete, etc.) -->
                                        <td class="text-center min-w-70px">
                                            <a href="{{ route('owner.edit', $menu->id) }}"
                                                class="btn btn-sm btn-icon btn-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <button class="btn btn-sm btn-icon btn-danger"
                                                onclick="confirmDelete('{{ route('owner.destroy', $menu->id) }}')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
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
                        console.log(response.status); // Tambahkan baris ini
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

                        // Redirect ke halaman dashboard setelah penghapusan
                        window.location.href = '{{ route('owner.datamenu') }}';

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
            // Ambil elemen select
            const selectTenant = document.getElementById('selectTenant');

            // Tambahkan event listener untuk mendeteksi perubahan pada select
            selectTenant.addEventListener('change', function() {
                const selectedTenantId = this.value;

                // Ambil semua item menu
                const menuItems = document.querySelectorAll('.menu-item');

                // Loop melalui setiap item menu
                menuItems.forEach(function(menuItem) {
                    // Dapatkan data-tenant-id untuk setiap item menu
                    const menuItemTenantId = menuItem.getAttribute('data-tenant-id');

                    // Tentukan apakah item menu harus ditampilkan atau disembunyikan
                    if (selectedTenantId === 'all' || selectedTenantId === menuItemTenantId) {
                        menuItem.style.display = 'block'; // Tampilkan item menu
                    } else {
                        menuItem.style.display = 'none'; // Sembunyikan item menu
                    }
                });
            });
        });
    </script>


</body>
