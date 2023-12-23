<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tenant;

class UserownerController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        $users = User::where('role', 'owner')->get();
        return view('admin.userowner.userowner', compact('users'));
    }

    public function create()
    {
        $tenants = Tenant::all();
        return view('admin.userowner.create', compact('tenants'));
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
            'role' => 'owner',
            'tenant_id' => $request->tenant,
        ]);

        return redirect()->route('admin.owner.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $tenants = Tenant::all();
        return view('admin.userowner.edit', compact('user', 'tenants'));
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

        return redirect()->route('admin.owner.index')->with('success', 'Perubahan pada user berhasil disimpan.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.owner.index')->with('success', 'User berhasil dihapus.');
    }
}
