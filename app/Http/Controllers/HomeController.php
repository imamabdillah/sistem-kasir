<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama sesuai dengan peran pengguna.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landingpage');
    }
    public function AboutUs()
    {
        return view('aboutus');
    }
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('admin.dashboard');
        } elseif (auth()->user()->role == 'owner') {
            return redirect('owner.dashboard');
        } elseif (auth()->user()->role == 'kasir') {
            return redirect('kasir.menu.index');
        } else {
            return auth()->logout();
        }
    }
}
