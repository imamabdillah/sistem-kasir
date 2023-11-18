<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Tenant;
use App\Models\Category;
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
}
