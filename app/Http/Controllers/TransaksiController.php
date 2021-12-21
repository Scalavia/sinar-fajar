<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\DumpTransaksi;
use App\Models\Stok;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $barang = Barang::orderBy('nama_barang', 'asc')->get();
        $dump_transaksi = DumpTransaksi::paginate(5);
        $total_barang = DumpTransaksi::count('id');
        $total_baryar = DumpTransaksi::sum('subtotal');

        return view('transaksi.transaksi', ['barang' => $barang, 'dump_transaksi' => $dump_transaksi, 'total_barang' => $total_barang, 'total_baryar' => $total_baryar]);
    }

    public function tambah_keranjang(Request $request)
    {
        $barang = Barang::find($request->barang);
        $barang_sekarang = $barang->stok - $request->qty;
        // if ($barang_sekarang < $barang->stok) {
            // return redirect()->back()->with('warning', 'Qty lebih dari stok');
        // } else {
            $barang->stok = $barang_sekarang;
            $barang->save();

            $dump_transaksi = new DumpTransaksi();
            $dump_transaksi->id_barang = $request->barang;
            $dump_transaksi->jumlah = $request->qty;
            $dump_transaksi->harga = $barang->harga;
            $dump_transaksi->subtotal = $barang->harga * $request->qty;
            $dump_transaksi->save();
    
            return redirect()->back()->with('success', 'Barang berhasil ditambah dikeranjang');
        // }
    }

    public function hapus_keranjang($id)
    {
        $dump_transaksi = DumpTransaksi::find($id);
        $barang = Barang::where('id', $dump_transaksi->id_barang)->first();
        $hasil = $dump_transaksi->jumlah + $barang->stok;
        $barang->stok = $hasil;
        $barang->save();
        $dump_transaksi->delete();

        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }

    public function proses(Request $request)
    {
        $transaksi = new Transaksi();
        $dump_transaksi = DumpTransaksi::all();

        $today = Carbon::today();
        $number = mt_rand(1000, 9999);
        $random = strtoupper(substr(md5($number), 5, 5));
        $invo = "INV".$today->day."".$today->month."".$today->year."".$random;
        $transaksi->id_user = Auth::user()->id;
        $transaksi->invoice = $invo;
        $transaksi->total_bayar = $request->total_bayar;
        $transaksi->jumlah_bayar = $request->bayar;
        $transaksi->kembalian = $request->kembalian;
        $transaksi->save();

        $fix = Transaksi::where('invoice', $invo)->get();

        foreach ($fix as $f){
            foreach ($dump_transaksi as $dump){
                DetailTransaksi::insert([
                    'id_transaksi' => $f->id,
                    'id_barang' => $dump->id_barang,
                    'jumlah' => $dump->jumlah,
                    'harga' => $dump->harga,
                    'total' => $dump->subtotal,
                    'created_at' => $f->created_at
                ]);

                DumpTransaksi::where('id_barang', $dump->id_barang)->delete();
            }
        }

        return redirect()->back()->with('success', 'Transaksi berhasil');
    }

    public function riwayat_transaksi(Request $request)
    {
        if (empty($request->all())) {
            $transaksi = Transaksi::orderBy('created_at', 'desc')->paginate(15);
    
            return view('transaksi.riwayat_transaksi', ['transaksi' => $transaksi]);
        } else {
            $cari = $request->cari;
            $transaksi = Transaksi::where('invoice', 'like', "%".$cari."%")->orderBy('created_at', 'desc')->paginate(15);
    
            return view('transaksi.riwayat_transaksi', ['transaksi' => $transaksi]);
        }
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

    // public function filter()
    // {
    //     $bulan = [];
    //     $tahun = [];

    //     return view('transaksi.laporan', ['bulan' => $bulan, 'tahun' => $tahun]);
    // }

    public function filter(Request $request)
    {
        $dr = $request->tanggal;
        $bulan = explode(" - ", $dr);
        $transaksi = Transaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->get();
        $detail = DetailTransaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->get();
        $total = DetailTransaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->sum('total');
        $ttlbarang = DetailTransaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->count('id_barang');
        $ttltrx = Transaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->count('invoice');

        return view('transaksi.filter_laporan', ['transaksi' => $transaksi, 'bulan' => $bulan, 'detail' => $detail, 'total' => $total, 'ttlbarang' => $ttlbarang, 'ttltrx' => $ttltrx]);
    }

    public function print_laporan(Request $request)
    {
        $dr = $request->tanggal;
        $bulan = explode(" - ", $dr);
        $transaksi = Transaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->get();
        $detail = DetailTransaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->get();
        $total = DetailTransaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->sum('total');
        $ttlbarang = DetailTransaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->count('id_barang');
        $ttltrx = Transaksi::whereBetween('created_at', [$bulan[0], $bulan[1]])->count('invoice');

        return view('transaksi.filter_laporan', ['transaksi' => $transaksi, 'bulan' => $bulan, 'detail' => $detail, 'total' => $total, 'ttlbarang' => $ttlbarang, 'ttltrx' => $ttltrx]);
    }
}
