<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\Type\VoidType;

class MenuController extends Controller
{
    public function index(): View
    {
        $menus = Menu::latest()->simplePaginate(10);
        return view('menu.index', compact('menus'));
    }

    public function create()
    {
        return view('menu.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'     => 'required',
            'harga'   => 'required',
            'stok'   => 'required',
            'kategori'   => 'required'
        ]);

        // upload gambar
        $image = $request->file('image');
        $image->storeAs('public/menus', $image->hashName());

        Menu::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'harga' => $request->harga,
            'stok'  => $request->stok,
            'kategori'  => $request->kategori,
        ]);

        // kembali ke index
        return redirect()->route('menu.index')->with(['success' => 'Data  Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        // Get Menu dengan ID
        $menu = Menu::findOrFail($id);

        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'kategori'  => 'required'

        ]);

        $menu = Menu::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/menus', $image->hashName());

            Storage::delete('public/menus' . $menu->$image);

            $menu->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori' => $request->kategori

            ]);
        }

        return redirect()->route('kantin')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function destroy($id): RedirectResponse
    {
        $menu = Menu::findOrFail($id);

        Storage::delete('public/Menus/' . $menu->image);

        $menu->delete();

        return redirect()->route('menu.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
