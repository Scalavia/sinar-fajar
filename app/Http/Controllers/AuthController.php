<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('layouts.auth.newlogin');
    }

    public function postlogin(Request $request)
    {
    	//kondisi login
    	if (Auth::attempt($request->only('username', 'password'))){
    		if(Auth::user()->where('username', $request->username)->value('role') == 'admin'){
                //jika login sukses
    		    return redirect('/dashboard');
            }
            elseif (Auth::user()->where('username', $request->username)->value('role') == 'karyawan'){
                //jika login sukses
    		    return redirect('/dashboard');
            }   
    	}
    	else{
    		return back()->withErrors(['username' => ['Wrong credentials please try again']]);
    	}
    }

    //proses logout
    public function logout()
    {
    	Auth::logout();
    	//redirect halaman
    	return redirect('/');
    }

    //menampilkan halaman semisal ora hak akses e, tp rung enek halamane wkwk
    public function reject()
    {
    	return view('reject');
    }
}
