@extends('layout.base')

<head>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        </div>

        <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="tenant.html" class="nav-item nav-link">Tenant</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="feature.html" class="dropdown-item">Our Features</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                </div>
                <div class="text-center mt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5">Logout</button>
                    </form>
                </div>
                <div class="d-none d-lg-flex ms-2">
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-search text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-user text-body"></small>
                    </a>
                    <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                        <small class="fa fa-shopping-bag text-body"></small>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- About Start -->
    <div class="container-fluid pt-5"style="margin-top: 80px;">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Menu</h2>
                <h1 class="display-4 text-uppercase">Menu Tenant 1</h1>
            </div>
            <form class="row gx-4 gy-2 align-items-center justify-content-center">
                <div class="col-xl-4  mb-xl-10">
                    <div class="input-group-icon"><i class="fa fa-search text-body input-box-icon"></i>
                        <input class="form-control input-box form-food-control" id="inputPickup" type="text"
                            placeholder="Search" />
                    </div>
                </div>
                <div class="d-grid gap-3 col-sm-auto">
                    <button class="btn btn-primary search-border" type="submit">SEARCH</button>
                </div>
            </form>
            <br>


            <div class="position-relative text-center wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill"
                                href="#tab-{{ $category->id }}">{{ $category->nama }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>




            <h4 class="text-primary font-secondary">Menu</h4>
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div>
                        <h1 class="display-5 mb-3">Daftar Menu Tenant 1</h1>
                    </div>
                </div>
            </div>

            <div class="tab-content">
                @foreach ($categories as $category)
                    <div id="tab-{{ $category->id }}"
                        class="tab-pane fade @if ($category->id === 1) show active @endif">
                        <div class="row g-4">
                            @foreach ($menus as $menu)
                                @if ($menu->category_id == $category->id)
                                    <div class="col-xl-2 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.075s">
                                        <div class="product-item">
                                            <div class="position-relative bg-light overflow-hidden">
                                                <img class="img-fluid w-100"
                                                    src="{{ asset('storage/foto_produk/' . $menu->foto_produk) }}"
                                                    alt="{{ $menu->nama }}"
                                                    style="object-fit: cover; object-position: center; height: 200px; width: 100%;">

                                                <div class="card-img-overlay ps-0">
                                                    <span
                                                        class="badge bg-primary p-2 ms-3 rounded-pill btn-add-to-cart"
                                                        data-menu-id="{{ $menu->id }}"
                                                        onclick="addToCart({{ $menu->id }}, '{{ $menu->nama }}', {{ $menu->harga }})">
                                                        <i class="fas fa-plus me-0 fs-0"></i>
                                                    </span>
                                                    <span class="badge bg-danger ms-2 me-1 p-2 rounded-pill"
                                                        onclick="removeFromCart('{{ $menu->id }}')">
                                                        <i class="fas fa-minus me-0 fs-0"></i>
                                                    </span>
                                                    <span class="badge bg-primary p-2 ms-4 rounded-pill align-end"
                                                        data-bs-toggle="modal" data-bs-target="#noteModal"
                                                        onclick="setActiveMenu({{ $menu->id }})">
                                                        <i class="fas fa-list-alt me-0 fs-0"></i>
                                                    </span>

                                                </div>
                                            </div>
                                            <div class="text-center p-4">
                                                <a class="d-block h5 mb-2" href="#">{{ $menu->nama }}</a>
                                                <span
                                                    class="text-primary me-1">{{ 'Rp ' . number_format($menu->harga, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <a href="{{ route('tampilancheckout') }}">
                    <div class="col-xl-4 mb-5 mb-xl-10 right-table btn">
                        <!--begin::List widget 6-->
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <div class="table-responsive btn-primary">
                                <!--begin::Table-->
                                <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                                    <!--begin::Table body-->
                                    <tbody>
                                        <tr>
                                            <td class="ps-0">
                                                <span id="total-items"
                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end text-light">
                                                    {{ $totalItems }} Item
                                                </span>
                                                <span
                                                    class="text-gray-400 fw-semibold fs-7 d-block text-start ps-0 text-light ms-4">Checkout</span>
                                            </td>
                                            <td>
                                                <span id="total-price"
                                                    class="text-gray-800 fw-bold d-block fs-6 ps-0 text-end text-light">
                                                    Rp {{ number_format($totalPrice, 0, ',', '.') }}
                                                    <span class="fas fa-shopping-cart ms-1"></span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::List widget 6-->
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Start Modal Note -->
    <!-- Modal Note -->
    <div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteModalLabel">Menu Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea id="menuNote" class="form-control" placeholder="Enter your note here..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveNote()">Save Note</button>
                </div>
            </div>
        </div>
    </div>

    <!-- End Modal Note -->

    <!-- Footer Start -->
    @include('layout.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
    <script>
        const csrfTokenElement = document.head.querySelector('meta[name="csrf-token"]');
        const csrfToken = csrfTokenElement ? csrfTokenElement.content : null;


        let cartItems = []; // Array untuk menyimpan item yang dipilih

        function addToCart(menuId, menuNama, menuHarga) {
            // Kirim permintaan HTTP ke server untuk menambahkan item ke database
            fetch('{{ route('cart.addToCart') }}', {
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
                        // Tetapkan data.cart ke keranjang di sisi klien jika perlu
                        cartItems.push(data.cart);
                        updateCartView(); // Memanggil updateCartView() setelah menambah item
                    } else {
                        console.error('Failed to add item to cart:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function removeFromCart(menuId) {
            fetch('{{ route('cart.removeFromCart') }}', {
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

                        // Perbarui tampilan setelah menghapus item dari server
                        updateCartView();

                        // Pastikan ini memberikan efek pada server (menghapus item dari keranjang di sisi server)
                        // ...
                    } else {
                        console.error(data.message);
                    }

                    // Hapus item dari tampilan setelah mendapatkan respons dari server
                    let index = cartItems.findIndex(item => item.id === menuId);
                    if (index !== -1) {
                        cartItems.splice(index, 1);
                        console.log('Item removed from cart:', cartItems);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function updateCartView() {
            fetch('{{ route('update-cart-view') }}', {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    let totalItemsElement = document.getElementById('total-items');
                    let totalPriceElement = document.getElementById('total-price');

                    if (totalItemsElement && totalPriceElement) {
                        // Mengupdate tampilan total harga dan jumlah menu yang dipilih pada elemen
                        totalItemsElement.innerText = data.totalItems;
                        totalPriceElement.innerText = formatCurrency(data.totalPrice);
                    }
                })
                .catch(error => console.error('Error:', error));
        }


        function formatCurrency(amount) {
            // Fungsi untuk memformat angka ke format mata uang
            return 'Rp ' + amount.toFixed(0).replace(/\d(?=(\d{3})+$)/g, '$&,');
        }

        let activeMenuId;
        let savedNote = '';

        function setActiveMenu(menuId) {
            activeMenuId = menuId;

            // Fetch catatan dari server
            fetch(`{{ route('get-menu-note', ['menuId' => '__menuId__']) }}`.replace('__menuId__', menuId))
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Set catatan ke dalam variabel savedNote
                        savedNote = data.note;

                        // Set catatan ke dalam textarea
                        document.getElementById('menuNote').value = savedNote;
                    } else {
                        console.error('Failed to fetch note:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }


        // Mengubah saveNote untuk menangani respons dari server setelah menyimpan catatan
        function saveNote() {
            const menuNote = document.getElementById('menuNote').value;

            // Pastikan terdapat activeMenuId sebelum mengirimkan permintaan
            if (!activeMenuId) {
                console.error('No active menu selected.');
                return;
            }

            // Kirim permintaan HTTP ke server untuk menyimpan catatan
            fetch('{{ route('save-menu-note') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        menu_id: activeMenuId,
                        note: menuNote,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Note saved successfully:', data.message);
                        // Tutup modal setelah catatan disimpan
                        $('#noteModal').modal('hide');
                    } else {
                        console.error('Failed to save note:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Event listener untuk menanggapi peristiwa ketika modal ditampilkan
        $('noteModal').on('shown.bs.modal', function() {
            // Set catatan dari variabel savedNote ke dalam textarea
            document.getElementById('menuNote').value = savedNote;
        });
    </script>


</body>
