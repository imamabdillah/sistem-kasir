<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function create()
    {
        return view('admin.tenant.create');
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            // tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        Tenant::create($request->all());

        return redirect()->route('admin.tenant')->with('success', 'Tenant berhasil ditambahkan!');
    }

    public function edit(Tenant $tenant)
    {
        return view('admin.tenant.edit', compact('tenant'));
    }

    public function update(Request $request, Tenant $tenant)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            // tambahkan aturan validasi lainnya sesuai kebutuhan
        ]);

        $tenant->update($request->all());

        return redirect()->route('admin.tenant')->with('success', 'Tenant berhasil diperbarui!');
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();

        return redirect()->route('admin.tenant')->with('success', 'Tenant berhasil dihapus!');
    }
}
