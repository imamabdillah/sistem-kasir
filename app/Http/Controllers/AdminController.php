<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\PresensiMasuk;
use App\Models\PresensiKeluar;

class AdminController extends Controller
{


    public function dashboard()
    {
        $successTransactions = Transaction::where('status', 'success')->get();
        $totalSuccessTransactions = $successTransactions->sum('total_price');

        $paymentMethods = $successTransactions->pluck('payment_method')->unique()->values();
        $totalPrices = [];

        foreach ($paymentMethods as $method) {
            $totalPrices[] = $successTransactions->where('payment_method', $method)->sum('total_price');
        }

        // Tambahkan logika untuk mendapatkan data transaksi harian
        $dailyTransactions = $successTransactions->groupBy(function ($transaction) {
            return Carbon::parse($transaction->created_at)->toDateString();
        });

        $dailyTransactionDates = $dailyTransactions->keys()->toArray();
        $dailyTransactionTotalPrices = $dailyTransactions->map(function ($transactions) {
            return $transactions->sum('total_price');
        })->values()->toArray();

        $transactions = Transaction::all();
        $menus = Menu::all();
        $categories = Category::all();
        $tenants = Tenant::all();

        return view('admin.dashboard', compact(
            'menus',
            'transactions',
            'categories',
            'tenants',
            'totalSuccessTransactions',
            'paymentMethods',
            'totalPrices',
            'dailyTransactionDates',
            'dailyTransactionTotalPrices'
        ));
    }

    public function datamenu()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $tenants = Tenant::all();
        return view('admin.datamenu', compact('menus', 'categories', 'tenants'));
    }

    public function showTransaksi()
    {
        $transactions = Transaction::all();
        $tenants = Tenant::all();
        return view('admin.transaksi', compact('transactions', 'tenants'));
    }

    public function Tenant()
    {
        $tenants = Tenant::all();

        return view('admin.tenant.tenant', compact('tenants'));
    }

    public function presensimasuk()
    {
        $presensiMasuk = PresensiMasuk::all();
        $presensiKeluar = PresensiKeluar::all();

        $tenants = Tenant::all();

        // $combinedData = $presensiMasuk->merge($presensiKeluar)->sortBy('checkout_date');

        return view('admin.presensimasuk', compact('presensiMasuk', 'tenants'));
    }
    public function presensikeluar()
    {
        $presensiMasuk = PresensiMasuk::all();
        $presensiKeluar = PresensiKeluar::all();

        // $combinedData = $presensiMasuk->merge($presensiKeluar)->sortBy('checkout_date');

        return view('admin.presensikeluar', compact('presensiKeluar'));
    }

    public function activate(User $user)
    {
        $user->update(['is_active' => true]);

        return redirect()->back();
    }

    public function deactivate(User $user)
    {
        $user->update(['is_active' => false]);

        return redirect()->back();
    }
}
