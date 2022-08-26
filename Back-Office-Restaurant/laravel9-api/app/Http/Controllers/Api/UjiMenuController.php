<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\MenuResource;
use Illuminate\Support\Facades\Storage;

class UjiMenuController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return new MenuResource(true, 'success', $menu);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_menu' => 'required',
            'tipe_produk' => 'required',
            'harga_modal' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);
        if ($validator->fails()) {
            return new MenuResource(false, 'error', $validator->errors());
        }
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/menu', $gambar->getClientOriginalName());
        $menu = Menu::create([
            'gambar' => $gambar->getClientOriginalName(),
            'nama_menu' => $request->nama_menu,
            'tipe_produk' => $request->tipe_produk,
            'harga_modal' => $request->harga_modal,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
        ]);
        return new MenuResource(true, 'success', $menu);
    }
    public function show($id)
    {
        $menu = Menu::find($id);
        return new MenuResource(true, 'success', $menu);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required',
            'tipe_produk' => 'required',
            'harga_modal' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
        ]);
        if ($validator->fails()) {
            return new MenuResource(false, 'error', $validator->errors());
        }
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/menu', $gambar->getClientOriginalName());
            Storage::delete('public/menu/' . $request->gambar);
            $menu = Menu::find($id);
            $menu->update([
                'gambar' => $gambar->getClientOriginalName(),
                'nama_menu' => $request->nama_menu,
                'tipe_produk' => $request->tipe_produk,
                'harga_modal' => $request->harga_modal,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
            ]);
        } else {
            $menu = Menu::find($id);
            $menu->update([
                'nama_menu' => $request->nama_menu,
                'tipe_produk' => $request->tipe_produk,
                'harga_modal' => $request->harga_modal,
                'harga_jual' => $request->harga_jual,
                'stok' => $request->stok,
                'deskripsi' => $request->deskripsi,
            ]);
        }
        return new MenuResource(true, 'success, data menu berhasil diubah', $menu);
    }
    public function destroy($id)
    {
        $menu = Menu::find($id);
        Storage::delete('public/menu/' . $menu->gambar);
        $menu->delete();
        return new MenuResource(true, 'success, data menu berhasil dihapus', null);
    }
}
