<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->all())) {
            $kategori = Kategori::paginate(10);
    
            return view('kategori.index', ['kategori' => $kategori]);
        } else {
            $cari = $request->cari;
            $kategori = Kategori::where('nama', 'like', "%".$cari."%")->paginate(10);

            return view('kategori.index', ['kategori' => $kategori]);
        }
    }

    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $kategori = Kategori::where('id', $request->id)->first();
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $kategori = Kategori::where('id', $id)->delete();

        return redirect()->back();
    }
}
