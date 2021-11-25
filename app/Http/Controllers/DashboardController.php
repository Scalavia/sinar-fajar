<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stok;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $transaksi_sum = Transaksi::where('created_at', "like", "%".$today->year."-".$today->month."-".$today->day."%")->sum('total_bayar');
        $stok = Stok::where('created_at', "like", "%".$today->year."-".$today->month."-".$today->day."%")->sum('stok_masuk');
        $transaksi_count = Transaksi::where('created_at', "like", "%".$today->year."-".$today->month."-".$today->day."%")->count('id');
        
        return view('dashboard.index', ['transaksi_sum' => $transaksi_sum, 'stok' => $stok, 'transaksi_count' => $transaksi_count]);
    }

    public function barang_masuk_hariini()
    {
        $today = Carbon::today();
        $stok = Stok::where('created_at', "like", "%".$today->year."-".$today->month."-".$today->day."%")->get();

        return view('dashboard.barang_masuk_today', ['stok' => $stok]);
    }

    public function transaksi_hari_ini()
    {
        $today = Carbon::today();
        $transaksi = Transaksi::where('created_at', "like", "%".$today->year."-".$today->month."-".$today->day."%")->get();

        return view('dashboard.transaksi_hari_ini', ['transaksi' => $transaksi]);
    }
}
