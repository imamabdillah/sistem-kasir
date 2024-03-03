@include('layout.adminheader')

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true"
    data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-minimize="on" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true"
    data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->


    <!--begin::Main-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            @include('layout.adminnav')

            <!--begin::Content wrapper-->
            <div class="d-flex flex-column flex-column-fluid">
                <!--begin::Toolbar-->
                <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                    <!--begin::Toolbar container-->
                    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                        <!--begin::Page title-->
                        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                            <!--begin::Title-->
                            <h1
                                class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                Product Form
                            </h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Page title-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Content-->
                <form action="{{ route('owner.update', $menu->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="kt_app_content" class="app-content flex-column-fluid">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container container-xxl">
                            <!--begin::Form-->
                            <div class="form d-flex flex-column flex-lg-row"
                                data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/products.html">
                                <!--begin::Aside column-->
                                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                                    <!--begin::Thumbnail settings-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Thumbnail</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body text-center pt-0">
                                            <!--begin::Image input-->
                                            <!--begin::Image input placeholder-->
                                            <style>
                                                .image-input-placeholder {
                                                    background-image: url("{!! asset('assets/media/svg/files/blank-image.svg') !!}");
                                                }

                                                [data-bs-theme="dark"] .image-input-placeholder {
                                                    background-image: url("{!! asset('assets/media/svg/files/blank-image.dark.svg') !!}");
                                                }
                                            </style>
                                            <!--end::Image input placeholder-->
                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3"
                                                data-kt-image-input="true">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-150px h-150px"
                                                    style="overflow: hidden;">
                                                    @if ($menu->foto_produk)
                                                        <img src="{{ asset('storage/foto_produk/' . $menu->foto_produk) }}"
                                                            alt="Product Image"
                                                            style="width: 100%; height: 100%; object-fit: cover;" />
                                                    @else
                                                        <!-- Jika gambar tidak ada, tampilkan pesan atau tindakan lain sesuai kebutuhan -->
                                                        <span class="text-muted">No image available</span>
                                                    @endif
                                                </div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Change avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="foto_produk"id="foto_produk_input"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Remove avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7">Set the product thumbnail image. Only *.png,
                                                *.jpg
                                                and
                                                *.jpeg image files are accepted</div>
                                            <!--end::Description-->
                                        </div>

                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Thumbnail settings-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <!--begin::Card title-->
                                            <div class="card-title">
                                                <h2>Product Details</h2>
                                            </div>
                                            <!--end::Card title-->
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Input group-->
                                            <!--begin::Label-->
                                            <label class="required form-label">Categories</label>
                                            <!--end::Label-->
                                            <!--begin::Select2-->
                                            <select name="category_id"
                                                class="form-select form-select-solid form-select-lg mb-2"
                                                data-control="select2">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @if ($category->id === $menu->category_id) selected @endif>
                                                        {{ $category->nama }}</option>
                                                @endforeach
                                            </select>
                                            <!--end::Select2-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7 mb-7">Select a category for the menu.</div>
                                            <!--end::Description-->
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <!--begin::Label-->
                                            <label class="required form-label">Tenant</label>
                                            <!--end::Label-->
                                            <!--begin::Select2-->
                                            <select name="tenant_id"
                                                class="form-select form-select-solid form-select-lg mb-2"
                                                data-control="select2">
                                                @foreach ($tenants as $tenant)
                                                    @if ($tenant->id == Auth::user()->tenant_id)
                                                        <option value="{{ $tenant->id }}">{{ $tenant->nama }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <!--end::Select2-->
                                            <!--begin::Description-->
                                            <div class="text-muted fs-7 mb-7">Select a Tenant for the menu.</div>
                                            <!--end::Description-->
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                </div>

                                <!--end::Aside column-->
                                <!--begin::Main column-->
                                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                                    <!--begin::Tabs-->

                                    <!--end::Tabs-->
                                    <!--begin::Tab content-->
                                    <div class="tab-content">
                                        <!--begin::Tab pane-->
                                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general"
                                            role="tab-panel">
                                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                                <!--begin::General options-->
                                                <div class="card card-flush py-4">
                                                    <!--begin::Card header-->
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h2>General</h2>
                                                        </div>
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0">
                                                        <!--begin::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Product Name</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="nama"
                                                                class="form-control mb-2" placeholder="Product name"
                                                                value="{{ $menu->nama }}" />
                                                            <!--end::Input-->
                                                            <!--begin::Description-->
                                                            <div class="text-muted fs-7">A product name is required and
                                                                recommended to be unique.</div>
                                                            <!--end::Description-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Deskripsi</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="deskripsi"
                                                                class="form-control mb-2"
                                                                placeholder="Product Description"
                                                                value="{{ $menu->deskripsi }}" />
                                                            <!--end::Input-->
                                                            <!--begin::Description-->
                                                            <div class="text-muted fs-7">Product Description</div>
                                                            <!--end::Description-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Stock</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="number" name="stock" class="form-control mb-2"
                                                                placeholder="Product Stock" value="" />
                                                            <!--end::Input-->
                                                            <!--begin::Description-->
                                                            <div class="text-muted fs-7">Product Stock</div>
                                                            <!--end::Description-->
                                                        </div>
                                                    </div>
                                                    <!--end::Card header-->
                                                </div>
                                                <!--end::General options-->
                                                <!--begin::Pricing-->
                                                <div class="card card-flush py-4">
                                                    <!--begin::Card header-->
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            <h2>Pricing</h2>
                                                        </div>
                                                    </div>
                                                    <!--end::Card header-->
                                                    <!--begin::Card body-->
                                                    <div class="card-body pt-0">
                                                        <!--begin::Input group-->
                                                        <div class="mb-10 fv-row">
                                                            <!--begin::Label-->
                                                            <label class="required form-label">Base Price</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" name="harga"
                                                                class="form-control mb-2" placeholder="Product price"
                                                                value="{{ 'Rp ' . number_format($menu->harga, 0, ',', '.') }}" />
                                                            <!--end::Input-->
                                                            <!--begin::Description-->
                                                            <div class="text-muted fs-7">Set the product price.</div>
                                                            <!--end::Description-->
                                                        </div>
                                                        <!--end::Input group-->
                                                    </div>
                                                    <!--end::Card header-->
                                                </div>
                                                <!--end::Pricing-->

                                            </div>
                                        </div>
                                        <!--end::Tab pane-->
                                    </div>
                                    <!--end::Tab content-->
                                    <div class="d-flex justify-content-end">
                                        <a href="" id="kt_ecommerce_add_product_cancel"
                                            class="btn btn-light me-5">Cancel</a>
                                        <button type="submit" class="btn btn-primary">
                                            <span class="indicator-label">Update</span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <!--end::Main column-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Content container-->
                    </div>
                </form>
                <!--end::Content-->
            </div>

            <!--end::Content wrapper-->
        </div>
    </div>
    <!--end:::Main-->
    <script>
        //foto_produk
        document.addEventListener('DOMContentLoaded', function() {
            var imageInput = document.querySelector('[data-kt-image-input="true"]');
            var inputFile = document.getElementById('foto_produk_input');
            var previewWrapper = document.querySelector('[data-kt-image-input="true"] .image-input-wrapper');


            inputFile.addEventListener('change', function() {
                var file = this.files[0];

                if (file) {
                    // Buat objek URL untuk file yang dipilih
                    var objectUrl = URL.createObjectURL(file);

                    // Ganti background image pada preview wrapper dengan objek URL
                    previewWrapper.style.backgroundImage = 'url(' + objectUrl + ')';
                } else {
                    // Jika tidak ada file yang dipilih, tampilkan gambar placeholder
                    previewWrapper.style.backgroundImage = 'url("{!! asset('assets/media/svg/files/blank-image.svg') !!}")';
                }
            });

            // Hapus gambar dari penyimpanan saat tombol remove diklik
            imageInput.querySelector('[data-kt-image-input-action="remove"]').addEventListener('click', function() {
                // Hapus file yang dipilih dari input file
                inputFile.value = null;

                // Tampilkan gambar placeholder
                previewWrapper.style.backgroundImage = 'url("{!! asset('assets/media/svg/files/blank-image.svg') !!}")';
            });
        });

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

        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function() {
                document.querySelector('.indicator-label').classList.add('d-none');
                document.querySelector('.indicator-progress').classList.remove('d-none');
            });
        });
    </script>
</body>
