@include('layout.adminheader')

<div id="kt_app_content" class="app-content flex-column-fluid">
    <div id="kt_app_content_container" class="app-container container-xxl">
        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="card-title">
                    <h2 class="fw-bolder">Edit kasir</h2>
                </div>
            </div>
            <div class="card-body">
                <!-- Tambahkan formulir edit di sini -->
                <form action="{{ route('owner.kasir.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tenant" class="form-label">Pilih Tenant</label>
                        <select class="form-select @error('tenant') is-invalid @enderror" id="tenant" name="tenant"
                            required>
                            <option value="" selected disabled>Pilih Tenant</option>
                            @foreach ($tenants as $tenant)
                                @if ($tenant->id == Auth::user()->tenant_id)
                                    <option value="{{ $tenant->id }}"
                                        {{ old('tenant', $user->tenant->id) == $tenant->id ? 'selected' : '' }}>
                                        {{ $tenant->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('tenant')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Tambahkan input dan field formulir lainnya sesuai kebutuhan -->

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
