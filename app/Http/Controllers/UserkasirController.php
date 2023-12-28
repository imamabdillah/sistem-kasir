<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tenant;
use Illuminate\Http\Request;

class UserkasirController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        $users = User::where('role', 'kasir')->get();
        return view('admin.userkasir.userkasir', compact('users'));
    }
    public function create()
    {
        $tenants = Tenant::all();
        return view('admin.userkasir.create', compact('tenants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'tenant' => 'required|exists:tenants,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'kasir',
            'tenant_id' => $request->tenant,
        ]);

        return redirect()->route('admin.kasir.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $tenants = Tenant::all();
        return view('admin.userkasir.edit', compact('user', 'tenants'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'tenant' => 'required|exists:tenants,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'tenant_id' => $request->tenant,
        ]);

        return redirect()->route('admin.kasir.index')->with('success', 'Perubahan pada user berhasil disimpan.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.kasir.index')->with('success', 'User berhasil dihapus.');
    }
    public function createkasir()
    {
        $tenants = Tenant::all();
        return view('owner.userkasir.create', compact('tenants'));
    }

    public function storekasir(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'tenant' => 'required|exists:tenants,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'kasir',
            'tenant_id' => $request->tenant,
        ]);

        return redirect()->route('owner.kasir.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function editkasir(User $user)
    {
        $tenants = Tenant::all();
        return view('owner.userkasir.edit', compact('user', 'tenants'));
    }

    public function updatekasir(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'tenant' => 'required|exists:tenants,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'tenant_id' => $request->tenant,
        ]);

        return redirect()->route('owner.kasir.index')->with('success', 'Perubahan pada user berhasil disimpan.');
    }

    public function destroykasir($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('owner.kasir.index')->with('success', 'User berhasil dihapus.');
    }
}
