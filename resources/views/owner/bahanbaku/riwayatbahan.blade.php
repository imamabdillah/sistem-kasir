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
                    List Bahan Baku</h1>
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
        </div>
        <!--end::Toolbar container-->
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <div class="card-title">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            List Bahan Baku</h1>
                        <!-- ... (breadcrumb code sebelumnya) ... -->
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table tabel-layout="fixed" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-60px pe-2">No</th>
                                <th class="min-w-100px">Nama Bahan Baku</th>
                                <th class="text-center min-w-100px">Bahan Keluar</th>
                                <th class="text-center min-w-100px">Harga</th>
                                <th class="text-center min-w-100px">Foto</th>
                                <th class="text-center min-w-100px">Shift</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($bahanBakus as $bahanbaku)
                                @if ($bahanbaku->tenant->id === Auth::user()->tenant_id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bahanbaku->nama }}</td>
                                        <td class="text-center">{{ $bahanbaku->jumlah }}</td>
                                        <td class="text-center">
                                            {{ 'Rp ' . number_format($bahanbaku->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/bahanbaku/' . $bahanbaku->foto) }}"
                                                alt="{{ $bahanbaku->nama }}" class="img-fluid" style="max-width: 50px;">
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(url) {
            var result = confirm("Apakah Anda yakin ingin menghapus?");
            if (result) {
                // Menggunakan fetch untuk mengirim request DELETE
                fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Tambahkan CSRF token jika menggunakan Laravel
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Tambahkan logika untuk menangani response
                        console.log(data);
                        // Jika berhasil, arahkan ke halaman tertentu
                        window.location.href = '{{ route('bahanbaku.index') }}';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>
</body>

//Stock Keluar Kasir
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
                    List Bahan Baku</h1>
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
        </div>
        <!--end::Toolbar container-->
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <div class="card card-flush">
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <div class="card-title">
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            List Bahan Baku</h1>
                        <!-- ... (breadcrumb code sebelumnya) ... -->
                    </div>
                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">

                        </div>
                        <a href="{{ route('bahanbaku.create') }}" class="btn btn-primary">Tambah Bahan Keluar</a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table tabel-layout="fixed" class="table align-middle table-row-dashed fs-6 gy-5">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-60px pe-2">No</th>
                                <th class="min-w-100px">Nama Bahan Baku</th>
                                <th class="text-center min-w-100px">Bahan Keluar</th>
                                <th class="text-center min-w-100px">Harga</th>
                                <th class="text-center min-w-100px">Foto</th>
                                <th class="text-center min-w-100px">Shift</th>
                                <th class="text-center min-w-70px">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach ($bahanBakus as $bahanbaku)
                                @if ($bahanbaku->tenant->id === Auth::user()->tenant_id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bahanbaku->nama }}</td>
                                        <td class="text-center">{{ $bahanbaku->jumlah }}</td>
                                        <td class="text-center">
                                            {{ 'Rp ' . number_format($bahanbaku->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/bahanbaku/' . $bahanbaku->foto) }}"
                                                alt="{{ $bahanbaku->nama }}" class="img-fluid" style="max-width: 50px;">
                                        </td>
                                        <td class="text-center min-w-70px">
                                        </td>
                                        <td class="text-center min-w-70px">
                                            <a href="{{ route('bahanbaku.edit', $bahanbaku->id) }}"
                                                class="btn btn-sm btn-icon btn-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button class="btn btn-sm btn-icon btn-danger"
                                                onclick="confirmDelete('{{ route('bahanbaku.destroy', $bahanbaku->id) }}')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(url) {
            var result = confirm("Apakah Anda yakin ingin menghapus?");
            if (result) {
                // Menggunakan fetch untuk mengirim request DELETE
                fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Tambahkan CSRF token jika menggunakan Laravel
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Tambahkan logika untuk menangani response
                        console.log(data);
                        // Jika berhasil, arahkan ke halaman tertentu
                        window.location.href = '{{ route('bahanbaku.index') }}';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        }
    </script>
</body>