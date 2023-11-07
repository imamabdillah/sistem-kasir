<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $categories = Category::all();
        return view('menu.index', compact('menus'), compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required',
        ]);


        $menu = new Menu();
        $menu->nama = $request->input('nama');
        $menu->harga = $request->input('harga');
        $menu->deskripsi = $request->input('deskripsi');
        $menu->category_id = $request->input('category_id');

        if ($request->hasFile('foto_produk')) {
            $image = $request->file('foto_produk');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(storage_path('app/public/foto_produk'), $imageName);
            $menu->foto_produk = $imageName;

            // dd($request->all());
        }

        $menu->save();


        return redirect()->route('menu.index')->with('success', 'Menu baru telah ditambahkan!');
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
        ]);

        $menu = Menu::find($id);
        $menu->nama = $request->input('nama');
        $menu->harga = $request->input('harga');
        $menu->deskripsi = $request->input('deskripsi');

        if ($request->hasFile('foto_produk')) {
            $image = $request->file('foto_produk');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $menu->foto_produk = $imageName;
        }

        $menu->save();

        return redirect()->route('menu.index')->with('success', 'Menu telah diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu telah dihapus!');
    }
}
