<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Tenant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $tenants = Tenant::all();
        return view('kasir.menu.index', compact('menus', 'categories', 'tenants'));
    }

    // Ambil tenant berdasarkan category_id masing-masing menu
    // $tenants = [];
    // foreach ($menus as $menu) {
    //     $tenants[$menu->category_id] = $menu->tenant;
    // }

    public function create()
    {
        $categories = Category::all();
        $tenants = Tenant::all();
        return view('admin.create', compact('categories', 'tenants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'tenant_id' => [
                'required',
                Rule::exists('tenants', 'id'),
            ],
        ]);

        $menu = new Menu();
        $menu->nama = $request->input('nama');
        $menu->harga = $request->input('harga');
        $menu->deskripsi = $request->input('deskripsi');
        $menu->category_id = $request->input('category_id');
        $menu->tenant_id = $request->input('tenant_id');

        if ($request->hasFile('foto_produk')) {
            $image = $request->file('foto_produk');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/foto_produk/'), $imageName);
            $menu->foto_produk = $imageName;
        }

        $menu->save();

        return redirect()->route('admin.dashboard')->with('success', 'Menu baru telah ditambahkan!');
    }


    public function show($id)
    {
        $menu = Menu::find($id);
        return view('menu.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menu.edit', compact('menu'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'tenant_id' => [
                'required',
                Rule::exists('tenants', 'id'),
            ],
        ]);

        $menu = Menu::find($id);
        $menu->nama = $request->input('nama');
        $menu->harga = $request->input('harga');
        $menu->deskripsi = $request->input('deskripsi');
        $menu->category_id = $request->input('category_id');
        $menu->tenant_id = $request->input('tenant_id');

        if ($request->hasFile('foto_produk')) {
            // Hapus gambar lama jika ada
            if ($menu->foto_produk) {
                Storage::delete('public/foto_produk/' . $menu->foto_produk);
            }

            // Upload gambar baru
            $image = $request->file('foto_produk');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Simpan gambar ke penyimpanan (storage)
            Storage::putFileAs('public/foto_produk', $image, $imageName);

            $menu->foto_produk = $imageName;
        }

        $menu->save();

        return redirect()->route('admin.dashboard')->with('success', 'Menu telah diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            $menu->delete();
            return response()->json(['message' => 'Menu berhasil dihapus'], 200);
        } else {
            return response()->json(['message' => 'Menu tidak ditemukan'], 404);
        }
    }
}
