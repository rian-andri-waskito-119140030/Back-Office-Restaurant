<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MenuResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ControllerMenu extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $menu = Menu::latest()->paginate(5);

        //return collection of posts as a resource
        return new MenuResource(true, 'List Data Menu', $menu);
    }
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_menu'     => 'required',
            'tipe_produk'   => 'required',
            'harga_modal'   => 'required',
            'harga_jual'   => 'required',
            'stok' => 'required',
            'deskripsi'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/menu', $gambar->hashName());

        //create post
        $menu = Menu::create([
            'gambar'     => $gambar->hashName(),
            'nama_menu'     => $request->nama_menu,
            'tipe_produk'   => $request->tipe_produk,
            'harga_modal'   => $request->harga_modal,
            'harga_jual'   => $request->harga_jual,
            'stok' => $request->stok,
            'deskripsi'   => $request->deskripsi,
        ]);

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Ditambahkan!', $menu);
    }

     /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
    public function show(Menu $menu)
    {
        //return single post as a resource
        return new MenuResource(true, 'Data Menu Ditemukan!', $menu);
    }
    
    public function showtype(Request $request)
    {
        $kategori = $request->tipe_produk;
        $result = Menu::where('tipe_produk', $kategori)->get();
        //return single post as a resource
        return new MenuResource(true, 'Data Menu Ditemukan!', $result);
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Menu $menu)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_menu'     => 'required',
            'tipe_produk'   => 'required',
            'harga_modal'   => 'required',
            'harga_jual'   => 'required',
            'stok' => 'required',
            'deskripsi'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //check if image is not empty
        if ($request->hasFile('gambar')) {

            //upload image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/menu', $gambar->hashName());

            //delete old image
            Storage::delete('public/menu/'.$menu->image);

            //update post with new image
            $menu->update([
                'gambar'     => $gambar->hashName(),
                'nama_menu'     => $request->nama_menu,
                'tipe_produk'   => $request->tipe_produk,
                'harga_modal'   => $request->harga_modal,
                'harga_jual'   => $request->harga_jual,
                'stok' => $request->stok,
                'deskripsi'   => $request->deskripsi,
            ]);

        } else {

            //update post without image
            $menu->update([
                'nama_menu'     => $request->nama_menu,
                'tipe_produk'   => $request->tipe_produk,
                'harga_modal'   => $request->harga_modal,
                'harga_jual'   => $request->harga_jual,
                'stok' => $request->stok,
                'deskripsi'   => $request->deskripsi,
            ]);
        }

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Diubah!', $menu);
    }
    
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Menu $menu)
    {
        //delete image
        Storage::delete('public/menu/'.$menu->gambar);

        //delete post
        $menu->delete();

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Dihapus!', null);
    }
}
