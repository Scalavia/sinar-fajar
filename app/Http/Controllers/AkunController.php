<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        $akun = Akun::all();

        return view('akun.index', ['akun' => $akun]);
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

        return redirect()->back();
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

            return redirect('/akun');
        } else {
            $akun->role = $request->level;
            $akun->username = $request->username;
            $akun->name = $request->nama;
            $akun->notelp = $request->notelp;
            $akun->alamat = $request->alamat;
            $akun->email = $request->email;
            $akun->password = Hash::make($request->password);
            $akun->save();

            return redirect('/akun');
        }
    }

    public function destroy($id)
    {
        Akun::find($id)->delete();

        return redirect()->back();
    }
}
