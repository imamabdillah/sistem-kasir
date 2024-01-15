<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {

        if ($user->is_active == 0) {
            auth()->logout(); // Log the user out
            return redirect()->route('userincative')->with('error', 'Your account is inactive. Please contact the administrator.');
        }

        // Redirect based on user role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'owner') {
            return redirect()->route('owner.dashboard');
        } elseif ($user->role === 'kasir') {
            return redirect()->route('kasir.menu.index', ['tenant' => $user->tenant_id]);
        } elseif ($user->role === 'member') {
            // Customize this route based on where you want members to be redirected
            return redirect()->route('member.home');
        }


        // Default redirect for other roles
        return redirect()->route('home');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landingpage');
    }
}
