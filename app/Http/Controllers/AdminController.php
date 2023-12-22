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
    public function userowner()
    {
        $tenants = Tenant::all();
        $users = User::where('role', 'owner')->get();
        return view('admin.userowner', compact('users'));
    }
    public function userkasir()
    {
        $tenants = Tenant::all();
        $users = User::where('role', 'kasir')->get();
        return view('admin.userkasir', compact('users'));
    }
    public function showTransaksi()
    {
        $transactions = Transaction::all();

        return view('admin.transaksi', compact('transactions'));
    }
    public function Tenant()
    {
        $tenants = Tenant::all();

        return view('admin.tenant.tenant', compact('tenants'));
    }
}
