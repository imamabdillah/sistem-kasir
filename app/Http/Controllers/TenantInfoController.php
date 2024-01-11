<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\TenantInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TenantInfoController extends Controller
{
    public function index()
    {
        $tenantInfos = TenantInfo::all();
        return view('owner.tenantinfo.tenantinfo', compact('tenantInfos'));
    }

    public function create()
    {
        $tenants = Tenant::all();

        return view('owner.tenantinfo.create', compact('tenants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'deskripsi_umum' => 'required',
            'rekomendasi_menu_a' => 'required',
            'rekomendasi_menu_b' => 'required',
            'foto_tenant' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_menu' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Create a TenantInfo instance with user's tenant_id
        $tenantInfo = new TenantInfo([
            'tenant_id' => $user->tenant->id,
            'deskripsi_umum' => $request->input('deskripsi_umum'),
            'rekomendasi_menu_a' => $request->input('rekomendasi_menu_a'),
            'rekomendasi_menu_b' => $request->input('rekomendasi_menu_b'),
        ]);

        if ($request->hasFile('foto_tenant')) {
            $fotoTenant = $request->file('foto_tenant');
            $fotoTenantName = time() . '_tenant.' . $fotoTenant->getClientOriginalExtension();
            $fotoTenant->move(public_path('storage/tenant/foto/'), $fotoTenantName);
            $tenantInfo->foto_tenant = $fotoTenantName;
        }

        if ($request->hasFile('foto_menu')) {
            $fotoMenu = $request->file('foto_menu');
            $fotoMenuName = time() . '_menu.' . $fotoMenu->getClientOriginalExtension();
            $fotoMenu->move(public_path('storage/tenant/menu/'), $fotoMenuName);
            $tenantInfo->foto_menu = $fotoMenuName;
        }

        $tenantInfo->save();

        return redirect()->route('tenantinfos.index')->with('success', 'Info Tenant berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tenantInfo = TenantInfo::findOrFail($id);
        return view('owner.tenantinfo.edit', compact('tenantInfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'deskripsi_umum' => 'required',
            'rekomendasi_menu_a' => 'required',
            'rekomendasi_menu_b' => 'required',
            'foto_tenant' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_menu' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tenantInfo = TenantInfo::findOrFail($id);
        $tenantInfo->fill($request->all());

        if ($request->hasFile('foto_tenant')) {
            $fotoTenant = $request->file('foto_tenant');
            $fotoTenantName = time() . '_tenant.' . $fotoTenant->getClientOriginalExtension();
            $fotoTenant->move(public_path('storage/tenant/foto/'), $fotoTenantName);
            $tenantInfo->foto_tenant = $fotoTenantName;
        }

        if ($request->hasFile('foto_menu')) {
            $fotoMenu = $request->file('foto_menu');
            $fotoMenuName = time() . '_menu.' . $fotoMenu->getClientOriginalExtension();
            $fotoMenu->move(public_path('storage/tenant/menu/'), $fotoMenuName);
            $tenantInfo->foto_menu = $fotoMenuName;
        }

        $tenantInfo->save();

        return redirect()->route('tenantinfos.index')->with('success', 'Info Tenant berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tenantInfo = TenantInfo::findOrFail($id);

        // Hapus foto tenant jika ada
        if ($tenantInfo->foto_tenant) {
            unlink(public_path('storage/tenant/foto/' . $tenantInfo->foto_tenant));
        }

        // Hapus foto menu jika ada
        if ($tenantInfo->foto_menu) {
            unlink(public_path('storage/tenant/menu/' . $tenantInfo->foto_menu));
        }

        $tenantInfo->delete();

        return redirect()->route('tenantinfos.index')->with('success', 'Info Tenant berhasil dihapus.');
    }
}
