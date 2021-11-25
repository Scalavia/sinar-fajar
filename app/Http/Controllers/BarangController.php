<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->all())) {
            $barang = Barang::paginate(15);
            $kategori = Kategori::all();
            $kode = Barang::count('id');
    
            return view('barang.index', ['barang' => $barang, 'kategori' => $kategori, 'kode' => $kode]);
        } else {
            $cari = $request->cari;
            $barang = Barang::where('kode_barang', 'like', "%".$cari."%")->orwhere('nama_barang', 'like', "%".$cari."%")->paginate(15);
            $kategori = Kategori::all();
            $kode = Barang::count('id');
            session()->flashInput($request->input());
            $barang->appends($request->all());
    
            return view('barang.index', ['barang' => $barang, 'kategori' => $kategori, 'kode' => $kode]);
        }
    }

    public function store(Request $request)
    {
        $barang = new Barang();

        $file = $request->file('file');
        $nama_file = time()."_".$file->getClientOriginalName();
        $file->move(public_path('foto/barang/'),$nama_file);

        $barang->kode_barang = $request->kode_barang;
        $barang->id_kategori = $request->kategori;
        $barang->nama_barang = $request->nama;
        $barang->deskripsi = $request->keterangan;
        $barang->stok = $request->stok;
        $barang->harga = $request->harga;
        $barang->gambar = $nama_file;
        $barang->save();

        return redirect()->back();
    }

    public function edit($id)
    {
        $barang = Barang::find($id);
        $kategori = Kategori::all();

        return view('barang.edit', ['barang' => $barang, 'kategori' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $file = $request->file('file');

        if ($file == null){
            $barang->nama_barang = $request->nama;
            $barang->id_kategori = $request->kategori;
            $barang->deskripsi = $request->keterangan;
            $barang->harga = $request->harga;
            $barang->save();
        } else {
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move(public_path('foto/barang/'),$nama_file);
            $barang->nama_barang = $request->nama;
            $barang->id_kategori = $request->kategori;
            $barang->deskripsi = $request->keterangan;
            $barang->harga = $request->harga;
            $barang->gambar = $nama_file;
            $barang->save();
        }

        return redirect('/barang');
    }

    public function destroy($id)
    {
        Barang::where('id', $id)->delete();

        return redirect()->back();
    }
}
