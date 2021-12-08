<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index(Request $request)
    {
        if (empty($request->all())) {
            $akun = Akun::paginate(5);
    
            return view('akun.index', ['akun' => $akun]);
        } else {
            $cari = $request->cari;
            $akun = Akun::where('name', 'like', "%".$cari."%");
    
            return view('akun.index', ['akun' => $akun]);
        }
    }

    public function store(Request $request)
    {
        $akun = new Akun;
        $akun->role = $request->level;
        $akun->username = $request->username;
        $akun->name = $request->nama;
        $akun->notelp = $request->notelp;
        $akun->alamat = $request->alamat;
        $akun->email = $request->email;
        $akun->password = Hash::make($request->password);
        $akun->save();

        return redirect()->back()->with('success', 'Berhasil tambah akun baru');
    }

    public function edit($id)
    {
        $akun = Akun::find($id);

        return view('akun.edit', ['akun' => $akun]);
    }

    public function update(Request $request, $id)
    {
        $akun = Akun::where('id', $id)->first();

        if ($request->password == null){
            $akun->role = $request->level;
            $akun->username = $request->username;
            $akun->name = $request->nama;
            $akun->notelp = $request->notelp;
            $akun->alamat = $request->alamat;
            $akun->email = $request->email;
            $akun->save();

            return redirect('/akun')->with('success', 'Berhasil perbarui data akun '.$akun->name);
        } else {
            $akun->role = $request->level;
            $akun->username = $request->username;
            $akun->name = $request->nama;
            $akun->notelp = $request->notelp;
            $akun->alamat = $request->alamat;
            $akun->email = $request->email;
            $akun->password = Hash::make($request->password);
            $akun->save();

            return redirect('/akun')->with('success', 'Berhasil perbarui data akun '.$akun->name);
        }
    }

    public function destroy($id)
    {
        Akun::find($id)->delete();

        return redirect()->back()->with('success', 'Berhasil hapus akun');
    }

    public function profile($id)
    {
        $akun = Akun::find($id);

        return view('akun.profile', ['akun' => $akun]);
    }

    public function profile_update(Request $request, $id)
    {
        $akun = Akun::where('id', $id)->first();

        if ($request->password == null){
            $akun->name = $request->nama;
            $akun->notelp = $request->notelp;
            $akun->alamat = $request->alamat;
            $akun->email = $request->email;
            $akun->save();

            return redirect()->back();
        } else {
            $akun->name = $request->nama;
            $akun->notelp = $request->notelp;
            $akun->alamat = $request->alamat;
            $akun->email = $request->email;
            $akun->password = Hash::make($request->password);
            $akun->save();

            return redirect()->back()->with('success', 'Berhasil perbarui data');
        }
    }
}
