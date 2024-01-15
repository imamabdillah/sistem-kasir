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
    public function ContactUs()
    {
        return view('contactus');
    }
    public function tenant()
    {
        return view('tenant');
    }
    public function userinactive()
    {
        return view('layout.userinactive');
    }
    public function home()
    {
        $user = auth()->user();

        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'owner') {
            return redirect()->route('owner.dashboard');
        } elseif ($user->role == 'kasir') {
            // Mengarahkan ke halaman menu dengan menyertakan tenant_id
            return redirect()->route('kasir.menu.index', ['tenant' => $user->tenant_id]);
        } else {
            return auth()->logout();
        }
    }
}
