@include('layout.adminheader')

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">

    @include('layout.ownernav')

    <div class="d-flex flex-column flex-column-fluid">
        <form method="POST" action="{{ route('tenantinfos.update', $tenantInfo->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="kt_app_content" class="app-content flex-column-fluid">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container container-xxl">
                    <!--begin::Form-->
                    <div class="form d-flex flex-column flex-lg-row">
                        <!--begin::Main column-->
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                            <!--begin::General options-->
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Tenant Info Details</h2>
                                    </div>
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Nama Tenant</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="nama" class="form-control mb-2"
                                            placeholder="Nama Tenant" value="{{ $tenantInfo->nama }}" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Masukkan nama tenant.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Deskripsi Umum</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="deskripsi_umum" class="form-control mb-2">{{ $tenantInfo->deskripsi_umum }}</textarea>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Masukkan deskripsi umum tenant.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Rekomendasi Menu A</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="rekomendasi_menu_a" class="form-control mb-2">{{ $tenantInfo->rekomendasi_menu_a }}</textarea>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Masukkan rekomendasi menu A.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Rekomendasi Menu B</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="rekomendasi_menu_b" class="form-control mb-2">{{ $tenantInfo->rekomendasi_menu_b }}</textarea>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Masukkan rekomendasi menu B.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Deskripsi Tenant</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="deskripsi_tenant" class="form-control mb-2">{{ $tenantInfo->deskripsi_tenant }}</textarea>
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Masukkan deskripsi tenant.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Foto Tenant</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" name="foto_tenant" accept=".png, .jpg, .jpeg" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Pilih file foto tenant. Hanya file gambar
                                            *.png,
                                            *.jpg,
                                            dan *.jpeg yang diterima.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10 fv-row">
                                        <!--begin::Label-->
                                        <label class="required form-label">Foto Menu</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" name="foto_menu" accept=".png, .jpg, .jpeg" />
                                        <!--end::Input-->
                                        <!--begin::Description-->
                                        <div class="text-muted fs-7">Pilih file foto menu. Hanya file gambar
                                            *.png,
                                            *.jpg,
                                            dan *.jpeg yang diterima.</div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end::Card header-->
                            </div>
                            <!--end::General options-->
                        </div>
                        <!--end::Main column-->
                    </div>
                    <!--end::Form-->
                    <div class="d-flex justify-content-end">
                        <!--begin::Button-->
                        <a href="{{ route('tenantinfos.index') }}" class="btn btn-light me-5">Cancel</a>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <!--end::Content container-->
            </div>
        </form>
        <!--end::Content-->
    </div>

    <script>
        // ... (JavaScript code sebelumnya) ...
    </script>
</body>
