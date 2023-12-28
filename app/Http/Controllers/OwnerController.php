<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Tenant;
use App\Models\Category;
use App\Models\Transaction;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{

    public function dashboard()
    {
        $menus = Menu::all();
        $categories = Category::all();
        $tenants = Tenant::all();
        return view('owner.dashboard', compact('menus', 'categories', 'tenants'));
    }

    public function datamenu()
    {
        // Mendapatkan tenant_id dari pengguna yang sedang login
        $tenantId = Auth::user()->tenant_id;

        // Mendapatkan data menu sesuai dengan tenant_id
        $menus = Menu::where('tenant_id', $tenantId)->get();

        // Mendapatkan data kategori dan tenant (jika diperlukan)
        $categories = Category::all();
        $tenants = Tenant::all();

        return view('owner.datamenu', compact('menus', 'categories', 'tenants'));
    }


    public function kasir()
    {
        // Mendapatkan tenant_id dari pengguna yang saat ini masuk
        $tenantId = Auth::user()->tenant_id;

        // Mendapatkan semua pengguna dengan peran 'kasir' dan tenant_id yang sesuai
        $users = User::where('role', 'kasir')->whereNotNull('tenant_id')->where('tenant_id', $tenantId)->get();

        // Mendapatkan informasi tentang tenant (jika diperlukan)
        $tenants = Tenant::all();

        return view('owner.userkasir.userkasir', compact('users', 'tenants'));
    }


    public function showTransaksi()
    {
        // Mendapatkan tenant_id dari pengguna yang saat ini masuk
        $tenantId = Auth::user()->tenant_id;

        // Mendapatkan transaksi berdasarkan tenant_id
        $transactions = Transaction::whereHas('tenant', function ($query) use ($tenantId) {
            $query->where('id', $tenantId);
        })->get();

        // Mendapatkan data tenant (jika diperlukan)
        $tenants = Tenant::all();

        return view('owner.transaksi', compact('transactions', 'tenants'));
    }
    public function Tenant()
    {
        $tenants = Tenant::all();

        return view('owner.tenant.tenant', compact('tenants'));
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

    public function create()
    {
        $categories = Category::all();
        $tenants = Tenant::all();
        return view('owner.create', compact('categories', 'tenants'));
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

        return redirect()->route('owner.datamenu')->with('success', 'Menu baru telah ditambahkan!');
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

        return view('owner.edit', compact('menu', 'categories', 'tenants'));
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
                return redirect()->route('owner.datamenu')->with('error', 'Menu not found');
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
            return redirect()->route('owner.datamenu')->with('success', 'Menu has been updated successfully');
        } catch (\Exception $e) {
            Log::error("Error updating menu. ID: $id, Error: " . $e->getMessage());

            return redirect()->route('owner.datamenu')->with('error', 'Error updating menu');
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
                    return redirect()->route('owner.datamenu')->with('error', 'Menu tidak ditemukan');
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
                return redirect()->route('owner.datamenu')->with('success', 'Menu berhasil dihapus');
            }
        } catch (\Exception $e) {
            // Tangani kesalahan dan log
            Log::error("Error deleting menu. ID: $id, Error: " . $e->getMessage());

            // Kembalikan respons sesuai kebutuhan
            if (request()->expectsJson()) {
                return response()->json(['message' => 'Terjadi kesalahan saat menghapus menu'], 500);
            } else {
                return redirect()->route('owner.datamenu')->with('error', 'Terjadi kesalahan saat menghapus menu');
            }
        }
    }
}
