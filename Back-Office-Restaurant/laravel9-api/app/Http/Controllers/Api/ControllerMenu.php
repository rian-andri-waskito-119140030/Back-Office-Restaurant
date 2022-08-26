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
use DataTables;

class ControllerMenu extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        // dd(csrf_token());
        // $menu = DB::table('menu')->selectRaw('
        //     `id_menu`,
        //     `nama_menu`,
        //     CONCAT("http://127.0.0.1:8000/storage/menu/", `gambar`) AS gambar,
        //     `tipe_produk`,
        //     `harga_modal`,
        //     `harga_jual`,
        //     `stok`,
        //     `deskripsi`
        //     ')->get();
        // dd($menu);
        if ($request->ajax()) {
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
            return Datatables::of($menu)
                ->addColumn('gambar', function ($row) {
                    $img = '<img src="' . $row->gambar . '" class="img-fluid">';
                    return $img;
                })
                ->addColumn('harga_modal', function ($row) {
                    $harga = 'Rp. ' . number_format($row->harga_modal, 0, ',', '.');
                    return $harga;
                })
                ->addColumn('harga_jual', function ($row) {
                    $harga = 'Rp. ' . number_format($row->harga_jual, 0, ',', '.');
                    return $harga;
                })
                ->addColumn('tipe_produk', function ($row) {
                    $tipe = '<div style="text-transform: lowercase;">' . $row->tipe_produk . '</div>';
                    return $tipe;
                })
                ->addColumn('action', 'action')
                ->rawColumns(['gambar', 'tipe_produk', 'harga_modal', 'harga_jual', 'action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('menu');
        // //get posts
        // $menu = Menu::oldest()->paginate(5);
        // $menu = DB::select('SELECT * FROM menu');

        // // //return collection of posts as a resource
        // return new MenuResource(true, 'List Data Menu', $menu);
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
        // $menu = Menu::create([
        //     'gambar'     => $gambar->hashName(),
        //     'nama_menu'     => $request->nama_menu,
        //     'tipe_produk'   => $request->tipe_produk,
        //     'harga_modal'   => $request->harga_modal,
        //     'harga_jual'   => $request->harga_jual,
        //     'stok' => $request->stok,
        //     'deskripsi'   => $request->deskripsi,
        // ]);
        $menu = new Menu;
        $menu->gambar = $gambar->hashName();
        $menu->nama_menu = $request->nama_menu;
        $menu->tipe_produk = $request->tipe_produk;
        $menu->harga_modal = $request->harga_modal;
        $menu->harga_jual = $request->harga_jual;
        $menu->stok = $request->stok;
        $menu->deskripsi = $request->deskripsi;
        $menu->save();

        //return response
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit(Menu $menu)
    {
        return view('edit', compact('menu'));
    }

    public function update(Request $request, $id_menu)
    {
        //upload image
        if ($request->hasFile('gambar')) {
            //$gambar = $request->file('gambar');
            // $gambar->storeAs('public/menu', $gambar->hashName());
            // $gambar = $gambar->hashName();

            // //delete old image
            // Storage::delete('public/menu/' . $request->gambar);
            $menu = Menu::find($id_menu);
            // $menu = $request->file('gambar');
            // $menu->storeAs('public/menu', $menu->hashName());
            //$menu->gambar = $menu->hashName();
            $destinationPath = 'public/menu' . $menu->gambar;
            if (Storage::exists($destinationPath)) {
                Storage::delete($destinationPath);
            }
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $gambar->storeAs('public/menu', $filename);
            $menu->gambar = $filename;
            $menu->nama_menu = $request->nama_menu;
            $menu->tipe_produk = $request->tipe_produk;
            $menu->harga_modal = $request->harga_modal;
            $menu->harga_jual = $request->harga_jual;
            $menu->stok = $request->stok;
            $menu->deskripsi = $request->deskripsi;
            $menu->save();
        } else {
            $menu = Menu::find($id_menu);
            $menu->nama_menu = $request->nama_menu;
            $menu->tipe_produk = $request->tipe_produk;
            $menu->harga_modal = $request->harga_modal;
            $menu->harga_jual = $request->harga_jual;
            $menu->stok = $request->stok;
            $menu->deskripsi = $request->deskripsi;
            $menu->save();
        }
        //    if ($request->hasFile('gambar')) {
        //         $gambar = $request->file('gambar');
        //         $gambar->storeAs('public/menu', $gambar->hashName());
        //         $gambar = $gambar->hashName();
        //         //delete old image
        //         Storage::delete('public/menu/' . $request->gambar);
        //         $menu = Menu::find($id_menu);
        //         $menu->gambar = $gambar->hashName();
        //         $menu->nama_menu = $request->nama_menu;
        //         $menu->tipe_produk = $request->tipe_produk;
        //         $menu->harga_modal = $request->harga_modal;
        //         $menu->harga_jual = $request->harga_jual;
        //         $menu->stok = $request->stok;
        //         $menu->deskripsi = $request->deskripsi;
        //         $menu->save();
        //     } elseif ($request->has('nama_menu')) {
        //         $menu = Menu::find($id_menu);
        //         $menu->nama_menu = $request->nama_menu;
        //         $menu->save();
        //     } elseif ($request->has('tipe_produk')){
        //         $menu = Menu::find($id_menu);
        //         $menu->tipe_produk = $request->tipe_produk;
        //         $menu->save();
        //     } elseif ($request->has('harga_modal')){
        //         $menu = Menu::find($id_menu);
        //         $menu->harga_modal = $request->harga_modal;
        //         $menu->save();
        //     } elseif ($request->has('harga_jual')){
        //         $menu = Menu::find($id_menu);
        //         $menu->harga_jual = $request->harga_jual;
        //         $menu->save();
        //     } elseif ($request->has('stok')){
        //         $menu = Menu::find($id_menu);
        //         $menu->stok = $request->stok;
        //         $menu->save();
        //     } elseif ($request->has('deskripsi')){
        //         $menu = Menu::find($id_menu);
        //         $menu->deskripsi = $request->deskripsi;
        //         $menu->save();
        //     } else {
        //         return response()->json(['error' => 'Tidak ada data yang diubah'], 422);
        //     }

        //return response
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diubah');
    }
    public function delete(Request $request)
    {

        $menu = Menu::find($request->id_menu);
        // dd($request->all());
        $menu->delete();
        return Response()->json($menu);
    }
    // {
    //     dd ($id_menu);
    //     $menu = Menu::find($id_menu);
    //     $menu->delete($id_menu);
    //     return redirect()->route('menu.index', compact('menu'))->with('success', 'Menu berhasil dihapus');
    // }
    // {
    //     $menu = Menu::where('id_menu',$request->id_menu)->delete();
    //     return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus');
    // }
    /**
     * show
     *
     * @param  mixed $post
     * @return void
     */
    public function show(Request $request)
    {
        $menu = Menu::oldest()->paginate(5);
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


    // public function showtypemakanan(Request $request)
    // {
    //     $result = DB::table('menu')->select('gambar','nama_menu','tipe_produk','harga_modal','harga_jual','stok','deskripsi')
    //     ->where('tipe_produk', '=', 'makanan')
    //     ->get();
    //     //return single post as a resource
    //     return new MenuResource(true, 'Data Menu Ditemukan!', $result);
    // }

    // public function showtypeminuman(Request $request){
    //     $result = DB::table('menu')->Select('gambar','nama_menu','tipe_produk','harga_modal','harga_jual','stok','deskripsi')
    //     ->where('tipe_produk', '=', 'minuman')
    //     ->get();

    //     return new MenuResource(true, 'Data Menu ditemukan!', $result);
    // }


    // public function showbyid(Request $request, $id_menu)
    // {
    //     $menu = DB::table('menu')
    //         ->select('gambar','nama_menu','tipe_produk','harga_modal','harga_jual','stok','deskripsi')
    //         ->where('id_menu', '=', $id_menu)
    //         ->get();
    //     //return single post as a resource
    //     return new MenuResource(true, 'Data Menu Ditemukan!', $menu);
    // }
}
