<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::paginate(10);
        $kode = Supplier::count('id');

        return view('supplier.index', ['supplier' => $supplier, 'kode' => $kode]);
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->kode_supplier = $request->kode_supplier;
        $supplier->nama = $request->nama;
        $supplier->telepon = $request->telepon;
        $supplier->alamat = $request->alamat;
        $supplier->save();

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $supplier = Supplier::where('id', $request->id)->first();
        $supplier->nama = $request->nama;
        $supplier->telepon = $request->telepon;
        $supplier->alamat = $request->alamat;
        $supplier->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        Supplier::find($id)->delete();

        return redirect()->back();
    }
}
