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
                    Informasi Tenant</h1>
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

                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                        <div class="w-100 mw-150px">
                        </div>
                        <a href="{{ route('tenantinfos.create') }}" class="btn btn-primary">Edit Informasi Tenant</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body pt-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-60px pe-2">No</th>
                                    <th class="min-w-100px">Nama Tenant</th>
                                    <th class="min-w-200px">Deskripsi Umum</th>
                                    <th class="min-w-200px">Rekomendasi Menu A</th>
                                    <th class="min-w-200px">Rekomendasi Menu B</th>
                                    <th class="text-center min-w-200px">Foto Tenant</th>
                                    <th class="text-center min-w-200px">Foto Menu</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($tenantInfos as $tenantInfo)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tenantInfo->tenant->nama }}</td>
                                        <td>{{ $tenantInfo->deskripsi_umum }}</td>
                                        <td>{{ $tenantInfo->rekomendasi_menu_a }}</td>
                                        <td>{{ $tenantInfo->rekomendasi_menu_b }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/tenant/foto/' . $tenantInfo->foto_tenant) }}"
                                                alt="{{ $tenantInfo->tenant->nama }}" class="img-fluid"
                                                style="max-width: 100px;">
                                        </td>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/tenant/menu/' . $tenantInfo->foto_menu) }}"
                                                alt="{{ $tenantInfo->tenant->nama }}" class="img-fluid"
                                                style="max-width: 100px;">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
