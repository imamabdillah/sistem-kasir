<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\Tenant;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $tenants = Tenant::all();
        return view('admin.dashboard', compact('menus', 'categories', 'tenants'));
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
