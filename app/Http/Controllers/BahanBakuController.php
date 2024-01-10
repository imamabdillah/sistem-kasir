<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahanBakus = BahanBaku::all();
        return view('owner.bahanbaku.bahanbaku', compact('bahanBakus'));
    }

    public function create()
    {
        return view('owner.bahanbaku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $currentUser = Auth::user();

        $bahanBaku = new BahanBaku([
            'nama' => $request->get('nama'),
            'jumlah' => $request->get('jumlah'),
            'harga' => $request->get('harga'),
            'tenant_id' => $currentUser->tenant->id,
        ]);

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('storage/bahanbaku/'), $fotoName);
            $bahanBaku->foto = $fotoName;
        }

        $bahanBaku->save();

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan Baku berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jumlah' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $bahanBaku = BahanBaku::findOrFail($id);
        $bahanBaku->nama = $request->get('nama');
        $bahanBaku->jumlah = $request->get('jumlah');
        $bahanBaku->harga = $request->get('harga');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($bahanBaku->foto) {
                unlink(public_path('storage/bahanbaku/' . $bahanBaku->foto));
            }

            // Upload foto baru
            $foto = $request->file('foto');
            $fotoName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('storage/bahanbaku/'), $fotoName);
            $bahanBaku->foto = $fotoName;
        }

        $bahanBaku->save();

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan Baku berhasil diperbarui.');
    }


    public function edit($id)
    {
        $bahanBaku = BahanBaku::findOrFail($id);
        return view('owner.bahanbaku.edit', compact('bahanBaku'));
    }



    public function destroy($id)
    {
        $bahanBaku = BahanBaku::findOrFail($id);

        // Hapus foto jika ada
        if ($bahanBaku->foto) {
            unlink(public_path('storage/bahanbaku/' . $bahanBaku->foto));
        }

        $bahanBaku->delete();

        return redirect()->route('bahanbaku.index')->with('success', 'Bahan Baku berhasil dihapus.');
    }
}
