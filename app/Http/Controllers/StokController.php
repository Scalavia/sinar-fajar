<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Stok;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        // $stok = Stok::all();
        $barang = Barang::all();
        $list = Barang::all();
        $supplier = Supplier::all();

        return view('stok.index', ['list' => $list, 'barang' => $barang, 'supplier' => $supplier]);
    }

    public function cari_stok($id)
    {
        $barang = Barang::find($id);

        return response()->json($barang);
    }

    public function tambah_stok(Request $request)
    {
        $stok = new Stok;
        $stok->id_barang = $request->id_barang;
        $stok->id_supplier = $request->supplier;
        $stok->stok_masuk = $request->stok_masuk;
        $stok->save();

        $barang = Barang::find($request->id_barang);
        $tambah_stok = $barang->stok + $request->stok_masuk;
        $barang->stok = $tambah_stok;
        $barang->save();

        return redirect()->back();
    }

    public function kurang_stok(Request $request)
    {
        $barang = Barang::find($request->id_barang);
        $kurang_stok = $barang->stok - $request->kurang_stok;
        // if ($kurang_stok <= $barang->stok){
        //     return redirect()->back();
        // } else {
            $barang->stok = $kurang_stok;
            $barang->save();

            return redirect()->back();
        // }
    }
}
