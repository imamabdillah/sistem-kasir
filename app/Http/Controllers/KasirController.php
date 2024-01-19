<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\BahanBaku;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PresensiMasuk;
use App\Models\PresensiKeluar;
use Illuminate\Support\Facades\Auth;


class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.menu.index');
    }

    public function presensimasuk()
    {
        return view('kasir.presensimasuk');
    }
    public function stockkasir()
    {
        $bahanBakus = BahanBaku::all();
        return view('kasir.stockkasir', compact('bahanBakus'));
    }
    public function kasirbahan()
    {
        $bahanBakus = BahanBaku::all();
        return view('kasir.kasirbahan', compact('bahanBakus'));
    }
    public function presensikeluar()
    {
        return view('kasir.presensikeluar');
    }

    public function transaksi()
    {
        $operatorId = Auth::user()->id;
        // Mendapatkan transaksi berdasarkan user_id
        $transactions = Transaction::where('user_id', $operatorId)->get();
        // Menghitung total transaksi sukses
        $totalHargaTransaksi = $transactions->where('status', 'success')->sum('total_price');
        return view('kasir.transaksi', compact('transactions', 'totalHargaTransaksi'));
    }

    public function checkIn(Request $request)
    {
        // Validasi data formulir
        $request->validate([
            'checkin_date' => 'required|date',
            'checkin_time' => 'required|date_format:H:i',
            'checkin_note' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $currentUser = Auth::user();

        // Menyimpan data check-in ke tabel presensi_masuk
        $photoPath = $request->file('photo')->storeAs('public/photos', time() . '.' . $request->file('photo')->getClientOriginalExtension());

        $presensiMasuk = new PresensiMasuk([
            'user_id' => $currentUser->id,
            'tenant_id' => $currentUser->tenant->id,
            'checkin_date' => $request->checkin_date,
            'checkin_time' => $request->checkin_time,
            'checkin_note' => $request->checkin_note,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photo' => $photoPath,
        ]);

        // Simpan foto ke direktori penyimpanan
        $photo = $request->file('photo');
        $imageName = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('storage/photo/'), $imageName);
        $presensiMasuk->photo = $imageName;
        // Simpan data check-in ke tabel presensi_masuk
        $presensiMasuk->save();

        return redirect()->route('presensimasuk')->with('success', 'Check-in berhasil!');
    }

    public function checkOut(Request $request)
    {
        // Validasi data formulir
        $request->validate([
            'checkout_date' => 'required|date',
            'checkout_time' => 'required|date_format:H:i',
            'checkout_note' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $currentUser = Auth::user();

        // Menyimpan data check-out ke tabel presensi_keluar
        $photoPath = $request->file('photo')->storeAs('public/photos', time() . '.' . $request->file('photo')->getClientOriginalExtension());

        $presensiKeluar = new PresensiKeluar([
            'user_id' => $currentUser->id,
            'tenant_id' => $currentUser->tenant->id,
            'checkout_date' => $request->checkout_date,
            'checkout_time' => $request->checkout_time,
            'checkout_note' => $request->checkout_note,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'photo' => $photoPath,
        ]);
        // Simpan foto ke direktori penyimpanan
        $photo = $request->file('photo');
        $imageName = time() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('storage/photo/'), $imageName);
        $presensiKeluar->photo = $imageName;

        // Simpan data check-out ke tabel presensi_keluar
        $presensiKeluar->save();

        return redirect()->route('presensikeluar')->with('success', 'Check-out berhasil!');
    }
}
