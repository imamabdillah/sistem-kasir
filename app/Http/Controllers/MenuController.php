<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Tenant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;



class MenuController extends Controller
{
    public function index(Request $request, $tenant)
    {
        $menus = Menu::where('tenant_id', $tenant)->paginate(12); // Sesuaikan jumlah item per halaman sesuai kebutuhan
        $categories = Category::all();
        $tenants = Tenant::all();
        $cart = Cart::all();

        $currentTenant = Tenant::findOrFail($tenant);

        // Menghitung total item dan total harga
        $totalItems = $cart->sum('quantity');
        $totalPrice = $cart->sum(function ($item) {
            return $item->quantity * $item->menu->harga;
        });

        return view('kasir.menu.index', compact('cart', 'totalItems', 'totalPrice', 'menus', 'categories', 'tenants', 'currentTenant', 'tenant'));
    }


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

        return redirect()->route('admin.datamenu')->with('success', 'Menu baru telah ditambahkan!');
    }


    public function show($id)
    {
        $menu = Menu::find($id);
        return view('menu.show', compact('menu'));
    }

    public function edit($id)
    {
        $menu = Menu::find($id);


        $categories = Category::all();
        $tenants = Tenant::all();

        return view('admin.edit', compact('menu', 'categories', 'tenants'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'harga' => [
                    'required',
                    'regex:/^(Rp\s)?\d{1,3}(\.\d{3})*(,\d+)?$/',
                ],
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

            if (!$menu) {
                Log::error("Menu not found with ID: $id");
                return redirect()->route('admin.datamenu')->with('error', 'Menu not found');
            }

            $menu->nama = $request->input('nama');

            // Menghilangkan tanda mata uang sebelum menyimpan harga
            $menu->harga = str_replace(['Rp', ' ', ',', '.'], '', $request->input('harga'));

            $menu->deskripsi = $request->input('deskripsi');
            $menu->category_id = $request->input('category_id');
            $menu->tenant_id = $request->input('tenant_id');

            if ($request->hasFile('foto_produk')) {
                // Hapus foto lama jika ada
                if ($menu->foto_produk) {
                    $oldImagePath = public_path('storage/foto_produk/') . $menu->foto_produk;
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                // Upload foto baru
                $image = $request->file('foto_produk');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/foto_produk/'), $imageName);
                $menu->foto_produk = $imageName;
            }

            $menu->save();

            Log::info("Menu updated successfully. ID: $id");
            return redirect()->route('admin.datamenu')->with('success', 'Menu has been updated successfully');
        } catch (\Exception $e) {
            Log::error("Error updating menu. ID: $id, Error: " . $e->getMessage());

            return redirect()->route('admin.datamenu')->with('error', 'Error updating menu');
        }
    }

    public function destroy($id)
    {
        try {
            $menu = Menu::find($id);

            if (!$menu) {
                // Jika menu tidak ditemukan, kembalikan respons sesuai kebutuhan
                if (request()->expectsJson()) {
                    return response()->json(['message' => 'Menu tidak ditemukan'], 404);
                } else {
                    return redirect()->route('admin.datamenu')->with('error', 'Menu tidak ditemukan');
                }
            }

            // Hapus gambar dari penyimpanan sebelum menghapus entitas dari database
            if ($menu->foto_produk) {
                $path = 'storage/foto_produk/' . $menu->foto_produk;

                // Hapus gambar dari penyimpanan
                Storage::delete($path);

                // Hapus gambar yang terkait dengan URL publik
                $publicPath = public_path($path);
                if (file_exists($publicPath)) {
                    unlink($publicPath);
                }
            }

            $menu->delete();

            // Redirect ke dashboard setelah penghapusan
            if (request()->expectsJson()) {
                return response()->json(['message' => 'Menu berhasil dihapus']);
            } else {
                return redirect()->route('admin.datamenu')->with('success', 'Menu berhasil dihapus');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dan log
            Log::error("Error deleting menu. ID: $id, Error: " . $e->getMessage());

            // Kembalikan respons sesuai kebutuhan
            if (request()->expectsJson()) {
                return response()->json(['message' => 'Terjadi kesalahan saat menghapus menu'], 500);
            } else {
                return redirect()->route('admin.datamenu')->with('error', 'Terjadi kesalahan saat menghapus menu');
            }
        }
    }
}
