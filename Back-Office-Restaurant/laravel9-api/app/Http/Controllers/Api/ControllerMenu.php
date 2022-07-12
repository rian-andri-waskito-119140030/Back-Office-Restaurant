<?php

namespace App\Http\Controllers\Api;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\MenuResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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
        $menu = Menu::oldest()->paginate(5);
        $menu = DB::select('SELECT * FROM menu');

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
        $gambar = URL::to('storage/menu/');
        $menu = DB::table('menu')->selectRaw('
        `id_menu`,
        `nama_menu`,
        CONCAT("http://127.0.0.1:8000/storage/menu/", `gambar`) AS gambar,
        `tipe_produk`,
        `harga_modal`,
        `harga_jual`,
        `stok`,
        `deskripsi`
        ')->get();

        return new MenuResource(true, 'List Data Menu', $menu);
    }
    
    public function showtypemakanan(Request $request)
    {
        $result = DB::table('menu')->select('gambar','nama_menu','tipe_produk','harga_modal','harga_jual','stok','deskripsi')
        ->where('tipe_produk', '=', 'makanan')
        ->get();
        //return single post as a resource
        return new MenuResource(true, 'Data Menu Ditemukan!', $result);
    }
    
    public function showtypeminuman(Request $request){
        $result = DB::table('menu')->Select('gambar','nama_menu','tipe_produk','harga_modal','harga_jual','stok','deskripsi')
        ->where('tipe_produk', '=', 'minuman')
        ->get();

        return new MenuResource(true, 'Data Menu ditemukan!', $result);
    }


    public function showbyid(Request $request, $id_menu)
    {
        $menu = DB::table('menu')
            ->select('gambar','nama_menu','tipe_produk','harga_modal','harga_jual','stok','deskripsi')
            ->where('id_menu', '=', $id_menu)
            ->get();
        //return single post as a resource
        return new MenuResource(true, 'Data Menu Ditemukan!', $menu);
    }

    public function update(Request $request, $id_menu)
    {
        //upload image
        

       if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/menu', $gambar->hashName());
            $gambar = $gambar->hashName();
            //delete old image
            Storage::delete('public/menu/' . $request->gambar);
            $menu = Menu::find($id_menu);
            $menu->gambar = $gambar->hashName();
            $menu->nama_menu = $request->nama_menu;
            $menu->tipe_produk = $request->tipe_produk;
            $menu->harga_modal = $request->harga_modal;
            $menu->harga_jual = $request->harga_jual;
            $menu->stok = $request->stok;
            $menu->deskripsi = $request->deskripsi;
            $menu->save();
        } elseif ($request->has('nama_menu')) {
            $menu = Menu::find($id_menu);
            $menu->nama_menu = $request->nama_menu;
            $menu->save();
        } elseif ($request->has('tipe_produk')){
            $menu = Menu::find($id_menu);
            $menu->tipe_produk = $request->tipe_produk;
            $menu->save();
        } elseif ($request->has('harga_modal')){
            $menu = Menu::find($id_menu);
            $menu->harga_modal = $request->harga_modal;
            $menu->save();
        } elseif ($request->has('harga_jual')){
            $menu = Menu::find($id_menu);
            $menu->harga_jual = $request->harga_jual;
            $menu->save();
        } elseif ($request->has('stok')){
            $menu = Menu::find($id_menu);
            $menu->stok = $request->stok;
            $menu->save();
        } elseif ($request->has('deskripsi')){
            $menu = Menu::find($id_menu);
            $menu->deskripsi = $request->deskripsi;
            $menu->save();
        } else {
            return response()->json(['error' => 'Tidak ada data yang diubah'], 422);
        }

        //return response
        return new MenuResource(true, 'Data Menu Berhasil Diubah!', $menu);
    }
    // /**
    //  * update
    //  *
    //  * @param  mixed $request
    //  * @param  mixed $post
    //  * @return void
    //  */
    // public function update(Request $request, Menu $menu)
    // {
    //     //define validation rules
    //     $validator = Validator::make($request->all(), [
    //         'gambar'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'nama_menu'     => 'required',
    //         'tipe_produk'   => 'required',
    //         'harga_modal'   => 'required',
    //         'harga_jual'   => 'required',
    //         'stok' => 'required',
    //         'deskripsi'   => 'required',
    //     ]);

    //     //check if validation fails
    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     //check if image is not empty
    //     if ($request->hasFile('gambar')) {

    //         //upload image
    //         $gambar = $request->file('gambar');
    //         $gambar->storeAs('public/menu', $gambar->hashName());

    //         //delete old image
    //         Storage::delete('public/menu/'.$menu->image);

    //         //update post with new image
    //         $menu->update([
    //             'gambar'     => $gambar->hashName(),
    //             'nama_menu'     => $request->nama_menu,
    //             'tipe_produk'   => $request->tipe_produk,
    //             'harga_modal'   => $request->harga_modal,
    //             'harga_jual'   => $request->harga_jual,
    //             'stok' => $request->stok,
    //             'deskripsi'   => $request->deskripsi,
    //         ]);

    //     } else {

    //         //update post without image
    //         $menu->update([
    //             'nama_menu'     => $request->nama_menu,
    //             'tipe_produk'   => $request->tipe_produk,
    //             'harga_modal'   => $request->harga_modal,
    //             'harga_jual'   => $request->harga_jual,
    //             'stok' => $request->stok,
    //             'deskripsi'   => $request->deskripsi,
    //         ]);
    //     }

    //     //return response
    //     return new MenuResource(true, 'Data Menu Berhasil Diubah!', $menu);
    // }
    
    // /**
    //  * destroy
    //  *
    //  * @param  mixed $post
    //  * @return void
    //  */
    // public function destroy(Menu $menu)
    // {
    //     //delete image
    //     Storage::delete('public/menu/'.$menu->gambar);

    //     //delete post
    //     $menu->delete();

    //     //return response
    //     return new MenuResource(true, 'Data Menu Berhasil Dihapus!', null);
    // }
}
