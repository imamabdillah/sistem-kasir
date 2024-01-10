<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function index()
    {
        // Tampilkan semua supplier
        $suppliers = Supplier::all();
        return view('owner.supplier.supplier', compact('suppliers'));
    }

    public function create()
    {
        // Tampilkan formulir pembuatan supplier
        return view('owner.supplier.create');
    }

    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'kontak' => 'required',
            // Tambahkan validasi sesuai kebutuhan
        ]);

        // Simpan data supplier yang baru dengan menyertakan tenant_id
        $currentUser = Auth::user();

        Supplier::create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'kontak' => $request->input('kontak'),
            'tenant_id' => $currentUser->tenant->id,
            // Tambahkan field lain sesuai kebutuhan
        ]);

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Tampilkan detail supplier
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    public function edit($id)
    {
        // Tampilkan formulir pengeditan supplier
        $supplier = Supplier::findOrFail($id);
        return view('owner.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'kontak' => 'required',
            // Tambahkan validasi sesuai kebutuhan
        ]);

        // Perbarui data supplier
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('suppliers.index')
            ->with('success', 'Supplier berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus supplier
        $supplier = Supplier::findOrFail($id);
        $supplierName = $supplier->name; // Menggunakan kolom 'nama', sesuaikan dengan kolom yang sesuai
        $supplier->delete();

        return response()->json(['message' => 'Supplier ' . $supplierName . ' berhasil dihapus.']);
    }
}
