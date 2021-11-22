<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\DumpTransaksi;
use App\Models\Stok;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $dump_transaksi = DumpTransaksi::paginate(5);
        $total_barang = DumpTransaksi::count('id');
        $total_baryar = DumpTransaksi::sum('subtotal');

        return view('transaksi.transaksi', ['barang' => $barang, 'dump_transaksi' => $dump_transaksi, 'total_barang' => $total_barang, 'total_baryar' => $total_baryar]);
    }

    public function tambah_keranjang(Request $request)
    {
        $barang = Barang::find($request->barang);
        $barang_sekarang = $barang->stok - $request->qty;
        $barang->stok = $barang_sekarang;
        $barang->save();

        $dump_transaksi = new DumpTransaksi();
        $dump_transaksi->id_barang = $request->barang;
        $dump_transaksi->jumlah = $request->qty;
        $dump_transaksi->harga = $barang->harga;
        $dump_transaksi->subtotal = $barang->harga * $request->qty;
        $dump_transaksi->save();

        return redirect()->back();
    }

    public function proses(Request $request)
    {
        $transaksi = new Transaksi();
        $dump_transaksi = DumpTransaksi::all();

        $today = Carbon::today();
        $number = mt_rand(1000, 9999);
        $random = strtoupper(substr(md5($number), 5, 5));
        $invo = "INV".$today->day."".$today->month."".$today->year."".$random;
        $transaksi->invoice = $invo;
        $transaksi->total_bayar = $request->total_bayar;
        $transaksi->jumlah_bayar = $request->bayar;
        $transaksi->kembalian = $request->total_bayar - $request->bayar;
        $transaksi->save();

        $fix = Transaksi::where('invoice', $invo)->get();

        foreach ($fix as $f){
            foreach ($dump_transaksi as $dump){
                DetailTransaksi::insert([
                    'id_transaksi' => $f->id,
                    'id_barang' => $dump->id_barang,
                    'jumlah' => $dump->jumlah,
                    'harga' => $dump->harga,
                    'total' => $dump->subtotal
                ]);

                DumpTransaksi::where('id_barang', $dump->id_barang)->delete();
            }
        }

        return redirect()->back();
    }

    public function riwayat_transaksi()
    {
        $transaksi = Transaksi::paginate(5);

        return view('transaksi.riwayat_transaksi', ['transaksi' => $transaksi]);
    }

    public function detail_transaksi($id)
    {
        $transaksi = Transaksi::find($id);
        $detail = DetailTransaksi::where('id_transaksi', $id)->get();

        return view('transaksi.detail_transaksi', ['transaksi' => $transaksi, 'detail' => $detail]);
    }

    public function print_invoice($id)
    {
        $transaksi = Transaksi::find($id);
        $detail = DetailTransaksi::where('id_transaksi', $id)->get();

        return view('transaksi.invoice-print', ['transaksi' => $transaksi, 'detail' => $detail]);
    }

    public function filter()
    {
        $bulan = [];
        $tahun = [];


        return view('transaksi.laporan', ['bulan' => $bulan, 'tahun' => $tahun]);
    }

    public function filter_lap(Request $request)
    {
        $bulan = $request->bulan_tahun;
        $transaksi = Transaksi::whereYear('created_at', 2021)->get();

        return view('transaksi.filter_laporan', ['transaksi' => $transaksi, 'bulan' => $bulan]);
    }
}
